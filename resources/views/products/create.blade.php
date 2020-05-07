@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Nieuw product</h1>

            <form method="post" action="{{ route('products.store') }}">
                @csrf

                <div class="field">
                    <label class="label" for="name">Naam</label>
                    <div class="control">
                        <input 
                            class="input @error('name') alert-danger @enderror" 
                            type="text" 
                            name="name" 
                            id="product_name"
                            value="{{ old('name') }}">
                    @error('name')
                        <p class="help alert-danger">{{ $errors->first('name') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Samenvatting</label>
                    <div class="control">
                        <input 
                            class="input @error('excerpt') alert-danger @enderror" 
                            type="text" 
                            name="excerpt" 
                            id="product_excerpt"
                            value="{{ old('excerpt') }}">
                    @error('excerpt')
                        <p class="help alert-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Beschrijving</label>
                    <div class="control">
                        <textarea 
                            class="input @error('body') alert-danger @enderror" 
                            type="text" 
                            name="body" 
                            id="product_body">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="help alert-danger">{{ $errors->first('body') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="price">Prijs</label>
                    <div class="control">
                        <input 
                            class="input @error('price') alert-danger @enderror" 
                            type="text" 
                            name="price" 
                            id="product_price"
                            value="{{ old('price') }}">
                    @error('excerpt')
                        <p class="help alert-danger">{{ $errors->first('price') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="stock">Voorraad</label>
                    <div class="control">
                        <input 
                            class="input @error('stock') alert-danger @enderror" 
                            type="text" 
                            name="stock" 
                            id="product_stock"
                            value="{{ old('stock') }}">
                    @error('excerpt')
                        <p class="help alert-danger">{{ $errors->first('stock') }}</p>
                    @enderror
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
                            {{ old('on_sale') ? 'checked' : '' }} >
                    @error('excerpt')
                        <p class="help alert-danger">{{ $errors->first('on_sale') }}</p>
                    @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 form-group">
                    
                        <label class="control-label" for="category">Categorieën</label>
                        <select id="category" multiple name="category[]">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        <button class="button is-link" type="submit">Voeg product toe</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
