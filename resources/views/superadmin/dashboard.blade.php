@extends('layouts.app')

@section('content')
<h1>Hola administrador</h1>

<form>

  <div class="row">
      <p><b>name </b>{{ $getRecord->name }}</p>
      <p><b>email </b>{{ $getRecord->email }}</p>
      </div>

      <div class="singup-link">logout?
        <a href="{{ url('logout')}}"> logout</a>
      </div>

      <div class="singup-link">home?
        <a href="{{ url('/')}}"> home</a>
      </div>

</form>
@endsection
