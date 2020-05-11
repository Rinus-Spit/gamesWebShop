<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderLine;
use App\Product;
use Auth;

class OrderLineController extends Controller
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
    public function create($product)
    {
        $user = Auth::user();
        $product = Product::find($product);
        // foreach ($user->orders as $order) {
        //     echo $order->id;
        // }
        // exit;
        // dd($user->orders);
        $order = $user->orders_status('shopping');
        // dd($user->orders);
        if (!$order) {
            $order = Order::create(['user_id' => $user->id])->id;
        } else {
            $order_id = $order->id;
        }
        return view('orderlines.create',['order' => $order_id, 'product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find(request('product_id'));
        $order = Order::find(request('order_id'));
        $orderline = OrderLine::create([
            'order_id' => request('order_id'),
            'user_id' => Auth::user()->id,
            'product_id' => request('product_id'),
            'quantity' => request('quantity'),
            'price' => $product->price]);

        return redirect(route('orders.show',$order));
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
        //
    }
}
