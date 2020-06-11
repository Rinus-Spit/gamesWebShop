<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = Product::all()->where('on_sale',1);
        $popular = DB::table('products')->leftJoin('order_lines','products.id','=','order_lines.product_id')
        ->leftJoin('orders','orders.id','=','order_lines.order_id')
        ->whereRaw('orders.status = "isPaid"')
        ->selectRaw('products.*, COALESCE(sum(order_lines.quantity),0) total')
        ->groupBy('products.id')
        ->orderBy('total','desc')
        ->take(8)
        ->get();
        $ratings = DB::table('products')->leftJoin('ratings','products.id','=','ratings.product_id')
        ->selectRaw('products.*, COALESCE(avg(ratings.rating),0) rating')
        ->groupBy('products.id')
        ->orderBy('rating','desc')
        ->take(8)
        ->get();
        $products = Product::latest()->paginate(8);
        $categories = Category::all();
        //dd($popular);
        return view('home', ['products' => $products, 'categories' => $categories, 'sales' => $sales, 'popular' => $popular, 'ratings' => $ratings]);
    }
}
