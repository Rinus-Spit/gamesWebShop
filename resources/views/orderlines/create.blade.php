@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Nieuwe category</h1>

            <form method="post" action="{{ route('categories.store') }}">
                @csrf

                <div class="field">
                    <label class="label" for="name">Naam</label>
                    <div class="control">
                        <input 
                            class="input @error('name') alert-danger @enderror" 
                            type="text" 
                            name="name" 
                            id="category_name"
                            value="{{ old('name') }}">
                    @error('name')
                        <p class="help alert-danger">{{ $errors->first('name') }}</p>
                    @enderror
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Voeg categorie toe</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@endsection
