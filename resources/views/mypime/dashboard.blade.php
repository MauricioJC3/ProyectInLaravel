<!-- resources/views/mypime/dashboard.blade.php -->

@extends('layouts.Mypime.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Bienvenido a su apartado de Mypime</h1>
                @if(isset($getRecord))
                <p>NIT: {{ $getRecord->nit_mypime }}</p>
                <p>Nombre: {{ $getRecord->name_mypime }}</p>
                <p>Dirección: {{ $getRecord->address_mypime }}</p>
                <!-- Añade aquí más campos que quieras mostrar -->
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
