<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login MyPime</title>
</head>
<body>
    <form action="{{ route('mypime.login.post') }}" method="post">
        @csrf
        <div>
            <label for="email_mypime">Email:</label>
            <input type="text" name="email_mypime" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>
