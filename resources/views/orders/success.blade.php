@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h3>Bestelling {{ $order->id }} is betaald</h3>
            <div class="table">
                <div class="tr">
                    <span class="td font-weight-bold" >
                        Artikel
                    </span>
                    <span class="td font-weight-bold" >
                        Prijs per stuk
                    </span>
                    <span class="td font-weight-bold" >
                        Aantal
                    </span>
                    <span class="td font-weight-bold" >
                        Totaalbedrag
                    </span>
                </div>
            @foreach ($order->order_lines as $order_line)
                <div class="tr">
                    <span class="td">
                        {{ $order_line->product->name }}
                    </span>
                    <span class="td price">
                    @money($order_line->price)
                    </span>
                    <span class="td amount">
                    {{ $order_line->quantity }}
                    </span>
                    <span class="td">
                        Totaal: 
                    </span>
                    <span class="td price">
                        <spam class="price">@money($order_line->quantity * $order_line->price)</span>
                    </span>
                </div>
            @endforeach
                <div class="tr">
                    <span class="td">
                    </span>
                    <span class="td price">
                    </span>
                    <span class="td amount">
                    </span>
                    <span class="td">
                        <hr style="border: 1px solid black;">
                    </span>
                    <span class="td price">
                    <hr style="border: 1px solid black;">
                    </span>
                </div>
                <div class="tr">
                    <span class="td">
                    </span>
                    <span class="td price">
                    </span>
                    <span class="td amount">
                    </span>
                    <span class="td">
                        Totaal: 
                    </span>
                    <span class="td price">
                        <spam class="price">@money($order->amount)</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

@endsection
