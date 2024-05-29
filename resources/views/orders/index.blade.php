@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">Add Order</a>
<table>
    <tr>
        <th>User</th>
        <th>Total Products</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach ($orders as $order)
    <tr>
        <td>{{ $order->name_user }}</td>
        <td>{{ $order->total_products }}</td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->status }}</td>
        <td>
            <a href="{{ route('orders.edit', $order->id) }}">Edit</a>
            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
