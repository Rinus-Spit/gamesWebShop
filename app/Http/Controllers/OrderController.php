<?php

namespace App\Http\Controllers;

use App\Order;
use Auth;
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
        $user = Auth::user();
        if ($user->isAn('admin')) {
            $orders = Order::get()->paginate(8);
        } else {
            $orders = Order::where('user_id',$user->id)->get()->paginate(8);
        }
        return view('orders.index', ['orders' => $orders]);
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
        if ((Auth::user()->id) == $order->user_id )
        {
            return view('orders.topay', ['order' => $order]);
        } else
        {
            return view('orders.edit', ['order' => $order]);
        }
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
        $order->update_stock();
        $order->update(['status'=>'isPaid']);
        return redirect(route('orders.pay',$order->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        foreach ($order->order_lines as $orderline)
        {
            $orderline->update_stock(-$orderline->quantity);
            $orderline->delete($orderline->id);
            //dd($orderline);
        }
        $order->delete($order);

        if (Auth::user()->isAn('admin'))
        {
            return redirect(route('orders.index'));
        }

        return redirect(route('home'));
    }

    /**
     * Pay order.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function pay(Order $order)
    {
        return view('orders.pay',['order' => $order]);
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

    /**
     * Order has been paid.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function fail(Order $order)
    {
        return view('orders.fail',['order' => $order]);
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
