@extends('layouts.User.navbarUser')

@section('content')
<div class="container">
    <h1>Carrito de Compras</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if($cartItems->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->name_products }}</td>
                        <td>{{ $cartItem->price_product }}</td>
                        <td>
                            <form action="{{ route('user.cart.update', $cartItem) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $cartItem->quantity }}">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('user.cart.destroy', $cartItem) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('user.cart.checkout') }}" class="btn btn-success">Finalizar Compra</a>
    @endif
</div>
@endsection
