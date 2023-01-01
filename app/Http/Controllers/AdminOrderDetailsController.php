<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;

class AdminOrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetails = OrderDetail::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();

        return view('order-details.index', ['order_details'=>$orderDetails, 'products'=>$products]);
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
        $this->validate($request, [
            'quantity_order' => 'required',
            'product_id' => 'required'
        ]);

        $order_detail = new OrderDetail;
        $order_detail->quantity_order = $request->quantity_order;
        $order_detail->product_id = $request->product_id;
        $order_detail->save();

        return redirect()->back();
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
        $orderDetail = OrderDetail::find($id);
        $products = Product::orderBy('id', 'desc')->get();

        return view('order-details.edit', ['order_detail'=>$orderDetail, 'products'=>$products]);
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

        $this->validate($request, [
            'quantity_order' => 'required',
            'product_id' => 'required'
        ]);


        $order_detail = OrderDetail::find($id);
        $order_detail->quantity_order = $request->quantity_order;
        $order_detail->product_id = $request->product_id;
        $order_detail->save();

        return redirect('/admin/order_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order_detail = OrderDetail::find($id);
        $order_detail->delete();

        return redirect()->back();
    }
}
