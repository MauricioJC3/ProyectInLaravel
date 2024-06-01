@extends('layouts.app')

@section('title', 'Add Order')

@section('content')
<h1>Add Order</h1>
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <label for="user_id">User:</label>
    <input type="text" name="user_id" id="user_id" required>
    <label for="name_user">Name:</label>
    <input type="text" name="name_user" id="name_user" required>
    <label for="number_user">Phone:</label>
    <input type="text" name="number_user" id="number_user" required>
    <label for="email_user">Email:</label>
    <input type="email" name="email_user" id="email_user" required>
    <label for="method">Method:</label>
    <input type="text" name="method" id="method" required>
    <label for="address_user">Address:</label>
    <input type="text" name="address_user" id="address_user" required>
    <label for="total_products">Total Products:</label>
    <input type="number" name="total_products" id="total_products" required>
    <label for="total_price">Total Price:</label>
    <input type="number" name="total_price" id="total_price" required>
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="pendiente">Pendiente</option>
        <option value="completado">Completado</option>
    </select>
    <button type="submit">Add</button>
</form>
@endsection
