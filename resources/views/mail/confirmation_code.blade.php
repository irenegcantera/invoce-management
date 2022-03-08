<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de registro</title>
</head>
<body>
    <h2>¡Hola {{ $name }}</h2>, bienvenido/a!
    <p>Por favor, confirma tu correo electrónico pulsando sobre el siguiente enlace:</p>
    <a href="{{ url('register/verify/'.$code) }}">Click para confirmar email</a>
</body>
</html>