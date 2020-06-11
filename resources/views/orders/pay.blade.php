@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <h3>{{ $order->id }}</h3>
            <div class="amount">
                <spam class="price">@money($order->amount)</span>
                </span>
            </div>
            <div>
            <a href="{{ route('orders.success',['order'=>$order]) }}"><button>succes</button></a>
            <a href="{{ route('orders.fail',['order'=>$order]) }}"><button>failure</button></a>
            </div>
        </div>
    </div>

@endsection
