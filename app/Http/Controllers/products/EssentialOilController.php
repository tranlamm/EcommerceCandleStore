<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products\EssentialOilProduct;
use App\Models\products\Manufacturer;
use App\Models\auth\Admin;

class EssentialOilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $essentialOils = EssentialOilProduct::query()
            ->where('tenSanPham', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.essentialOilProductShow', ['essentialOils' => $essentialOils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manufacturers = Manufacturer::all();
        return view('admin.essentialOilProductCreate', ['manufacturers' => $manufacturers]);
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
            'tenSanPham' => 'required',
            'nhaCungCap' => 'required|numeric',
            'image' => 'mimes:png,jpg,jpeg|max:5048',
            'theTich' => 'required|numeric|between:10,1000',
            'giaNhap' => 'required|numeric',
            'giaBan' => 'required|numeric'
        ]);
        $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('images'), $generatedImageName);
        $essentialOil = EssentialOilProduct::create([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $generatedImageName,
            'theTich' => $request->input('theTich'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('essentialoilproduct.index'));
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
        $essentialOil = EssentialOilProduct::find($id);
        $manufacturers = Manufacturer::all();
        return view('admin.essentialOilProductEdit', ['essentialOil' => $essentialOil, 'manufacturers' => $manufacturers]);
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
            'tenSanPham' => 'required',
            'nhaCungCap' => 'required|numeric',
            'image' => 'mimes:png,jpg,jpeg|max:5048',
            'theTich' => 'required|numeric|between:10,1000',
            'giaNhap' => 'required|numeric',
            'giaBan' => 'required|numeric'
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

        $essentialOil = EssentialOilProduct::where('id', $id)->update([
            'tenSanPham' => $request->input('tenSanPham'),
            'muiHuong' => $request->input('muiHuong'),
            'nhaCungCap' => $request->input('nhaCungCap'),
            'image_path' => $new_image,
            'theTich' => $request->input('theTich'),
            'moTa' => $request->input('moTa'),
            'giaNhap' => $request->input('giaNhap'),
            'giaBan' => $request->input('giaBan'),
        ]);

        return redirect(route('essentialoilproduct.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $essentialOil = EssentialOilProduct::find($id);
        $essentialOil->delete();
        return redirect(route('essentialoilproduct.index'));
    }

    public function test()
    {
        $admin = Admin::find(1);
        dd($admin->hasRole('user'));
    }
}
