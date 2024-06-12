<!-- resources/views/layouts/mypimes/navbar.blade.php -->
<nav>
    <ul>
        <li><a href="{{ route('mypime.dashboard') }}">Inicio</a></li>
        <li><a href="{{ route('products.index') }}">Productos</a></li>
        <li><a href="{{ route('Cajero.index') }}">Cajeros</a></li>
        <li><a href="{{ url('logout')}}">Cerrar sesion</a></li>
    </ul>
</nav>
