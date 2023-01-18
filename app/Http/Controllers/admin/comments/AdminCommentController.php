<?php

namespace App\Http\Controllers\admin\comments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\products\Product;
use App\Models\products\Comment;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $search = $request->input('search');
        if ($search)
        {
            $comments = Comment::whereIn('product_id', Product::select('id')->where('tenSanPham', 'LIKE', "%{$search}%"))
                ->paginate(10);
        }
        else 
        {
            if ($request->input('order-name')) {
                $comments = Comment::query()
                    ->orderBy($request->input('order-name'), ($request->input('order-type') ? $request->input('order-type') : 'asc'))
                    ->paginate(10);
            }
            else {
                $comments = Comment::query()
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
            }
        }

        return view('admin.comments.commentShow', [
            'comments' => $comments,
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(route('comment.index'))->with('message', 'Deleted successfully!');
    }
}
