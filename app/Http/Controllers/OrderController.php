<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //if (old($order->delivery_street)) dd(old($order->delivery_street));
        return view('orders.edit', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $attributes = $this->validateOrder();
        $order->update($attributes);
        //$order->preparePayment();
        $order->update(['status'=>'isPaid']);
        return redirect(route('orders.success',$order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    /**
     * Order has been paid.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function success(Order $order)
    {
        return view('orders.success',['order' => $order]);
    }

    protected function validateOrder()
    {
        return request()->validate([
            'delivery_street' => 'required',
            'delivery_number' => 'required',
            'delivery_postcode' => 'required',
            'delivery_city' => 'required',
            'payment_method' => 'required'
        ]);
    }

}
