@extends('layouts.app')

@section('title', 'Add MyPime')

@section('content')
    <h1>Add MyPime</h1>
    <form action="{{ route('mypimes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nit_mypime">NIT:</label>
        <input type="text" name="nit_mypime" id="nit_mypime" required>
        <label for="name_mypime">Name:</label>
        <input type="text" name="name_mypime" id="name_mypime" required>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*" required>
        <label for="address_mypime">Address:</label>
        <input type="text" name="address_mypime" id="address_mypime" required>
        <label for="phone_mypime">Phone:</label>
        <input type="text" name="phone_mypime" id="phone_mypime" required>
        <label for="email_mypime">Email:</label>
        <input type="email" name="email_mypime" id="email_mypime" required>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Add</button>
    </form>
@endsection
