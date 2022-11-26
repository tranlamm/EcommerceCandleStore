<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Fragrance;
use App\Models\products\Manufacturer;
use App\Models\invoices\OnlineInvoice;
use App\Models\auth\Customer;

use Validator;
use Auth;
use DB;

class CustomerController extends Controller
{
// Shop
    public function shopIndex()
    {
        $bestseller = Product::query()
            ->orderBy('daBan', 'desc')
            ->limit(10)
            ->get();
        $toprated = Product::query()
            ->orderBy('diemDanhGia', 'desc')
            ->limit(10)
            ->get();
        return view('customer.main.customerMainView', [
            'bestseller' => $bestseller,
            'toprated' => $toprated,
        ]);
    }

    public function productShow(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');
        $manufacturer = $request->input('manufacturer');
        $fragrance = $request->input('fragrance');

        $nhaCungCap = "";
        $muiHuong = "";
        if ($manufacturer)
            $nhaCungCap = Manufacturer::find($manufacturer)->ten;
        if ($fragrance)
            $muiHuong = Fragrance::find($fragrance)->theLoai;
            
        if ($request->input('order-name')) {
            $products = Product::query()
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('loaiSanPham', 'LIKE', "%{$type}%")
                ->where('nhaCungCap', 'LIKE', "%{$manufacturer}%")
                ->where('loaiMuiHuong', 'LIKE', "%{$fragrance}%")
                ->orderBy($request->input('order-name'), 
            (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
            ->paginate(20);
        }
        else {
            $products = Product::query()
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('loaiSanPham', 'LIKE', "%{$type}%")
                ->where('nhaCungCap', 'LIKE', "%{$manufacturer}%")
                ->where('loaiMuiHuong', 'LIKE', "%{$fragrance}%")
                ->paginate(20);
        }
        
        $fragrances = Fragrance::all();
        $manufacturers = Manufacturer::all();
        session()->flashInput($request->input());
        return view('customer.main.customerProductShow', [
            'products' => $products,
            'manufacturers' => $manufacturers, 
            'fragrances' => $fragrances,
            'nhaCungCap' => $nhaCungCap,
            'muiHuong' => $muiHuong,
        ]);
    }

    public function productDetail(Request $request, $id)
    {
        $product = Product::find($id);
        
        return view('customer.main.customerProductDetail', [
            'product' => $product,
        ]);
    }

// Cart
    public function cartShow(Request $request)
    {
        $products = array();
        $total = 0;
        if ($request->session()->has('cart'))
        {
            $cart = $request->session()->get('cart');
            foreach ($cart as $cartItem)
            {
                $product = Product::find($cartItem['id']);
                array_push($products, ['info' => $product, 'quantity' => $cartItem['quantity']]);
                $total += $product->giaBan * $cartItem['quantity'];
            }
        }

        return view('customer.main.customerCartShow', [
            'products' => $products,
            'total' => $total,
        ]);
    }

    public function addProductToCart(Request $request, $id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => 'Failed']);

        $item = Product::find($id);
        $quantity = $request->input('quantity');
        if ($item->conLai < $quantity)
            return response()->json(['errors' => 'Not enough']);
        // End validate

        if ($request->session()->has('cart'))
        {
            $found = false;
            $newCart = array();
            foreach($request->session()->get('cart') as $product)
            {
                if ($product['id'] != $id)
                    array_push($newCart, $product);
                else 
                {
                    $found = true;
                    array_push($newCart, ['id' => $id, 'quantity' => $quantity]);
                }
            }
            if (!$found)
                array_push($newCart, ['id' => $id, 'quantity' => $quantity]);
            $request->session()->put('cart', $newCart);
        }
        else 
        {
            $request->session()->push('cart', ['id' => $id, 'quantity' => $quantity]);
        }

        // Messsage to blade view if success
        return response()->json(['success' => 'Success']);
    }

    public function deleteAllCart()
    {
        session()->forget('cart');
        return response()->json(['success' => 'Success']);
    }

    public function deleteItemCart(Request $request)
    {
        if ($request->session()->has('cart'))
        {
            $newCart = array();
            foreach ($request->session()->get('cart') as $product)
            {
                $found = false;
                foreach ($request->input('ids') as $id)
                {
                    if ($product['id'] == $id)
                    {
                        $found = true;
                        break;
                    }
                }
                if (!$found)
                    array_push($newCart, $product);
            }
            $request->session()->put('cart', $newCart);
            if (count($request->session()->get('cart')) == 0) 
            {
                $request->session()->forget('cart');
                return response()->json(['empty' => true]);
            }
        }

        // Messsage to blade view if success
        return response()->json(['success' => 'Success']);
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

// Invoice
    public function invoiceShow(Request $request, $id)
    {
        $customer = Customer::find($id);

        return view('customer.main.customerInvoiceShow', [
            'invoices_finished' => $customer->onlineInvoice->where('trangThai', '=', 'finished'),
            'invoices_pending' => $customer->onlineInvoice->where('trangThai', '=', 'pending'),
        ]);
    }

// Review
    public function postReview(Request $request, $customer_id, $product_id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'point' => 'required|numeric|min:0|max:5',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => 'Failed review']);
        // End Validate

        $customer = Customer::find($customer_id);
        if (!$customer) return response()->json(['errors' => 'Failed review']);
        $product = Product::find($product_id);
        if (!$product) return response()->json(['errors' => 'Failed review']);
        $point = $request->input('point');

        if ($customer->productReview()->where('product_id', '=', $product_id)->exists())
        {
            $customer->productReview()->updateExistingPivot($product_id, [
                'point' => $point,
            ]);
        }
        else 
        {   
            $customer->productReview()->attach([$product_id => [
                'point' => $point,
            ]]);
        }

        return response()->json(['success' => 'Success']);
    }

    public function postComment(Request $request, $customer_id, $product_id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => 'Failed review']);
        // End Validate

        $customer = Customer::find($customer_id);
        if (!$customer) return response()->json(['errors' => 'Failed review']);
        $product = Product::find($product_id);
        if (!$product) return response()->json(['errors' => 'Failed review']);
        $comment = $request->input('comment');

        $customer->productComment()->attach([$product_id => [
            'comment' => $comment,
        ]]);

        return back();
    }

    public function deleteComment(Request $request, $customer_id, $product_id)
    {
        $request->validate([
            'comment_id' => 'bail|required',
        ]);

        $customer = Customer::find($customer_id);
        if (!$customer) return;
        DB::table('customer_product_comment')->delete($request->input('comment_id'));
        return back();
    }
}
