<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>



<body>
    <nav>
        <ul>
            <li><a href="{{ route('mypimes.index') }}">MyPimes</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li><a href="{{ route('orders.index') }}">Orders</a></li>
            <li><a href="{{ route('carts.index') }}">Cart</a></li>
            <li><a href="{{ route('messages.index') }}">Messages</a></li>
            <li><a href="{{ url('logout')}}">Cerar sesion</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
