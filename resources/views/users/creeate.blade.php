
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create user</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @include('partials.nav')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <fieldset>
                <legend>Formulario</legend>

                <input type="text" name="name" placeholder="Nombre"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="password_confirmation" placeholder="Password Confirm"><br>
                @foreach ( $rols as $id => $name)
                <div class="form-group form-check">
                    <input
                        type="checkbox"
                        class="form-check-input"
                        name="rols[]"
                        value="{{ $id }}"
                        id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">{{ $name }}</label>
                </div>
                @endforeach
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>
