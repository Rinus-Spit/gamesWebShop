@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Pas product aan</h1>

            <form method="post" action="{{ route('products.update', ['product' => $product->id]) }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="name">Naam</label>
                    <div class="control">
                        <input class="input" type="text" name="name" id="product_name" value="{{ $product->name }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Samenvatting</label>
                    <div class="control">
                        <input class="input" type="text" name="excerpt" id="product_excerpt" value="{{ $product->excerpt }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Beschrijving</label>
                    <div class="control">
                        <textarea class="input" 
                               type="text" 
                               name="body"
                               id="product_body">{{ $product->body }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="price">Prijs</label>
                    <div class="control">
                        <input class="input" type="text" name="price" id="product_price" value="{{ $product->price }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="stock">Voorraad</label>
                    <div class="control">
                        <input class="input" type="text" name="stock" id="product_stock" value="{{ $product->stock }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="on_sale">Aanbieding</label>
                    <div class="control">
                    <input 
                            class="input @error('on_sale') alert-danger @enderror" 
                            type="checkbox" 
                            name="on_sale" 
                            id="product_on_sale"
                            value="1"
                            {{ old($product->on_sale) ? 'checked' : '' }} >
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                    
                        <label class="control-label" for="category">Categorieën</label>
                        <select id="category" multiple name="category[]">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($product->hasCategory($category)) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <p class="help-block"></p>
                        @if($errors->has('category'))
                            <p class="help-block">
                                {{ $errors->first('category') }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="btn btn-success is-link" type="submit">Pas product aan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

@section ('javascript')


@endsection