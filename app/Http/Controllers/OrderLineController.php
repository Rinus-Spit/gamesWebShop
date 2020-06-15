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
            $order = Order::create([
                'user_id' => $user->id,
                'delivery_street' => $user->street,
                'delivery_number' => $user->number,
                'delivery_postcode' => $user->postcode,
                'delivery_city' => $user->city,
                'delivery_country' => $user->country,
                'invoice_street' => $user->street,
                'invoice_number' => $user->number,
                'invoice_postcode' => $user->postcode,
                'invoice_city' => $user->city,
                'invoice_country' => $user->country
                ])->id;
            return view('orderlines.create',['order' => $order, 'product' => $product]);
        } else {
            $order_id = $order->id;
            $orderline = OrderLine::where([['order_id',$order_id],['product_id',$product->id]] )->first();
            if ($orderline) {
                return redirect(route('orderlines.edit', $orderline));
            } else {
                return view('orderlines.create',['order' => $order_id, 'product' => $product]);
            }
        }
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
        request()->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'integer|max:'.$product->stock
        ],
        ['quantity.max' => 'Er is niet genoeg in voorraad, de voorraad is '.$product->stock]
        );
        //$order = Order::find(request('order_id'));
        $orderline = OrderLine::create([
            'order_id' => request('order_id'),
            'user_id' => Auth::user()->id,
            'product_id' => request('product_id'),
            'quantity' => request('quantity'),
            'price' => $product->price]);
        $orderline->update_stock($orderline->quantity);
        $orderline->order->update_amount();

        return redirect(route('orders.show',$orderline->order_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLine $orderline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLine $orderline)
    {
        $product = Product::find($orderline->product_id);
        return view('orderlines.edit',['orderline' => $orderline,'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLine $orderline)
    {
        $stock_update = $request->input('quantity') - $orderline->quantity;
        $orderline->update(['quantity' => $request->input('quantity')]);
        $orderline->update_stock($stock_update);
        $orderline->order->update_amount();
        //dd($request);

        return redirect(route('orders.show', $orderline->order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLine $orderline)
    {
        $orderline->update_stock(-$orderline->quantity);
        $orderline->delete($orderline);

        return redirect(route('order.index'));
    }

    protected function validateOrderLine($stock)
    {
        return request()->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'integer|max:'.$stock
        ]);
    }

}
