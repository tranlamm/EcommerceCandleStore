<?php

namespace App\Http\Controllers\admin\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\ExportInvoice;
use App\Models\products\Product;

class ExportInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tenDonHang = $request->input('tenDonHang');

        if ($request->input('order-name')) {
            $exportInvoices = ExportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->orderBy($request->input('order-name'), (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $exportInvoices = ExportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin.invoices.exportInvoiceShow', [
            'exportInvoices' => $exportInvoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('conLai', '>', 0)->get();
        return view('admin.invoices.exportInvoiceCreate', [
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exportInvoice = ExportInvoice::create([
            'tenDonHang' => $request->input('tenDonHang'),
            'noiDung' => $request->input('noiDung'),
            'tenKhachHang' => $request->input('tenKhachHang'),
            'soDienThoai' => $request->input('soDienThoai'),
            'diaChi' => $request->input('diaChi'),
            'tongTien' => array_sum($request->input('tongTien')),
        ]);

        for ($i = 0; $i < count($request->input('tenSanPham')); ++$i)
        {   
            $product = Product::find($request->input('tenSanPham')[$i]);
            if ($product)
            {
                $product->conLai -= $request->input('soLuong')[$i];
                $product->daBan += $request->input('soLuong')[$i];
                $product->save();
            }
            $exportInvoice->products()->attach([$request->input('tenSanPham')[$i] => [
                'soLuong' => $request->input('soLuong')[$i], 
                'donGia' => $request->input('donGia')[$i], 
                'tongTien' => $request->input('tongTien')[$i]
            ]]);
        };

        return redirect(route('exportinvoice.index'))->with('message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exportInvoice = ExportInvoice::find($id);
        return view('admin.invoices.exportInvoiceDetail', [
            'exportInvoice' => $exportInvoice,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = ExportInvoice::find($id);
        $invoice->delete();
        return redirect(route('exportinvoice.index'))->with('message', 'Deleted successfully!');
    }
}
