<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido a la página</title>
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Bienvenido a la página</span></div>
            <form>
                @if(Auth::check())
                    @if(Auth::user()->is_role == 2)
                        <div class="singup-link"> Super Admin Esta logeado
                            <a href="{{ url('superadmin/dashboard') }}">Dashboard</a></div>
                        </div>
                    @elseif (Auth::user()->is_role == 1)
                    <div class="singup-link">Admin Esta logeado
                        <a href="{{ url('admin/dashboard') }}">Dashboard</a></div>
                    </div>

                    @elseif (Auth::user()->is_role == 0)
                    <div class="singup-link">Usario Esta logeado
                        <a href="{{ url('admin/dashboard') }}">Dashboard</a></div>
                    </div>

                    @endif
                @else
                <div class="signup-link">Sign in? <a href="{{url('login')}}">Login</a></div>
                <div class="signup-link">Join now? <a href="{{ url('registro') }}">Registration</a></div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
