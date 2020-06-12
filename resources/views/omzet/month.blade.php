@extends ('layouts.layout')

@section ('content')

    <div id="page" class="container">
        <div class="content">
            <ul class="style1">
                <li class="">
                    <div class="amount">
                    Totale omzet: @money($totals[0]->total_amount)
                    </div>
                </li>
                <li class="">
                    <div class="amount">
                    BTW totale omzet: @money($totals[0]->total_tax_amount)
                    </div>
                </li>
            </ul>
        </div>
    </div>

@endsection
