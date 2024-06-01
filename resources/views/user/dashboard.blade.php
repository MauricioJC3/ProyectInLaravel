@extends('layouts.navbarUser');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apartado de Usuario</title>
</head>
<body>
    <h1>Hola como estas vievenido a tu apartado</h1>
    <div class="row">
        <p><b>name </b>{{ $getRecord->name }}</p>
        <p><b>email </b>{{ $getRecord->email }}</p>
        </div>

        <div class="singup-link">logout?
            <a href="{{ url('logout')}}"> logout</a>
          </div>
</body>
</html>
