@extends('layouts.app')

@section('title', 'Edit Cart')

@section('content')
<h1>Edit Cart</h1>
<form action="{{ route('carts.update', $cart->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="user_id">User:</label>
    <input type="text" name="user_id" id="user_id" value="{{ $cart->user_id }}" required>
    <label for="name_products">Products:</label>
    <input type="text" name="name_products" id="name_products" value="{{ $cart->name_products }}" required>
    <label for="price_product">Price:</label>
    <input type="number" name="price_product" id="price_product" value="{{ $cart->price_product }}" required>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" value="{{ $cart->quantity }}" required>
    <label for="image">Image:</label>
    <input type="text" name="image" id="image" value="{{ $cart->image }}">
    <button type="submit">Update</button>
</form>
@endsection
