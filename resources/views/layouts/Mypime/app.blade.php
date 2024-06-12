<!-- resources/views/layouts/mypimes/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'MyPime')</title>
    <!-- Aquí puedes incluir tus archivos CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('layouts.Mypime.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.Mypime.footer')

    <!-- Aquí puedes incluir tus archivos JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
