@extends('layouts.app')

@section('title', 'MyPimes')

@section('content')
<h1>MyPimes</h1>
<a href="{{ route('mypimes.create') }}">Add MyPime</a>
<table>
    <tr>
        <th>Name</th>
        <th>Photo</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach ($mypimes as $mypime)
    <tr>
        <td>{{ $mypime->name_mypime }}</td>
        <td><img src="{{ asset('assets/imagenes_microempresas/' . $mypime->photo) }}" alt="{{ $mypime->name_mypime }}" width="50"></td>
        <td>{{ $mypime->address_mypime }}</td>
        <td>{{ $mypime->phone_mypime }}</td>
        <td>{{ $mypime->email_mypime }}</td>
        <td>{{ $mypime->status }}</td>
        <td>
            <a href="{{ route('mypimes.edit', $mypime->id) }}">Edit</a>
            <form action="{{ route('mypimes.destroy', $mypime->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <form action="{{ route('mypimes.toggleStatus', $mypime->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">{{ $mypime->status == 'activo' ? 'Deactivate' : 'Activate' }}</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
