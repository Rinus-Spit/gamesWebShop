@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Pas category aan</h1>

            <form method="post" action="{{ route('categories.update', ['category' => $category->id]) }}">
                @csrf
                @method('PUT')

                <div class="field">
                    <label class="label" for="name">Naam</label>
                    <div class="control">
                        <input class="input" type="text" name="name" id="category_name" value="{{ $category->name }}">
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button class="btn btn-success is-link" type="submit">Pas categorie aan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection

@section ('javascript')


@endsection