<?php

namespace App\Http\Controllers\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\ExportInvoice;
use App\Models\products\CandleProduct;
use App\Models\products\EssentialOilProduct;
use App\Models\products\ScentedWaxProduct;

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
        $loaiHang = $request->input('loaiHang');
        $hinhThuc = $request->input('hinhThuc');
        $trangThai = $request->input('trangThai');

        if ($request->input('order-name')) {
            $exportInvoices = ExportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->where('loaiHang', 'LIKE', "%{$loaiHang}%")
                ->where('hinhThuc', 'LIKE', "%{$hinhThuc}%")
                ->where('trangThai', 'LIKE', "%{$trangThai}%")
                ->orderBy($request->input('order-name'), ($request->input('order-type') ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $exportInvoices = ExportInvoice::query()
                ->where('tenDonHang', 'LIKE', "%{$tenDonHang}%")
                ->where('loaiHang', 'LIKE', "%{$loaiHang}%")
                ->where('hinhThuc', 'LIKE', "%{$hinhThuc}%")
                ->where('trangThai', 'LIKE', "%{$trangThai}%")
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
        $candleProducts = CandleProduct::where('conLai', '>', 0)->get();
        $essentialOilProducts = EssentialOilProduct::where('conLai', '>', 0)->get();
        $scentedWaxProducts = ScentedWaxProduct::where('conLai', '>', 0)->get();
        return view('admin.invoices.exportInvoiceCreate', [
            'candleProducts' => $candleProducts,
            'essentialOilProducts' => $essentialOilProducts,
            'scentedWaxProducts' => $scentedWaxProducts,
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
        ExportInvoice::create([
            'tenDonHang' => $request->input('tenDonHang'),
            'noiDung' => $request->input('noiDung'),
            'hinhThuc' => 'offline',
            'trangThai' => 'completed',
            'tenKhachHang' => $request->input('tenKhachHang'),
            'soDienThoai' => $request->input('soDienThoai'),
            'diaChi' => $request->input('diaChi'),
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
                    $product->update([
                        'conLai' => $product->conLai - $soLuong,
                        'daBan' => $product->daBan + $soLuong,
                    ]);
                }
                break;
            case('scentedWax'):
                $product = ScentedWaxProduct::where('tenSanPham' , '=', $name)->first();
                if ($product)
                {
                    $product->update([
                        'conLai' => $product->conLai - $soLuong,
                        'daBan' => $product->daBan + $soLuong,
                    ]);
                }
                break;
            case('essentialOil'):
                $product = EssentialOilProduct::where('tenSanPham' , '=', $name)->first();
                if ($product)
                {
                    $product->update([
                        'conLai' => $product->conLai - $soLuong,
                        'daBan' => $product->daBan + $soLuong,
                    ]);
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
        $exportInvoice = ExportInvoice::find($id);
        $type = $exportInvoice->loaiHang;
        $name = $exportInvoice->tenSanPham;
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
        return view('admin.invoices.exportInvoiceDetail', [
            'exportInvoice' => $exportInvoice,
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
        $invoice = ExportInvoice::find($id);
        $invoice->delete();
        return redirect(route('exportinvoice.index'))->with('message', 'Deleted successfully!');
    }

    public function print($id)
    {
        $invoice = ExportInvoice::find($id);
        $type = $invoice->loaiHang;
        $name = $invoice->tenSanPham;
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
        return view('admin.invoices.exportInvoicePrint', [
            'exportInvoice' => $invoice,
            'product' => $product,
        ]);
    }
}
