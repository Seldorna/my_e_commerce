@extends('layout.mainpage')

@section('content')
<div class="welcome-container">
    <h1>Welcome to Cella's Supermarket!</h1>
    <p>We have a wide variety of products:</p>

    <div class="category-list">
        <div class="category-item">
            {{-- Placeholder for Fruits Image --}}
            <img src="{{ asset('welcome_image/fruits.png') }}" alt="Fresh Fruits" class="category-image">
            <h3>Fruits</h3>
            <p>Fresh and juicy selection.</p>
        </div>

        <div class="category-item">
            {{-- Placeholder for Food Image --}}
            <img src="{{ asset('welcome_image/food.png') }}" alt="Delicious Food" class="category-image">
            <h3>Food</h3>
            <p>Delicious meals and ingredients.</p>
        </div>

        <div class="category-item">
            {{-- Placeholder for Sweets Image --}}
            <img src="{{ asset('welcome_image/sweets.png') }}" alt="Variety of Sweets" class="category-image">
            <h3>Sweets</h3>
            <p>Indulge your sweet tooth.</p>
        </div>

        <div class="category-item">
            {{-- Placeholder for Body Products Image --}}
            <img src="{{ asset('welcome_image/body_products.png') }}" alt="Body Care Products" class="category-image">
            <h3>Body Products</h3>
            <p>Care for your skin and hair.</p>
        </div>
        </div>
    <p>And much more!</p>
</div>
@endsection