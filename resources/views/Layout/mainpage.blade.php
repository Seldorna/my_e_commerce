<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
</head>
    <body>
        <nav class="navbar">
            <div class="container">
                <a href="{{ route('welcome') }}" class="brand"> Cella's Supermarket </a>
                <ul class="menu">
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('service') }}">Service</a></li>
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('registration_form') }}">Register</a></li>
                    @endguest

                    @auth
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        @if(auth()->user()->role === 'admin')
                            <li><a href="{{ route('product_form') }}">Add Product</a></li>
                            <li><a href="{{ route('all_products') }}">All Products</a></li>
                            <li><a href="{{ route('admin_registration_form') }}">Register Admin</a></li>
                            <li><a href="{{ route('admin_purchases') }}">Purchases</a></li>
                        @else
                            <li><a href="{{ route('user_cart') }}">Cart</a></li>
                            <li><a href="{{ route('customer_purchases') }}">My Purchases</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endauth
                </ul>
         </div>
    
         </nav>
        <div class="container">
    
        @if (session('message'))
         <p class="success">{{ session('message') }}</p>
         @endif

         @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $one_error)
            <li class="error"> {{ $one_error }}</li>
            @endforeach

            </ul>
        @endif
    
        @yield('content')
    
    </div>

</body>
</html>