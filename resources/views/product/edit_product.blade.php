@extends('layout.mainpage')
@section('content')

<h1>Edit Product</h1>
<img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}" style="width: 200px; height: auto;">
<form method="POST" action="{{ route('update_product', $product->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-row">
    <label for="name" >Product Name:</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $product->name) }}">
</div>
<div class="form-row">
    <label for="category">Product Category:</label>
    <select name="category" class="form-control">
        <option value="food" {{ old('category', $product->category ?? '') == 'food' ? 'selected' : '' }}>Food</option>
        <option value="body" {{ old('category', $product->category ?? '') == 'body' ? 'selected' : '' }}>Body Products</option>
        <option value="drinks" {{ old('category', $product->category ?? '') == 'drinks' ? 'selected' : '' }}>Drinks</option>
        <option value="utensils" {{ old('category', $product->category ?? '') == 'utensils' ? 'selected' : '' }}>Utensils</option>
    </select>
</div>
<div class="form-row">
    <label for="name" >Product Price:</label>
    <input type="text" name="price" class="form-control" placeholder="Enter Price" value="{{ old('price', $product->price) }}">
</div>
<div class="form-row">
    <label for="stock_quantity" >Stock Quantity:</label>
    <input type="text" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity) }}">
</div>
<div class="form-row">
    <label for="image" >Product Image:</label>
    <input type="file" name="image" class="form-control" >
    @if($product->image)
        <img src="{{ asset('image/' . $product->image) }}" alt="Product Image" width="150">
    @endif
</div>
<div class="form-row">
<button type="submit" class="button">Edit Product</button>
</div>
</form>
@endsection
