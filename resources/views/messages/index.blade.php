@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<h1>Messages</h1>
<a href="{{ route('messages.create') }}">Add Message</a>
<table>
    <tr>
        <th>User</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Actions</th>
    </tr>
    @foreach ($messages as $message)
    <tr>
        <td>{{ $message->name_user }}</td>
        <td>{{ $message->email_user }}</td>
        <td>{{ $message->number_user }}</td>
        <td>{{ $message->message }}</td>
        <td>
            <a href="{{ route('messages.edit', $message->id) }}">Edit</a>
            <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
