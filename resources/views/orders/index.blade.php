@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
            @foreach ($orders as $order)
                <li class="">
                    <h3>
                        {{ $order->id }} {{ $order->status }}
                        @if (($order->status == 'shopping' && can('update', App\Order::class)) || Auth::user()->isAn('admin'))
                        <a href="{{ route('orders.edit', $order) }}">
                        <i class="fas fa-edit"></i>
                        </a>
                        @endif
                        @if (($order->status == 'shopping' && can('delete', App\Order::class)) || Auth::user()->isAn('admin'))
                        <form class="inline" method="post" action="{{ route('orders.destroy',$order->id,false) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endif
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
