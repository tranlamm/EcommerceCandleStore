<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Fragrance;
use App\Models\products\Manufacturer;

class CustomerController extends Controller
{
    public function shopIndex()
    {
        $bestseller = Product::query()
            ->orderBy('daBan', 'desc')
            ->limit(10)
            ->get();
        // $toprated = Product::query()
        //     ->orderBy('danhGia', 'desc')
        //     ->limit(10)
        //     ->get();
        return view('customer.main.customerMainView', [
            'bestseller' => $bestseller,
        ]);
    }

    public function productShow(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');
        $manufacturer = $request->input('manufacturer');
        $fragrance = $request->input('fragrance');

        $nhaCungCap = "";
        $muiHuong = "";
        if ($manufacturer)
            $nhaCungCap = Manufacturer::find($manufacturer)->ten;
        if ($fragrance)
            $muiHuong = Fragrance::find($fragrance)->theLoai;
            
        if ($request->input('order-name')) {
            $products = Product::query()
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('loaiSanPham', 'LIKE', "%{$type}%")
                ->where('nhaCungCap', 'LIKE', "%{$manufacturer}%")
                ->where('loaiMuiHuong', 'LIKE', "%{$fragrance}%")
                ->orderBy($request->input('order-name'), 
            (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
            ->paginate(20);
        }
        else {
            $products = Product::query()
                ->where('tenSanPham', 'LIKE', "%{$search}%")
                ->where('loaiSanPham', 'LIKE', "%{$type}%")
                ->where('nhaCungCap', 'LIKE', "%{$manufacturer}%")
                ->where('loaiMuiHuong', 'LIKE', "%{$fragrance}%")
                ->paginate(20);
        }
        
        $fragrances = Fragrance::all();
        $manufacturers = Manufacturer::all();
        session()->flashInput($request->input());
        return view('customer.main.customerProductShow', [
            'products' => $products,
            'manufacturers' => $manufacturers, 
            'fragrances' => $fragrances,
            'nhaCungCap' => $nhaCungCap,
            'muiHuong' => $muiHuong,
        ]);
    }
}
