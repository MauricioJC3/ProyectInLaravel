<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Estilos de ejemplo para el navbar */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
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
                <li><a href="{{ url('logout')}}">Cerar sesion</a></li>
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
