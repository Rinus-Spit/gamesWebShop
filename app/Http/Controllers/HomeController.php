<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


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
        $products = Product::latest()->paginate(8);
        $categories = Category::all();
        //dd($sales);
        return view('home', ['products' => $products, 'categories' => $categories, 'sales' => $sales]);
    }
}
