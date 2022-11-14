<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Fragrance;
use App\Models\products\Manufacturer;

class ScentedWaxController extends Controller
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
            $scentedWaxProducts = Product::query()
                ->where('loaiSanPham', '=', 'scented wax')
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy($request->input('order-name'), (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $scentedWaxProducts = Product::query()
                ->where('loaiSanPham', '=', 'scented wax')
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        return view('admin.products.scentedWaxProductShow', ['scentedWaxProducts' => $scentedWaxProducts, 'manufacturers' => $manufacturers]);
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
        return view('admin.products.scentedWaxProductCreate', ['manufacturers' => $manufacturers, 'fragrances' => $fragrances]);
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
        
        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/products'), $generatedImageName);
        }
        else {
            $generatedImageName = "no_image.png";
        }
  
        $scentedWax = Product::create([
            'loaiSanPham' => 'scented wax',
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'loaiMuiHuong' => 'bail|required|numeric',
            'loaiMuiHuong' => $request->input('loaiMuiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $generatedImageName,
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('scentedwaxproduct.index'))->with('message', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scentedWaxProduct = Product::find($id);
        $manufacturers = Manufacturer::all();
        $fragrances = Fragrance::all();
        return view('admin.products.scentedWaxProductEdit', ['scentedWaxProduct' => $scentedWaxProduct, 'manufacturers' => $manufacturers, 'fragrances' => $fragrances]);
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

        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/products'), $generatedImageName);
            $new_image = $generatedImageName;
        }
        else {
            $new_image = $request->old_image;
        }

        $essentialOil = Product::where('id', $id)->update([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'loaiMuiHuong' => $request->input('loaiMuiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $new_image,
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('scentedwaxproduct.index'))->with('message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scentedWaxProduct = Product::find($id);
        $scentedWaxProduct->delete();
        return redirect(route('scentedwaxproduct.index'))->with('message', 'Deleted successfully!');
    }
}
