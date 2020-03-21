<a href="{{ route('orders.index') }}" class="btn btn-default">Terug</a>

<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <h3 style="width:100%; text-align: center;">E-mail naar {{ $order->company->name }}</h3>
                {!! (new \App\Mail\NewOrderCompany($order))->render() !!}

                <h3 style="width:100%; text-align: center;">E-mail naar klant</h3>
                {!! (new \App\Mail\NewOrderCustomer($order))->render() !!}
            </div>

        </div>
    </div>
</div>



