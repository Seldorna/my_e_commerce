@extends('layout.mainpage')
@section('content')

<h1>Create New Product</h1>
<form method="POST" action="{{ route('reister')}}" enctype="multipart/form-data">
@csrf
<div class="form-row">
    <label for="name" >Product Name:</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name">
</div>
<div class="form-row">
    <label for="name" >Product Price:</label>
    <input type="text" name="price" class="form-control" placeholder="Enter Price">
</div>
<div class="form-row">
    <label for="stock_quantity" >Stock Quantity:</label>
    <input type="text" name="quantity" class="form-control">
</div>
<div class="form-row">
    <label for="image" >Product Image:</label>
    <input type="file" name="image" class="form-control" >
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
<button type="submit" class="button">Create Product</button>
</div>
</form>
@endsection
