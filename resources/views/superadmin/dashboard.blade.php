<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartado de Super administrador</title>
</head>
<body>

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
</body>
</html>