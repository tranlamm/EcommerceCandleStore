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
        $manufacturers = Manufacturer::all();
        $search = $request->input('search');
        $nhaCungCap = $request->input('nhaCungCap');

        if ($request->input('order-name')) {
            $candleProducts = CandleProduct::query()
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('nhaCungCap', 'LIKE', "%{$nhaCungCap}%")
                ->orderBy($request->input('order-name'), ($request->input('order-type') ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $candleProducts = CandleProduct::query()
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
        return view('admin.products.candleProductCreate', ['manufacturers' => $manufacturers]);
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
            'mauSac' => 'bail|required',
            'soBac' => array(
                'bail',
                'required',
                'regex:/1|3/u',
            ),
            'nhaCungCap' => 'bail|required|numeric',
            'image' => 'bail|mimes:png,jpg,jpeq,webp,webp|max:5048',
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

        $generatedImageName;
        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $generatedImageName);
        }
        else {
            $generatedImageName = "";
        }

        $candle = CandleProduct::create([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'mauSac' => $request->input('mauSac'),
            'soBac' => $request->input('soBac'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $generatedImageName,
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
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
        $candle = CandleProduct::find($id);
        $manufacturers = Manufacturer::all();
        return view('admin.products.candleProductEdit', ['candle' => $candle, 'manufacturers' => $manufacturers]);
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
            'mauSac' => 'bail|required',
            'soBac' => array(
                'bail',
                'required',
                'regex:/1|3/u',
            ),
            'nhaCungCap' => 'bail|required|numeric',
            'image' => 'bail|mimes:png,jpg,jpeq,webp,webp|max:5048',
            'trongLuong' => 'bail|required|numeric|between:1,10000',
            'giaNhap' => array(
                'bail',
                'required',
                'regex:/^\d*(0){3}$/u',
            ),
            'giaBan' => array(
                'bail',
                'required',
                'regex:/^\d*(0){3}$/u',
            ),
        ]);

        $new_image;
        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images'), $generatedImageName);
            $new_image = $generatedImageName;
        }
        else {
            $new_image = $request->old_image;
        }
        
        $candle = CandleProduct::where('id', $id)->update([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'mauSac' => $request->input('mauSac'),
            'soBac' => $request->input('soBac'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $new_image,
            'trongLuong' => $request->input('trongLuong'),
            'moTa' => $request->input('moTa'),
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
        $candle = CandleProduct::find($id);
        $candle->delete();
        return redirect(route('candleproduct.index'))->with('message', 'Deleted successfully!');
    }
}
