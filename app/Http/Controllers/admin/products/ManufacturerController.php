<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\products\Manufacturer;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($request->input('order-name')) {
            $manufacturers = Manufacturer::query()
                ->where('ten', 'LIKE', "%{$search}%")
                ->orderBy($request->input('order-name'), ($request->input('order-type') ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $manufacturers = Manufacturer::query()
                ->where('ten', 'LIKE', "%{$search}%")
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
        }

        return view('admin.products.manufacturerShow', ['manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.manufacturerCreate');
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
            'ten' => 'bail|required',
            'diaChi' => 'bail|required',
            'soDienThoai' => array(
                'bail',
                'required',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
            ),
            'image' => 'bail|mimes:png,jpg,jpeq,webp|max:5048',
        ]);

        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/manufacturers'), $generatedImageName);
        }
        else {
            $generatedImageName = "no_image.png";
        }

        $manufacturer = Manufacturer::create([
            'ten' => $request->input('ten'),
            'diaChi' => $request->input('diaChi'),
            'soDienThoai' => $request->input('soDienThoai'),
            'image_path' => $generatedImageName,
        ]);

        return redirect(route('manufacturer.index'))->with('message', 'Created successfully!');
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
        $manufacturer = Manufacturer::find($id);
        return view('admin.products.manufacturerEdit', ['manufacturer' => $manufacturer]);
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
            'ten' => 'bail|required',
            'diaChi' => 'bail|required',
            'soDienThoai' => array(
                'bail',
                'required',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
            ),
            'image' => 'bail|mimes:png,jpg,jpeq,webp|max:5048',
        ]);

        if ($request->image !== NULL) {
            $generatedImageName = 'image' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('images/manufacturers'), $generatedImageName);
            $new_image = $generatedImageName;
        }
        else {
            $new_image = $request->old_image;
        }
        
        $manufacturer = Manufacturer::where('id', $id)->update([
            'ten' => $request->input('ten'),
            'diaChi' => $request->input('diaChi'),
            'soDienThoai' => $request->input('soDienThoai'),
            'image_path' => $new_image,
        ]);
        return redirect(route('manufacturer.index'))->with('message', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect(route('manufacturer.index'))->with('message', 'Deleted successfully!');
    }

    public function allProducts(Request $request, $id)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $manufacturer = Manufacturer::find($id);

        switch ($category)
        {
            case 'candle':
                $products = $manufacturer->products()->get()->whereIn('loaiSanPham', ['single wick candle', '3 wick candle'])->toArray();
                break;
            case 'essential oil':
                $products = $manufacturer->products()->get()->where('loaiSanPham', '=', 'essential oil')->toArray();
                break;
            case 'scented wax':
                $products = $manufacturer->products()->get()->where('loaiSanPham', '=', 'scented wax')->toArray();
                break;    
            default:
                $products = $manufacturer->products()->get()->toArray();
                break;
        }

        if ($search) 
        {
            $searchResult = []; 
            foreach ($products as $product) {
                if (str_contains(strtolower($product['tenSanPham']), strtolower($search))) {
                    array_push($searchResult, $product);
                }
            }
            $result = $searchResult;
        }
        else 
        {
            $result = $products;
        }

        return view('admin.products.manufacturerAllProduct', ['allProducts' => $result, 'manufacturer' => $manufacturer, 'old_category' => $category]);
    }
}
