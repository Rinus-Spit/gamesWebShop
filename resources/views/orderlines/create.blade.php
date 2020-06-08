@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Bestelling</h1>

            <form method="post" action="{{ route('orderlines.store') }}">
                @csrf

                <div class="field">
                    <!-- <label class="label" for="quantity">Aantal</label> -->
                    <div class="control">
                        <input 
                            class="input @error('quantity') alert-danger @enderror" 
                            type="number" 
                            name="quantity" 
                            id="quantity"
                            value="1">
                        <input type="hidden" name="order_id" value="{{ $order }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    @error('quantity')
                        <p class="help alert-danger">{{ $errors->first('quantity') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="field">
                    {{ $product->name }}
                </div>

                <div class="field">
                    Prijs:  @money($product->price)
                </div>

                <div class="field">
                    Totaal:  @money($product->price)
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Bestel</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
