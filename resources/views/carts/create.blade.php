@extends('layouts.app')

@section('title', 'Add Cart')

@section('content')
<h1>Add Cart</h1>
<form action="{{ route('carts.store') }}" method="POST">
    @csrf
    <label for="user_id">User:</label>
    <input type="text" name="user_id" id="user_id" required>
    <label for="name_products">Products:</label>
    <input type="text" name="name_products" id="name_products" required>
    <label for="price_product">Price:</label>
    <input type="number" name="price_product" id="price_product" required>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required>
    <label for="image">Image:</label>
    <input type="text" name="image" id="image">
    <button type="submit">Add</button>
</form>
@endsection
