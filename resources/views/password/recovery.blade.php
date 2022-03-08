<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Recuperar Contraseña</title>
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
    <h3>Recuperar contraseña</h3>
    <br>
    <form class="row g-3" action='{{ route('recovery.sendToken') }}' method='post'>
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email"> 
          @error('email')
            <p>{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar token</button>
    </form>
  </div>
</body>
</html>
