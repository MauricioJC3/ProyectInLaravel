@extends('layouts.app')

@section('title', 'Edit MyPime')

@section('content')
    <h1>Edit MyPime</h1>
    <form action="{{ route('mypimes.update', $mypime->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nit_mypime">NIT:</label>
        <input type="text" name="nit_mypime" id="nit_mypime" value="{{ $mypime->nit_mypime }}" required>
        <label for="name_mypime">Name:</label>
        <input type="text" name="name_mypime" id="name_mypime" value="{{ $mypime->name_mypime }}" required>
        <label for="photo">Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*">
        <label for="address_mypime">Address:</label>
        <input type="text" name="address_mypime" id="address_mypime" value="{{ $mypime->address_mypime }}" required>
        <label for="phone_mypime">Phone:</label>
        <input type="text" name="phone_mypime" id="phone_mypime" value="{{ $mypime->phone_mypime }}" required>
        <label for="email_mypime">Email:</label>
        <input type="email" name="email_mypime" id="email_mypime" value="{{ $mypime->email_mypime }}" required>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ $mypime->username }}" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <button type="submit">Update</button>
    </form>
@endsection
