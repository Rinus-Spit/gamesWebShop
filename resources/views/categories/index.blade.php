@extends ('layouts.layout')

@section ('content')

    <div id="wrapper">
        <div id="page" class="container">
            <div class="content">
                <ul class="style1">
                @foreach ($categories as $category)
                    <li class="">
                        <h3>
                            {{ $category->name }}
                            @can('update', App\Category::class)
                            <a href="{{ route('categories.edit', $category) }}">
                            <i class="fas fa-edit"></i>
                            </a>
                            @endcan
                            @can('delete', App\Category::class)
                            <form class="inline" method="post" action="{{ route('categories.destroy',$category->id,false) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            @endcan
                        </h3>
                    </li>
                @endforeach
                </ul>
                {{ $categories->links() }}
                @can('create', App\Category::class)
                <p>
                    <a href="{{ route('categories.create') }}">Voeg nieuwe categorie toe</a>
                </p>
                @endcan
            </div>
        </div>
    </div>

@endsection
