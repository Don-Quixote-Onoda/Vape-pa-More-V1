<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryControl;
use App\Models\Product;

class AdminInventoryControlsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventory_controls = InventoryControl::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();

        return view('inventory-controls.index', ['inventory_controls' => $inventory_controls, 'products' => $products]);
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
            'quantity_stock' => 'required|integer',
            'product_id' => 'required'
        ]);

        $inventory_control = new InventoryControl;
        $inventory_control->quantity_stock = $request->quantity_stock;
        $inventory_control->product_id = $request->product_id;
        $inventory_control->save();

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
        $inventory_control = InventoryControl::find($id);
        $products = Product::orderBy('id', 'desc')->get();

        return view('inventory-controls.edit', ['inventory_control'=>    $inventory_control, 'products' => $products]);
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
        $inventory_control = InventoryControl::find($id);

        $inventory_control->quantity_stock = $request->quantity_stock;
        $inventory_control->product_id = $request->product_id;

        $inventory_control->save();

        return redirect('/admin/inventory_controls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory_control = InventoryControl::find($id);
        $inventory_control->delete();

        return redirect()->back();
    }
}
