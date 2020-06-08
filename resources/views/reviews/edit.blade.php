@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h1>Pas Review aan</h1>

            <form method="post" action="/reviews/{{ $review->id }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                <div class="field">
                    <label class="label" for="body">Beschrijving</label>
                    <div class="control">
                        <textarea class="input" type="text" name="body" id="review_body" >{{ $review->body }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Pas Review aan</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

@endsection

@section ('javascript')


@endsection