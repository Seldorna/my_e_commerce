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
                    @guest
                        <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a></li>
                        <li><a href="{{ route('registration_form') }}" class="{{ request()->routeIs('registration_form') ? 'active' : '' }}">Register</a></li>
                    @endguest

                    @auth

                        @if(auth()->user()->role === 'admin')
                            <li><a href="{{ route('product_form') }}" class="{{ request()->routeIs('product_form') ? 'active' : '' }}">Add Product</a></li>
                            <li><a href="{{ route('all_products') }}" class="{{ request()->routeIs('all_products') ? 'active' : '' }}">All Products</a></li>
                            <li><a href="{{ route('admin_registration_form') }}" class="{{ request()->routeIs('admin_registration_form') ? 'active' : '' }}">Register Admin</a></li>
                            <li><a href="{{ route('admin_purchases') }}" class="{{ request()->routeIs('admin_purchases') ? 'active' : '' }}">Purchases</a></li>
                        @else
                            <li><a href="{{ route('homepage') }}" class="{{ request()->routeIs('homepage') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('user_cart') }}" class="{{ request()->routeIs('user_cart') ? 'active' : '' }}">Cart</a></li>
                            <li><a href="{{ route('customer_purchases') }}" class="{{ request()->routeIs('customer_purchases') ? 'active' : '' }}">My Purchases</a></li>
                        @endif
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{ route('logout') }}" class="{{ request()->routeIs('logout') ? 'active' : '' }}">Logout</a></li>
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
    <footer class="footer">
    <div class="container">
    <p>Contact us: </p>
    <a href="mailto:seldornakullie@gmail.com">Email Us</a> | 
    <a href="tel:+250791377054">0791377054</a>
    <a href="https://www.instagram.com/s_marcella20/">Our Social</a>
    </div>
    <p>&copy; 2024 Cella's Supermarket. All rights reserved.</p>
    </footer>

</body>
</html>