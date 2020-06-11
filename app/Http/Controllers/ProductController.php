<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(8);
        //dd($products);

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($this->validateProduct());
        $product->categories()->sync((array)$request->input('category'));

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $rating =  $product->ratings->find(auth()->user()->id);
        if ($rating) {
            $stars = $rating->pivot->rating;
        } else {
            $stars = 0;
        }
        $showstars = '';
        //$tel = intval($stars);
        //$showstars .= $stars;
        //$showstars .= $tel;
        for ($i=0;$i<$stars;$i++) {
            $showstars .=  '<i class="fa fa-star text-warning" aria-hidden="true"></i>';
        }
    return view('products.show', ['product' => $product, 'rating' => $showstars]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //$attributes = $this->validateProduct();
        $product->update($this->validateProduct());
        $product->categories()->sync((array)$request->input('category'));

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete($product);

        return redirect(route('products.index'));
    }

    protected function validateProduct()
    {
        return request()->validate([
            'name' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'on_sale' => 'boolean'
        ]);
    }


}
