<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido registrate</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">

    <span style="color:yellow;">{{ $errors->first('email') }}<br></span>
    <span style="color:red;">{{ $errors->first('password') }}<br></span>
    <span style="color:red;">{{ $errors->first('confirm_password') }}<br></span>
    @include('_message')


        <div class="wrapper">
            <div class="title"><span>Bienvenido Registrate</span></div>
            <form action="{{url('registration_post')}}" method="post">
            @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nombre" name="name" value="{{old('name')}}">
                </div>
                <div class="row">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="{{old('email')}}">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="contraseña" name="password">
                </div>

                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirmar Contraseña" name="confirm_password" value="">
                </div>

                <div class="row">
                    <select class="selectbox" name="is_role" required>
                        <option value="">Selecione un rol</option>
                        <option {{ old('is_role') == '2' ? 'selected' : '' }} value="2">Super Administrador</option>
                        <option {{ old('is_role') == '1' ? 'selected' : '' }} value="1">Administrador</option>
                        <option {{ old('is_role') == '0' ? 'selected' : '' }} value="0">usuario</option>
                    </select>
                </div>

                <div class="button">
                    <input type="submit" value="Registrarse">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
