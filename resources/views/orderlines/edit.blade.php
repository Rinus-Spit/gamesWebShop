@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Bestelling</h1>

            <form method="post" action="{{ route('orderlines.update',$orderline) }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <!-- <label class="label" for="quantity">Aantal</label> -->
                    <div class="control">
                        <input 
                            class="input @error('quantity') alert-danger @enderror" 
                            type="number" 
                            name="quantity" 
                            id="product_quantity"
                            value="{{ $orderline->quantity }}">
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
