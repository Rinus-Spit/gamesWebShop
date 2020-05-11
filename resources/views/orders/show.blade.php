@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
            @foreach ($order->order_lines as $order_line)
                <li class="first">
                    <h3>{{ $orderline->id }}</h3>
                    <div class="order">
                        {{ $orderline->order_id }}
                    </div>
                    <div class="product">
                        {{ $orderline->product_id }}
                    </div>
                    <div class="user">
                        {{ $orderline->user_id }}
                    </div>
                    <div class="amount">
                        {{ $orderline->amount }}
                    </div>
                    <div class="price">
                        {{ $orderline->price }}
                    </div>
                    <div class="product">
                        Totaal: {{ $orderline->amount * $orderline->price }}
                    </div>
                    <!-- <div class="image">
                        <img src="{{ $product->image }}" alt="image" class="img-fluid">
                    </div> -->
                    <div class="description">
                        {{ $orderline->body }}
                    </div>
                </li>
            @endforeach
            </ul>

        </div>
    </div>

@endsection
