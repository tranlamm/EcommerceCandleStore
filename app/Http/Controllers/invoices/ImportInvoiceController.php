<?php

namespace App\Http\Controllers\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\ImportInvoice;
use App\Models\products\Manufacturer;
use App\Models\products\CandleProduct;
use App\Models\products\EssentialOilProduct;
use App\Models\products\ScentedWaxProduct;

class ImportInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::all();
        $tenDonHang = $request->input('tenDonHang');
        $loaiHang = $request->input('loaiHang');
        $nhaCungCap = $request->input('nhaCungCap');

        if ($request->input('order-name')) {
            $importInvoices = ImportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->where('loaiHang', 'LIKE', "%{$loaiHang}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy($request->input('order-name'), ($request->input('order-type') ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $importInvoices = ImportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->where('loaiHang', 'LIKE', "%{$loaiHang}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin.invoices.importInvoiceShow', [
            'importInvoices' => $importInvoices,
            'manufacturers' => $manufacturers
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
        ImportInvoice::create([
            'tenDonHang' => $request->input('tenDonHang'),
            'noiDung' => $request->input('noiDung'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'loaiHang' => $request->input('loaiHang'),
            'tenSanPham' => $request->input('tenSanPham'),
            'soLuong' => $request->input('soLuong'),
            'donGia' => $request->input('donGia'),
            'tongTien' => $request->input('soLuong') * $request->input('donGia'),
        ]);

        $soLuong = $request->input('soLuong');
        $type = $request->input('loaiHang');
        $name = $request->input('tenSanPham');

        switch($type)
        {
            case('candle'):
                $product = CandleProduct::where('tenSanPham' , '=', $name)->first();
                if ($product)
                {
                    $product->update(['conLai' => $soLuong + $product->conLai]);
                }
                break;
            case('scentedWax'):
                $product = ScentedWaxProduct::where('tenSanPham' , '=', $name)->first();
                if ($product)
                {
                    $product->update(['conLai' => $soLuong + $product->conLai]);
                }
                break;
            case('essentialOil'):
                $product = EssentialOilProduct::where('tenSanPham' , '=', $name)->first();
                if ($product)
                {
                    $product->update(['conLai' => $soLuong + $product->conLai]);
                }
                break;
            default:
                break;
        }

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
        $importInvoice = ImportInvoice::find($id);
        $type = $importInvoice->loaiHang;
        $name = $importInvoice->tenSanPham;
        switch($type)
        {
            case('candle'):
                $product = CandleProduct::where('tenSanPham' , '=', $name)->first();
                break;
            case('scentedWax'):
                $product = ScentedWaxProduct::where('tenSanPham' , '=', $name)->first();
                break;
            case('essentialOil'):
                $product = EssentialOilProduct::where('tenSanPham' , '=', $name)->first();
                break;
            default:
                break;
        }
        return view('admin.invoices.importInvoiceDetail', [
            'importInvoice' => $importInvoice,
            'product' => $product,
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
