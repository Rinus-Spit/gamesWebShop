@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
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
                <form action="{{ route('orderlines.update', $order_line) }}" class="tr" method="POST">
                @csrf
                @method('PUT')
                    <span class="td">
                        {{ $order_line->product->name }}
                    </span>
                    <span class="td price">
                    @money($order_line->price)
                    </span>
                    <span class="td amount">
                    <input 
                            class="input @error('quantity') alert-danger @enderror" 
                            type="number" 
                            name="quantity" 
                            id="product_quantity"
                            value="{{ $order_line->quantity }}">
                    </span>
                    <span class="td">
                        Totaal: 
                    </span>
                    <span class="td price">
                        <spam class="price">@money($order_line->quantity * $order_line->price)</span>
                    </span>
                    <span class="td">
                    <button class="btn btn-success is-link" type="submit">Pas order aan</button>
                    </span>
                    </form>
                </form>
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
                    <span class="td">
                    <form action="{{ route('orders.destroy', $order) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success is-link" type="submit">Verwijder order</button>
                    </form>
                    </span>
                </div>
            </div>
            <button class="btn btn-success is-link" type="submit"><a href="{{ route('orders.edit', $order) }}">afrekenen</a></button>
        </div>
    </div>

@endsection
