@extends('layouts.app')

@section('title', 'Add Message')

@section('content')
<h1>Add Message</h1>
<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <label for="user_id">User:</label>
    <input type="text" name="user_id" id="user_id">
    <label for="name_user">Name:</label>
    <input type="text" name="name_user" id="name_user">
    <label for="email_user">Email:</label>
    <input type="email" name="email_user" id="email_user">
    <label for="number_user">Phone:</label>
    <input type="text" name="number_user" id="number_user">
    <label for="message">Message:</label>
    <textarea name="message" id="message"></textarea>
    <button type="submit">Add</button>
</form>
@endsection
