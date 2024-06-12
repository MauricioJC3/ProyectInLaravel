@extends('layouts.User.navbarUser')

@section('content')
<div class="container">
    <h1>Revisar Pedido</h1>
    <h3>Productos en el Carrito</h3>
    @if($cartItems->isEmpty())
        <p>No hay productos en el carrito.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->name_products }}</td>
                        <td>{{ $cartItem->price_product }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>{{ $cartItem->price_product * $cartItem->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: ${{ $cartItems->sum(fn($cartItem) => $cartItem->price_product * $cartItem->quantity) }}</h3>

        <h3>Información de Contacto y Pago</h3>
        <form action="{{ route('user.cart.placeOrder') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name_user">Nombre</label>
                <input type="text" name="name_user" class="form-control" id="name_user" required>
            </div>
            <div class="form-group">
                <label for="number_user">Teléfono</label>
                <input type="text" name="number_user" class="form-control" id="number_user" required>
            </div>
            <div class="form-group">
                <label for="email_user">Correo Electrónico</label>
                <input type="email" name="email_user" class="form-control" id="email_user" required>
            </div>
            <div class="form-group">
                <label for="method">Método de Pago</label>
                <select name="method" class="form-control" id="method" required>
                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address_user">Dirección</label>
                <input type="text" name="address_user" class="form-control" id="address_user" required>
            </div>
            <button type="submit" class="btn btn-success">Finalizar Compra</button>
        </form>
    @endif
</div>
@endsection
