<?php

namespace App\Http\Controllers\products;

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
            
        ]);

        $manufacturer = Manufacturer::create([
            'ten' => $request->input('ten'),
            'diaChi' => $request->input('diaChi'),
            'soDienThoai' => $request->input('soDienThoai')
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
        ]);
        
        $manufacturer = Manufacturer::where('id', $id)->update([
            'ten' => $request->input('ten'),
            'diaChi' => $request->input('diaChi'),
            'soDienThoai' => $request->input('soDienThoai')
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
        $candleProducts = $manufacturer->candleProducts->toArray();
        $essentialOilProducts = $manufacturer->essentialOilProducts->toArray();
        $scentedWaxProducts = $manufacturer->scentedWaxProducts->toArray();
        $allProducts = array_merge($candleProducts, $essentialOilProducts, $scentedWaxProducts);

        $result = [];
        if ($category) {
            if (in_array('all', $category)) {
                $result = $allProducts;
            }
            else {
                if (in_array('candle', $category)) 
                    $result = array_merge($result, $candleProducts);
                if (in_array('essentialOil', $category)) 
                    $result = array_merge($result, $essentialOilProducts);
                if (in_array('scentedWax', $category)) 
                    $result = array_merge($result, $scentedWaxProducts);
            }
        }
        else {
            $result = $allProducts;
        }

        if ($search) {
            $searchResult = []; 
            foreach ($result as $product) {
                if (str_contains(strtolower($product['tenSanPham']), strtolower($search))) {
                    array_push($searchResult, $product);
                }
            }
            $result = $searchResult;
        }

        return view('admin.products.manufacturerAllProduct', ['allProducts' => $result, 'manufacturer' => $manufacturer, 'old_category' => $category]);
    }
}
