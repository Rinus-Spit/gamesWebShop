@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
            @foreach ($orders as $order)
                <li class="">
                    <h3>
                        {{ $order->id }} {{ $order->status }}
                        @can('update', App\Order::class)
                        <a href="{{ route('orders.edit', $order) }}">
                        <i class="fas fa-edit"></i>
                        </a>
                        @endcan
                        @can('delete', App\Order::class)
                        <form class="inline" method="post" action="{{ route('orders.destroy',$order->id,false) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endcan
                    </h3>
                    <div class="user">
                    {{ App\User::find($order->user_id)->name}}
                    </div>
                    <div class="amount">
                    Bedrag: @money($order->amount)
                    </div>
                    <div class="amount">
                    BTW bedrag: @money($order->tax_amount)
                    </div>
                </li>
            @endforeach
            </ul>
            {{ $orders->links() }}
        </div>
    </div>

@endsection
