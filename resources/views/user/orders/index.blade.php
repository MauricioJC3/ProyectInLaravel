<!-- En tu archivo Blade -->
@extends('layouts.navbarUser')

@section('content')
<div class="container">
    <h1 class="my-4">Mis Órdenes</h1>
    @if($orders->isEmpty())
        <p class="alert alert-warning">No has realizado ninguna orden.</p>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Total Productos</th>
                        <th>Total Precio</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->total_products }}</td>
                            <td>${{ $order->total_price }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge badge-warning">Pendiente</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge badge-success">Completada</span>
                                @else
                                    <span class="badge badge-info">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
