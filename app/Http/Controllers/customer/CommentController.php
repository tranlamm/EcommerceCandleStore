<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Comment;

use Validator;
use Auth;
use DB;

class CommentController extends Controller
{
    public function postReview(Request $request, $product_id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'point' => 'required|numeric|min:0|max:5',
        ]);

        if ($validator->fails())
            return response()->json(['errors' => 'Failed review']);

        $product = Product::find($product_id);
        if (!$product) 
            return response()->json(['errors' => 'Failed review']);
        // End Validate
        $customer = Auth::guard('customer')->user();
        $point = $request->input('point');

        if ($customer->productReview()->where('product_id', '=', $product_id)->exists())
        {
            $newTotalPoint = $product->diemDanhGia * $product->luotDanhGia 
            - $customer->productReview()->where('product_id', '=', $product_id)->first()->pivot->point + $point;
            $product->diemDanhGia = $newTotalPoint / $product->luotDanhGia;
            $product->save();
            $customer->productReview()->updateExistingPivot($product_id, [
                'point' => $point,
            ]);
        }
        else 
        {   
            $oldTotalPoint = $product->diemDanhGia * $product->luotDanhGia;
            $product->luotDanhGia++;
            $product->diemDanhGia = ($oldTotalPoint + $point) / $product->luotDanhGia;
            $product->save();
            $customer->productReview()->attach([$product_id => [
                'point' => $point,
            ]]);
        }

        return response()->json(['success' => 'Success']);
    }

    public function postComment(Request $request, $product_id)
    {
        // Validate
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails())
            return back();

        $product = Product::find($product_id);
        if (!$product) 
            return back();
        // End Validate
        $comment = $request->input('comment');

        Auth::guard('customer')->user()->productComment()->attach([$product_id => [
            'comment' => $comment,
        ]]);

        return back();
    }

    public function deleteComment(Request $request)
    {
        $request->validate([
            'comment_id' => 'bail|required',
        ]);

        $found = false;
        foreach (Auth::guard('customer')->user()->productComment as $comment)
        {
            if ($comment->pivot->id == $request->input('comment_id'))
            {
                $found = true;
                break;
            }
        }

        if (!$found)
            return response()->json(['errors' => 'Failed review']);

        $comment = Comment::find($request->input('comment_id'));
        $comment->delete();
        return response()->json(['success' => 'Success']);
    }
}
