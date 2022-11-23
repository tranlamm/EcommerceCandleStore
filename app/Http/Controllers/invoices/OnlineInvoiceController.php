<?php

namespace App\Http\Controllers\invoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\invoices\OnlineInvoice;
use App\Models\products\Product;

class OnlineInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trangThai = $request->input('trangThai');
        if ($request->input('order-name')) {
            $onlineInvoices = OnlineInvoice::where('trangThai', 'LIKE', "%{$trangThai}%")
                ->orderBy($request->input('order-name'), (in_array($request->input('order-type'), ['asc', 'desc'], true) ? $request->input('order-type') : 'asc'))
                ->paginate(10);
        }
        else {
            $onlineInvoices = OnlineInvoice::where('trangThai', 'LIKE', "%{$trangThai}%")
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('admin.invoices.onlineInvoiceShow', [
            'onlineInvoices' => $onlineInvoices,
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
        $onlineInvoice = OnlineInvoice::find($id);
        return view('admin.invoices.onlineInvoiceDetail', [
            'onlineInvoice' => $onlineInvoice,
        ]);
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
        $invoice = OnlineInvoice::find($id);
        $invoice->delete();
        return redirect(route('onlineinvoice.index'))->with('message', 'Deleted successfully!');
    }

    public function finish($id)
    {
        $invoice = OnlineInvoice::find($id);
        $invoice->trangThai = 'finished';
        $invoice->save();
        return redirect(route('onlineinvoice.index'))->with('message', 'Finished invoice successfully!');
    }

    public function cancel($id)
    {
        $invoice = OnlineInvoice::find($id);

        foreach ($invoice->products as $product)
        {
            $product->conLai += $product->pivot->soLuong;
            $product->daBan -= $product->pivot->soLuong;
            $product->save();
        }

        $invoice->delete();
        return redirect(route('onlineinvoice.index'))->with('message', 'Cancelled invoice successfully!');
    }
}
