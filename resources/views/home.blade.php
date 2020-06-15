@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Games webshop</div>

                <div class="card-body">
                    @guest
                    Welkom gast!
                    @else
                    Welkom {{ Auth::user()->name }}
                    @endguest

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center pt-3">
        <div class="col-md-2">
            @foreach ($categories as $category)
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('categories.show', $category->name) }}"> {{ $category->name }} </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-10">
            <h2>Aanbieding</h2>
            <div class="row border border-success rounded">
            @foreach ($sales as $product)
            <div class="col-md-3">
                <div class="card-header">
                    <a href="{{ route('products.show', $product->id) }}"> {{ $product->name }} </a>
                </div>
                <div class="card-body">
                    {{ $product->excerpt }}
                </div>
                <div class="price">
                    @money($product->price)
                </div>
                @if ( $product->image )
                <div class="image">
                    <img src="images/products/{{ $product->image }}" alt="image" class="img-fluid">
                </div>
                @endif
                @can ('create',App\Order::class)
                <div class="order_product">
                <button class="btn" type="submit"><a href="{{ route('orderlines.create', $product) }}">Bestel</a></button>
                </div>
                @endcan
            </div>
            @endforeach
            </div>
            <h2>Populair</h2>
            <div class="row border border-success rounded">
            @foreach ($popular as $product)
            <div class="col-md-3">
                <div class="card-header">
                    <a href="{{ route('products.show', $product->id) }}"> {{ $product->name }} </a>
                </div>
                <div class="card-body">
                    {{ $product->excerpt }}
                </div>
                <div class="price">
                    @money($product->price)
                </div>
                @if ( $product->image )
                <div class="image">
                    <img src="images/products/{{ $product->image }}" alt="image" class="img-fluid">
                </div>
                @endif
                @can ('create',App\Order::class)
                <div class="order_product">
                <button class="btn" type="submit"><a href="{{ route('orderlines.create', $product->id) }}">Bestel</a></button>
                </div>
                @endcan
            </div>
            @endforeach
            </div>
            <h2>Meest gewaardeerd</h2>
            <div class="row border border-success rounded">
            @foreach ($ratings as $product)
            <div class="col-md-3">
                <div class="card-header">
                    <a href="{{ route('products.show', $product->id) }}"> {{ $product->name }} </a>
                    {!! App\Product::find($product->id)->showStars($product->rating) !!}
                </div>
                <div class="card-body">
                    {{ $product->excerpt }}
                </div>
                <div class="price">
                    @money($product->price)
                </div>
                @if ( $product->image )
                <div class="image">
                    <img src="images/products/{{ $product->image }}" alt="image" class="img-fluid">
                </div>
                @endif
                @can ('create',App\Order::class)
                <div class="order_product">
                <button class="btn" type="submit"><a href="{{ route('orderlines.create', $product->id) }}">Bestel</a></button>
                </div>
                @endcan
            </div>
            @endforeach
            </div>
        </div>
        <div class="col-md-10 border border-success rounded">
            <h3>Games</h3>
            <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card-header">
                    <a href="{{ route('products.show', $product) }}"> {{ $product->name }} </a>
                </div>
                <div class="card-body">
                    {{ $product->excerpt }}
                </div>
                <div class="price">
                    @money($product->price)
                </div>
                @if ( $product->image )
                <div class="image">
                    <img src="images/products/{{ $product->image }}" alt="image" class="img-fluid">
                </div>
                @endif
                @can ('create',App\Order::class)
                <div class="order_product">
                <button class="btn" type="submit"><a href="{{ route('orderlines.create', $product) }}">Bestel</a></button>
                </div>
                @endcan
            </div>
            @endforeach
            </div>
            {{ $products->links() }}
        </div>
    <div>
</div>
@endsection
