<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperación de contraseña</title>
</head>
<body>
    <h2>¡Hola, {{ $name }}!</h2>
    <p>Por favor, si no has sido tú quién quiere cambiar la contraseña de la cuenta, NO pulse el sguiente enlace:</p>
    <a href="{{ url('recovery/'.$remember_token) }}">Click para cambiar contraseña</a>
</body>
</html>