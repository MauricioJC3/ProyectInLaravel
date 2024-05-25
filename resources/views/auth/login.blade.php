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
    @include('_message')

        <div class="wrapper">
            <div class="title"><span>Bienvenido a la página</span></div>
            <form action="{{ url('login_post') }}" method="post">
            @csrf
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" value="{{ old('email') }}" placeholder="gmail" required name="email">
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" value="" placeholder="Password" required name="password">
                </div>
                <div class="pass"><a href="#">Forgot password?</a></div>
                <div class="button">
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">Join now? <a href="{{ url('registro') }}">Registration</a></div>
            </form>
        </div>
    </div>
</body>
</html>
