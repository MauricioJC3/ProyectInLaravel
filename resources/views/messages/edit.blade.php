@extends('layouts.app')

@section('title', 'Edit Message')

@section('content')
<h1>Edit Message</h1>
<form action="{{ route('messages.update', $message->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="user_id">User:</label>
    <input type="text" name="user_id" id="user_id" value="{{ $message->user_id }}">
    <label for="name_user">Name:</label>
    <input type="text" name="name_user" id="name_user" value="{{ $message->name_user }}">
    <label for="email_user">Email:</label>
    <input type="email" name="email_user" id="email_user" value="{{ $message->email_user }}">
    <label for="number_user">Phone:</label>
    <input type="text" name="number_user" id="number_user" value="{{ $message->number_user }}">
    <label for="message">Message:</label>
    <textarea name="message" id="message">{{ $message->message }}</textarea>
    <button type="submit">Update</button>
</form>
@endsection
