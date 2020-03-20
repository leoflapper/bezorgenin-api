<a href="{{ route('orders.index') }}" class="btn btn-default">Terug</a>
{!! (new \App\Mail\NewOrderCustomer($order))->render() !!}
