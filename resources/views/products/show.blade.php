@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
                <li class="first">
                    <h3>{{ $product->name }}</h3>
                    <div class="excerpt">
                        {{ $product->excerpt }}
                    </div>
                    <!-- <div class="image">
                        <img src="{{ $product->image }}" alt="image" class="img-fluid">
                    </div> -->
                    <div class="description">
                        {{ $product->body }}
                    </div>
                    <div class="price">
                        Prijs: @money($product->price)
                    </div>
                    <div class="stock">
                        Voorraad: {{ $product->stock }} stuks
                    </div>
                    @if ($product->on_sale)
                    <div class="on_sale">
                        Aanbieding!
                    </div>
                    @endif
                    <div class="categories">
                        @foreach ($product->categories as $category)
                            <!-- route('categories.show',$category->name) -->
                            <a href="{{ route('categories.show',$category->name) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

        </div>
    </div>

@endsection
