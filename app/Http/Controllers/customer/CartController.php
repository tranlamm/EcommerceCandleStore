<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;

use Validator;

class CartController extends Controller
{
    public function showCart(Request $request)
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
        if (!$item)
            return response()->json(['errors' => 'Not enough']);
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

    public function deleteCart()
    {
        session()->forget('cart');
        return response()->json(['success' => 'Success']);
    }

    public function deleteItemsInCart(Request $request)
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
}
// test

