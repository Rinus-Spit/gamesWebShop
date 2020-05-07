@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
            @foreach ($products as $product)
                <li class="">
                    <h3>
                        <a href="{{ route('products.show', $product) }}"> {{ $product->name }} </a>
                        @can('update', App\Product::class)
                        <a href="{{ route('products.edit', $product) }}">
                        <i class="fas fa-edit"></i>
                        </a>
                        @endcan
                        @can('delete', App\Product::class)
                        <form class="inline" method="post" action="{{ route('products.destroy',$product->id,false) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endcan
                    </h3>
                    <div class="body">
                        {{ $product->body }}
                    </div>
                    @if ( $product->image )
                    <div class="image">
                        <img src="{{ $product->image }}" alt="image" class="img-fluid">
                    </div>
                    @endif
                </li>
            @endforeach
            </ul>
            {{ $products->links() }}
            @can('create', App\Product::class)
            <p>
                <a href="{{ route('products.create') }}">Voeg nieuw product toe</a>
            </p>
            @endcan
        </div>
    </div>

@endsection
