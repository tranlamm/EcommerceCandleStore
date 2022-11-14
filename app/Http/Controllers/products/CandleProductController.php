<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Fragrance;
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
        $manufacturers = Manufacturer::all();
        $search = $request->input('search');
        $nhaCungCap = $request->input('nhaCungCap');

        if ($request->input('order-name') && $request->input('order-type')) {
            $candleProducts = Product::query()
                ->whereIn('loaiSanPham', ['single wick candle', '3 wick candle'])
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy($request->input('order-name'), (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $candleProducts = Product::query()
                ->whereIn('loaiSanPham', ['single wick candle', '3 wick candle'])
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        return view('admin.products.candleProductShow', ['candleProducts' => $candleProducts, 'manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        $fragrances = Fragrance::all();
        return view('admin.products.candleProductCreate', ['manufacturers' => $manufacturers, 'fragrances' => $fragrances]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenSanPham' => 'bail|required',
            'muiHuong' => 'bail|required',
            'soBac' => array(
                'bail',
                'required',
                'regex:/1|3/u',
            ),
            'loaiMuiHuong' => 'bail|required|numeric',
            'nhaCungCap' => 'bail|required|numeric',
            'image' => 'bail|mimes:png,jpg,jpeq,webp|max:5048',
            'trongLuong' => 'bail|required|numeric|between:1,10000',
            'giaNhap' => array(
                'bail',
                'required',
                'regex:/^\d+(0){3}$/u',
            ),
            'giaBan' => array(
                'bail',
                'required',
                'regex:/^\d+(0){3}$/u',
            ),
        ]);

        if ($request->input('soBac') == 1)
            $loaiSanPham = 'single wick candle';
        else 
            $loaiSanPham = '3 wick candle';

        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/products'), $generatedImageName);
        }
        else {
            $generatedImageName = "no_image.png";
        }

        $candle = Product::create([
            'loaiSanPham' => $loaiSanPham,
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'loaiMuiHuong' => $request->input('loaiMuiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'image_path' => $generatedImageName,
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('candleproduct.index'))->with('message', 'Created successfully!');
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
        $candle = Product::find($id);
        $manufacturers = Manufacturer::all();
        $fragrances = Fragrance::all();
        return view('admin.products.candleProductEdit', ['candle' => $candle, 'manufacturers' => $manufacturers, 'fragrances' => $fragrances]);
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
        $request->validate([
            'tenSanPham' => 'bail|required',
            'muiHuong' => 'bail|required',
            'soBac' => array(
                'bail',
                'required',
                'regex:/1|3/u',
            ),
            'loaiMuiHuong' => 'bail|required|numeric',
            'nhaCungCap' => 'bail|required|numeric',
            'image' => 'bail|mimes:png,jpg,jpeq,webp|max:5048',
            'trongLuong' => 'bail|required|numeric|between:1,10000',
            'giaNhap' => array(
                'bail',
                'required',
                'regex:/^\d+(0){3}$/u',
            ),
            'giaBan' => array(
                'bail',
                'required',
                'regex:/^\d+(0){3}$/u',
            ),
        ]);

        if ($request->input('soBac') == 1)
            $loaiSanPham = 'single wick candle';
        else 
            $loaiSanPham = '3 wick candle';

        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/products'), $generatedImageName);
            $new_image = $generatedImageName;
        }
        else {
            $new_image = $request->old_image;
        }
        
        $candle = Product::where('id', $id)->update([
            'loaiSanPham' => $loaiSanPham,
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'loaiMuiHuong' => $request->input('loaiMuiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'image_path' => $new_image,
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);
        return redirect(route('candleproduct.index'))->with('message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candle = Product::find($id);
        $candle->delete();
        return redirect(route('candleproduct.index'))->with('message', 'Deleted successfully!');
    }
}
