<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <br><br>
  <div class="container">
    @if(session('notification'))
      <div class="alert alert-success">
        {{ session('notification') }}
      </div>
    @endif
    <h3>Iniciar sesión</h3>
    <br>
    <form class="row g-3" action='{{ route('login.store') }}' method='post'>
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
        <button type="submit" class="btn btn-primary">Entrar</button>
        <a class="btn btn-outline-secondary" href="{{ route("register.create")}}">Registarse</a>
        {{-- <a href="{{ route("recovery.index") }}">¿Olvidates la contraseña?</a> --}}
    </form>
  </div>
</body>
</html>
