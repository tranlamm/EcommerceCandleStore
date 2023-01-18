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
    public function getCurrentUser(Request $request, $id)
    {
        if (!Auth::guard('customer')->check())
            return response()->json(['error' => 'You are not logged']);

        $comment = Comment::where('product_id', $id)
                          ->where('account_id', Auth::guard('customer')->user()->id)                    
                          ->first();
        
        if ($comment)
            return response()->json([
                'hasReviewed' => true,
                'review' => $comment,
            ]);
        else 
            return response()->json([
                'hasReviewed' => false,
            ]);
    }

    public function getProductReviewInfo(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product)
            return response()->json(['error' => 'Product is invalid']);

        $comments = $product->productReview()->get();

        return response()->json([
            'product' => $product,
            'comments' => $comments,
        ]);
    }

    public function deleteReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'bail|required|numeric',
        ]);

        if (!Auth::guard('customer')->check())
            return response()->json(['error' => 'You are not logged']);

        if ($validator->fails())
            return response()->json(['error' => 'Deleted Failed']);

        $comment = Comment::where('product_id', $request->input('id'))
                        ->where('account_id', Auth::guard('customer')->user()->id)                    
                        ->first();
        if (!$comment)
            return response()->json(['error' => 'Deleted Failed']);
        
        $product = $comment->product()->first();
        $oldPoint = $product->diemDanhGia;
        $oldReviewers = $product->luotDanhGia;
        $product->luotDanhGia--;
        if ($product->luotDanhGia == 0)
            $product->diemDanhGia = 0;
        else
            $product->diemDanhGia = ($oldPoint * $oldReviewers - $comment->point) / $product->luotDanhGia;
        $product->save();
        $comment->delete();
        return response()->json(['success' => 'Deleted Successfully']);
    }

    public function postReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'bail|required|numeric',
            'point' => 'required|numeric|min:0|max:5',
            'comment' => 'required',
        ]);
        if (!Auth::guard('customer')->check())
            return response()->json(['error' => 'You are not logged']);

        if ($validator->fails())
            return response()->json(['error' => 'Yêu cầu nhập đầy đủ thông tin đánh giá']);

        $id = $request->input('id');
        $point = $request->input('point');
        $comment = $request->input('comment');

        $product = Product::find($id);
        if (!$product) 
            return response()->json(['error' => 'Sản phẩm đánh giá không hợp lệ']);

        // Customer had bought product
        $customer = Auth::guard('customer')->user();
        $hadBought = DB::table('online_invoices')
            ->join('online_invoice_product', 'online_invoices.id', '=', 'online_invoice_product.online_invoice_id')
            ->where('online_invoices.account_id', '=', $customer->id)
            ->where('online_invoices.trangThai', '=', 'finished')
            ->where('online_invoice_product.product_id', '=', $id)
            ->first();
        if (!$hadBought)
            return response()->json(['error' => 'Quý khách cần nhận sản phẩm trước khi đánh giá !']);
        // End Validate
        
        $reviewExisted = Comment::where('account_id', $customer->id)
                                ->where('product_id', $id)
                                ->first();

        $oldPoint = $product->diemDanhGia;
        $oldReviewers = $product->luotDanhGia;
        if ($reviewExisted)
        {
            $product->diemDanhGia = ($oldPoint * $oldReviewers - $reviewExisted->point + $point) / $oldReviewers;
            $product->save(); 
            $customer->productReview()->updateExistingPivot($id, [
                'point' => $point,
                'comment' => $comment,
            ]);
        }
        else 
        {
            $product->luotDanhGia++;
            $product->diemDanhGia = ($oldPoint * $oldReviewers + $point) / $product->luotDanhGia;
            $product->save();
            $customer->productReview()->attach([$id => [
                'point' => $point,
                'comment' => $comment,
            ]]);
        }

        return response()->json(['success' => 'Cảm ơn quý khách đã đóng góp ý kiến']);
    }
}
