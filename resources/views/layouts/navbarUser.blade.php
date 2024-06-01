<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style_User.css') }}">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <nav>
            <ul>
                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>

                <li><a href="{{ route('user.products.index') }}">Productos</a></li>
                <li><a href="{{ route('user.cart.index') }}">Carrito</a></li>
                <li><a href="{{ route('user.orders.index') }}">Órdenes</a></li>
                <li><a href="{{ url('logout')}}">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
