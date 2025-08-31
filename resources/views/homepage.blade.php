@extends('layout.mainpage');
@section('content')

<h1>Cella's Supermarket</h1>
<form method="GET" action="{{ route('homepage') }}" style="margin-bottom: 20px;">
    <label for="category">Filter by Category:</label>
    <select name="category" id="category" onchange="this.form.submit()">
        <option value="">All</option>
        <option value="food" {{ request('category') == 'food' ? 'selected' : '' }}>Food</option>
        <option value="body" {{ request('category') == 'body' ? 'selected' : '' }}>Body Products</option>
        <option value="drinks" {{ request('category') == 'drinks' ? 'selected' : '' }}>Drinks</option>
        <option value="utensils" {{ request('category') == 'utensils' ? 'selected' : '' }}>Utensils</option>
    </select>
</form>
<div class="product-grid">
    @foreach ($products as $one_product)
        @if($one_product->quantity > 0)
        <div class="product-card">
             <img 
                src="{{ asset('image/' . $one_product->image) }}" 
                alt="{{ $one_product->name }}"/>
                <h4>{{ $one_product->name }}</h4>
                <p>Price : {{ $one_product->price }}</p>
                <p>Quantity : {{ $one_product->quantity }}</p>
                <form method="POST" action="{{ route('add_to_cart', $one_product->id) }}">
                    @csrf
                    <button type="submit">Add to Cart</button>
                </form>
        </div>
        @endif
    @endforeach
</div>

@endsection