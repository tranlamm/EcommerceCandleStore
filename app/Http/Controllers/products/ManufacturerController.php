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
                ->paginate(10);
        }

        return view('admin.manufacturerShow', ['manufacturers' => $manufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturerCreate');
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
        return view('admin.manufacturerEdit', ['manufacturer' => $manufacturer]);
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
}
