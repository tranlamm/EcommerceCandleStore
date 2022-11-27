<?php

namespace App\Http\Controllers\admin\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\ImportInvoice;
use App\Models\products\Product;
use App\Models\products\Manufacturer;


class ImportInvoiceController extends Controller
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
            $importInvoices = ImportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->orderBy($request->input('order-name'), (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $importInvoices = ImportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin.invoices.importInvoiceShow', [
            'importInvoices' => $importInvoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.invoices.importInvoiceCreate', [
            'manufacturers' => $manufacturers
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
        $importInvoice = ImportInvoice::create([
            'tenDonHang' => $request->input('tenDonHang'),
            'noiDung' => $request->input('noiDung'),
            'tongTien' => array_sum($request->input('tongTien'))
        ]);

        for ($i = 0; $i < count($request->input('tenSanPham')); ++$i)
        {   
            $product = Product::find($request->input('tenSanPham')[$i]);
            if ($product)
            {
                $product->conLai += $request->input('soLuong')[$i];
                $product->save();
            }
            $importInvoice->products()->attach([$request->input('tenSanPham')[$i] => [
                'soLuong' => $request->input('soLuong')[$i], 
                'donGia' => $request->input('donGia')[$i], 
                'tongTien' => $request->input('tongTien')[$i]
            ]]);
        }

        return redirect(route('importinvoice.index'))->with('message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $importInvoice = ImportInvoice::find($id);
        return view('admin.invoices.importInvoiceDetail', [
            'importInvoice' => $importInvoice,
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
        $invoice = ImportInvoice::find($id);
        $invoice->delete();
        return redirect(route('importinvoice.index'))->with('message', 'Deleted successfully!');
    }
}
