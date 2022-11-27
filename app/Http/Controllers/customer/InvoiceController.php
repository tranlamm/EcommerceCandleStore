<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\invoices\OnlineInvoice;

use Auth;
use Validator;

class InvoiceController extends Controller
{
    public function showInvoice(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.main.customerInvoiceShow', [
            'invoices_finished' => $customer->onlineInvoice->where('trangThai', '=', 'finished'),
            'invoices_pending' => $customer->onlineInvoice->where('trangThai', '=', 'pending'),
        ]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'id' => 'bail|required',
            'quantity' => 'bail|required',
        ]);

        $ids = $request->input('id');
        $quantities = $request->input('quantity');
        $length = count($ids);
        $total = 0;
        for ($i = 0; $i < $length; ++$i)
        {
            if ($quantities[$i] < 1)
                return back()->withErrors([$ids[$i] => 'Vui lòng nhập số lượng sản phẩm']);
            $product = Product::find($ids[$i]);
            if (!$product)
                return back()->withErrors(['wrong_product_id' => 'Sản phẩm không hợp lệ']);
            if ($product->conLai < $quantities[$i])
                return back()->withErrors([$ids[$i] => 'Số lượng sản phẩm trong kho không đủ']);
            $total += $product->giaBan * $quantities[$i];
        }

        // create invoice
        $account_id = Auth::guard('customer')->user()->id;
        $onlineInvoice = OnlineInvoice::create([
            'account_id' => $account_id,
            'tongTien' => $total,
            'trangThai' => 'pending',
        ]);

        // create relationship in invoice_product and incr and dec product_info
        for ($i = 0; $i < $length; ++$i)
        {   
            $product = Product::find($ids[$i]);
            $product->conLai -= $quantities[$i];
            $product->daBan += $quantities[$i];
            $product->save();
            
            $onlineInvoice->products()->attach([$ids[$i] => [
                'soLuong' => $quantities[$i], 
            ]]);
        };

        return back()->with('success', 'Đặt hàng thành công. Cảm ơn quý khách đã ủng hộ!');
    }
}
