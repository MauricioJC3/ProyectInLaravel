<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <span style="color:red;">{{ $errors->first('password') }}<br></span>
        <span style="color:red;">{{ $errors->first('confirm_password') }}<br></span>
        @include('_message')

        <div class="wrapper">
            <div class="title"><span>Recuperar contraseña</span></div>
            <form action="{{ url('reset_post/'.$token) }}" method="post">
                @csrf
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" required name="password">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Confirmar Password" required name="confirm_password">
                </div>
                <div class="button">
                    <input type="submit" value="Confirmar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
