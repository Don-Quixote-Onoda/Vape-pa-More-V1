<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Payment;

class AdminOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $customers = Customer::orderBy('id', 'desc')->get();
        $payments = Payment::orderBy('id', 'desc')->get();

        return view('orders.index', ['orders' => $orders, 'customers' => $customers, 'payments' => $payments]);
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
            'customer_id' => 'required',
            'payment_id' => 'required'
        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->customer_id = $request->customer_id;
        $order->payment_id = $request->payment_id;
        $order->save();

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
        $order = Order::find($id);
        $payments = Payment::orderBy('id', 'desc')->get();
        $customers = Customer::orderBy('id', 'desc')->get();

        return view('orders.edit', ['order' => $order, 'payments' => $payments, 'customers' => $customers]);
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
            'customer_id' => 'required',
            'payment_id' => 'required'
        ]);

        $order = Order::find($id);
        $order->user_id = auth()->user()->id;
        $order->customer_id = $request->customer_id;
        $order->payment_id = $request->payment_id;
        $order->save();

        return redirect('/admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect()->back();
    }
}
