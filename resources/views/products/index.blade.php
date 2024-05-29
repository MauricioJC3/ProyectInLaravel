@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}">Add Product</a>
<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->nombre_product }}</td>
        <td>{{ $product->price_product }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->status }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
