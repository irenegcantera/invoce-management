<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h3>Registro usuario</h3>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ (session('error')) }}
            </div>
        @endif
        <br>
        <form class="row g-3" action='{{ route('register.store') }}' method='post'>
            @csrf
            <div class="mb-3">
            <label for="name" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="name" id="name"> 
            @error('name')
                <p>{{ $message }}</p>
            @enderror
            </div>
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
            @error('password_confirmed')
                <p>{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                @error('email')
                <p>{{ $message }}</p>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a class="btn btn-outline-danger" href="{{ route("login.create")}}">Cancelar</a>
        </form>
    </div>
</body>
</html>
