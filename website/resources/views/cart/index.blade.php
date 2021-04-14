@extends('layouts.app')

@section('content')
<p>Nazwa - Ilość - Cena</p>
@foreach ($cart as $product)
<p>{!!$product['name']!!} - {!!$product['amount']!!} - {!!$product['price']!!} <a href="{{ route('cart.remove', [$loop->index]) }}"><button class="btn btn-danger">X</button></a></p>
@endforeach
<p>Wartość zamówienia: {!!$value!!}</p>
@endsection
