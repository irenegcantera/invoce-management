<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Change password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h3>Cambiar contraseña</h3>
        <br>
        <form class="row g-3" action='{{ route('recovery.store',) }}' method='post'>
            @csrf
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmed" class="form-label">Repetir Password</label>
                <input type="password" class="form-control" name="password_confirmed" id="password_confirmed">
            </div>
            <button type="submit" class="btn btn-primary">Cambiar</button>
        </form>
    </div>
</body>
</html>
