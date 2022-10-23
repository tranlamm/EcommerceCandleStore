<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products\CandleProduct;
use App\Models\products\Manufacturer;

class CandleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $candleProducts = CandleProduct::query()
            ->where('tenSanPham', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.candleProductShow', ['candleProducts' => $candleProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.candleProductCreate', ['manufacturers' => $manufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candle = CandleProduct::create([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'mauSac' => $request->input('mauSac'),
            'soBac' => $request->input('soBac'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('candleproduct.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candle = CandleProduct::find($id);
        $manufacturers = Manufacturer::all();
        return view('admin.candleProductEdit', ['candle' => $candle, 'manufacturers' => $manufacturers]);
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
        $candle = CandleProduct::where('id', $id)->update([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'mauSac' => $request->input('mauSac'),
            'soBac' => $request->input('soBac'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);
        return redirect(route('candleproduct.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candle = CandleProduct::find($id);
        $candle->delete();
        return redirect(route('candleproduct.index'));
    }
}
