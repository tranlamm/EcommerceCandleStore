<?php

namespace App\Http\Controllers\admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Comment;

use DB;

class ReviewController extends Controller
{
    public function showReview(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) return back();

        return view('admin.products.productReview', [
            'product' => $product,
        ]);
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('message', 'Deleted successfully!');
    }
}
