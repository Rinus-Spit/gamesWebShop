@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
                <li class="first">
                    <h3>{{ $product->name }} 
                        {!!$rating!!}
                    </h3>
                    <div class="excerpt">
                        {{ $product->excerpt }} 
                    </div>
                    <!-- <div class="image">
                        <img src="{{ $product->image }}" alt="image" class="img-fluid">
                    </div> -->
                    <div class="description">
                        {{ $product->body }}
                    </div>
                    @if ( $product->image )
                    <div class="image">
                        <img src="{{ URL::to('/images/products/'.$product->image) }}" alt="image" class="img-fluid">
                    </div>
                    @endif
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
                    <div class="stars">
                        <form action="/products/{{ $product->id}}/star" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="link" type="submit" name="rating" value="1"><i class="fa fa-star text-warning" aria-hidden="true" id="star1"></i></button>
                        <button class="link" type="submit" name="rating" value="2"><i class="fa fa-star text-warning" aria-hidden="true" id="star2"></i></button>
                        <button class="link" type="submit" name="rating" value="3"><i class="fa fa-star text-warning" aria-hidden="true" id="star3"></i></button>
                        <button class="link" type="submit" name="rating" value="4"><i class="fa fa-star text-warning" aria-hidden="true" id="star4"></i></button>
                        <button class="link" type="submit" name="rating" value="5"><i class="fa fa-star text-warning" aria-hidden="true" id="star5"></i></button>
                        </form>

                        <a href="/products/{{ $product->id}}/review"><button class="btn btn-info">Schrijf een Review</button></a>
                    </div>
                    <div class="reviews">
                        @foreach ($product->reviews as $review)
                        <div class="review">
                            @if ($review->id === auth()->user()->id)
                            <form  method="post" action="{{ route('reviews.destroy',$review->pivot->id,false) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_id" value="{{$product->id }}">
                            <a href="/reviews/{{$product->id }}/{{$review->pivot->id}}/edit">
                            @endif
                            {{ $review->pivot->body }}
                            @if ($review->id === auth()->user()->id)
                            </a>
                            <button class="btn" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                            @endif
                            
                        </div>
                        @endforeach
                    </div>
                    @can ('create',App\Order::class)
                    <div class="order_product">
                    <button class="btn" type="submit"><a href="{{ route('orderlines.create', $product) }}">Bestel</a></button>
                    </div>
                    @endcan
                </li>
            </ul>

        </div>
    </div>

@endsection
