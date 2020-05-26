@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Afrekenen</h1>

            <form method="post" action="{{ route('orders.update', ['order' => $order->id]) }}">
                @csrf
                @method('PUT')

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
            </div>
                <div class="field">
                    <label class="label" for="delivery_street">Straat</label>
                    <span class="control">
                        <input class="input" type="text" name="delivery_street" id="order_delivery_street" value="{{ $order->delivery_street }}">
                    </span>
                    <label class="label" for="delivery_number">huisnummer</label>
                    <span class="control">
                        <input class="input" type="text" name="delivery_number" id="order_delivery_number" value="{{ $order->delivery_number }}">
                    </span>
                </div>

                <div class="field">
                <label class="label" for="delivery_postcode">postcode</label>
                    <span class="control">
                        <input class="input" type="text" name="delivery_postcode" id="order_delivery_postcode" value="{{ $order->delivery_postcode }}">
                    </span>
                    <label class="label" for="delivery_city">stad</label>
                    <span class="control">
                        <input class="input" type="text" name="delivery_city" id="order_delivery_city" value="{{ $order->delivery_city }}">
                    </span>
                </div>

                <div class="field">
                    <label class="label" for="payment_method">Betaalwijze</label>
                    <div class="control">
                    <select id="category" multiple name="category[]">
                        <option value="Ideal" {{ ($order->payment_method == 'Ideal') ? 'selected' : '' }}>Ideal</option>
                    </select>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="btn btn-success is-link" type="submit">betalen</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

@section ('javascript')


@endsection