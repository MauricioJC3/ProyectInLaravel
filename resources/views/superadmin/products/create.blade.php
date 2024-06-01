@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="mypime_nit">Mypime NIT:</label>
        <input type="text" name="mypime_nit" id="mypime_nit" required>
        <label for="nombre_product">Product Name:</label>
        <input type="text" name="nombre_product" id="nombre_product" required>
        <label for="price_product">Price:</label>
        <input type="number" name="price_product" id="price_product" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="disponible">Disponible</option>
            <option value="no disponible">No Disponible</option>
        </select>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        <button type="submit">Add</button>
    </form>
@endsection
