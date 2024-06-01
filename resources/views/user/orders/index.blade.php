@extends('layouts.navbarUser')

@section('content')
<div class="container">
    <h1>Mis Órdenes</h1>
    @if($orders->isEmpty())
        <p>No has realizado ninguna orden.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID Orden</th>
                    <th>Total Productos</th>
                    <th>Total Precio</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->total_products }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
