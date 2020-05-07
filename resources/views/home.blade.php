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
    <div class="row justify-content-center">
        @foreach ($categories as $category)
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('categories.show', $category->name) }}"> {{ $category->name }} </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        @foreach ($products as $product)
        <div class="col-md-4">
            <!-- <div class="card"> -->
                <div class="card-header">
                    <a href="{{ route('products.show', $product) }}"> {{ $product->name }} </a>
                </div>
                <div class="card-body">
                    {{ $product->excerpt }}
                </div>
                @if ( $product->image )
                <div class="image">
                    <img src="{{ $product->image }}" alt="image" class="img-fluid">
                </div>
                @endif
                <div class="order_product">
                <form action="{{ route(orders.index) }}" method="get">
                    <button class="btn" type="submit">Bestel</button>
                </form>
                </div>
            <!-- </div> -->
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
    <div>
        <?php
        ?>
    </div>
</div>
@endsection
