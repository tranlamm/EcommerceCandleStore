<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Fragrance;
use App\Models\products\Manufacturer;

use Validator;

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

    public function productDetail(Request $request, $id)
    {
        $product = Product::find($id);
        return view('customer.main.customerProductDetail', [
            'product' => $product,
        ]);
    }

    public function cartShow(Request $request)
    {
        $products = array();
        $total = 0;
        if ($request->session()->has('cart'))
        {
            $cart = $request->session()->get('cart');
            foreach ($cart as $cartItem)
            {
                $product = Product::find($cartItem['id']);
                array_push($products, ['info' => $product, 'quantity' => $cartItem['quantity']]);
                $total += $product->giaBan * $cartItem['quantity'];
            }
        }

        return view('customer.main.customerCartShow', [
            'products' => $products,
            'total' => $total,
        ]);
    }

    public function addProductToCart(Request $request, $id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => 'Failed']);

        $item = Product::find($id);
        $quantity = $request->input('quantity');
        if ($item->conLai < $quantity)
            return response()->json(['errors' => 'Not enough']);
        // End validate

        if ($request->session()->has('cart'))
        {
            $found = false;
            $newCart = array();
            foreach($request->session()->get('cart') as $product)
            {
                if ($product['id'] != $id)
                    array_push($newCart, $product);
                else 
                {
                    $found = true;
                    array_push($newCart, ['id' => $id, 'quantity' => $quantity]);
                }
            }
            if (!$found)
                array_push($newCart, ['id' => $id, 'quantity' => $quantity]);
            $request->session()->put('cart', $newCart);
        }
        else 
        {
            $request->session()->push('cart', ['id' => $id, 'quantity' => $quantity]);
        }

        // Messsage to blade view if success
        return response()->json(['success' => 'Success']);
    }

    public function deleteAllCart()
    {
        session()->forget('cart');
        return response()->json(['success' => 'Success']);
    }

    public function deleteItemCart(Request $request)
    {
        if ($request->session()->has('cart'))
        {
            $newCart = array();
            foreach ($request->session()->get('cart') as $product)
            {
                $found = false;
                foreach ($request->input('ids') as $id)
                {
                    if ($product['id'] == $id)
                    {
                        $found = true;
                        break;
                    }
                }
                if (!$found)
                    array_push($newCart, $product);
            }
            $request->session()->put('cart', $newCart);
            if (count($request->session()->get('cart')) == 0) 
            {
                $request->session()->forget('cart');
                return response()->json(['empty' => true]);
            }
        }

        // Messsage to blade view if success
        return response()->json(['success' => 'Success']);
    }

    public function order(Request $request)
    {
        dd($request->all());
    }
}
