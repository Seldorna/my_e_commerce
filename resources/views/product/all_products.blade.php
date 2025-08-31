@extends('layout.mainpage');
@section('content')

<h1>All Products</h1>
<div class="product-grid">
    @foreach ($products as $one_product)
    <div class="product-card">
         <img 
            src="{{ asset('image/' . $one_product->image) }}" 
            alt="{{ $one_product->name }}"/>
            <h4>{{ $one_product->name }}</h4>
            <p>Price : {{ $one_product->price }}</p>
            <p>Quantity : {{ $one_product->quantity }}</p>
            <p><a href="{{ route('delete_product', $one_product->id) }}">Delete</a></p>
            <p><a href="{{ route('edit_product', $one_product->id) }}">Edit</a></p>
            <!-- <form method="POST" action="{{ route('add_to_cart', $one_product->id) }}">
                @csrf
                <button type="submit">Add to Cart</button>
            </form> -->
    </div>
    @endforeach
</div>

@endsection