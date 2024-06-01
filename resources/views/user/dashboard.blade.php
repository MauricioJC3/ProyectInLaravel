@extends('layouts.navbarUser');

@section('content')
<div class="container">
    <h1>Solo sirves para comprar</h1>
    <div class="row">
        <p><b>name </b>{{ $getRecord->name }}</p>
        <p><b>email </b>{{ $getRecord->email }}</p>
        </div>

        <div class="singup-link">logout?
            <a href="{{ url('logout')}}"> logout</a>
          </div>
</div>
@endsection
