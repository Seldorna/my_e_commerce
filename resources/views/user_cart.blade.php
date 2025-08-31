@extends('layout.mainpage')
@section('content')
@if(count($products))
@foreach($products as $product)
    <div>
        {{ $product->name }}
        <form method="POST" action="{{ route('update_cart_quantity', $product->id) }}">
            @csrf
            <input type="number" name="quantity" value="{{ $cart[$product->id] }}" min="1" class="form-control" style="width: 80px; display: inline;">
            <button type="submit">Update</button>
        </form>
    </div>
@endforeach
<form method="POST" action="{{ route('checkout_cart') }}" style="margin-top: 20px;">
    @csrf
    <button type="submit">Purchase All</button>
</form>
@else
    <p>Your cart is empty.</p>
@endif