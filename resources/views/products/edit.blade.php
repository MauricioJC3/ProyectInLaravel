@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="mypime_id">MyPime:</label>
    <select name="mypime_id" id="mypime_id">
        @foreach ($mypimes as $mypime)
        <option value="{{ $mypime->id }}" {{ $product->mypime_id == $mypime->id ? 'selected' : '' }}>{{ $mypime->name_mypime }}</option>
        @endforeach
    </select>
    <label for="nombre_product">Name:</label>
    <input type="text" name="nombre_product" id="nombre_product" value="{{ $product->nombre_product }}" required>
    <label for="price_product">Price:</label>
    <input type="number" name="price_product" id="price_product" value="{{ $product->price_product }}" required>
    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ $product->description }}</textarea>
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="disponible" {{ $product->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
        <option value="no disponible" {{ $product->status == 'no disponible' ? 'selected' : '' }}>No Disponible</option>
    </select>
    <button type="submit">Update</button>
</form>
@endsection
