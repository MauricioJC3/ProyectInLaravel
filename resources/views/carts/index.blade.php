@extends('layouts.app')

@section('title', 'Carts')

@section('content')
<h1>Carts</h1>
<a href="{{ route('carts.create') }}">Add Cart</a>
<table>
    <tr>
        <th>User</th>
        <th>Products</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    @foreach ($carts as $cart)
    <tr>
        <td>{{ $cart->user_id }}</td>
        <td>{{ $cart->name_products }}</td>
        <td>{{ $cart->price_product }}</td>
        <td>{{ $cart->quantity }}</td>
        <td>
            <a href="{{ route('carts.edit', $cart->id) }}">Edit</a>
            <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
