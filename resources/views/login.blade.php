<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

    @include('partials.nav')
    <h1>Login</h1>

    <form action="" method="post">
        @csrf
        <fieldset>
            <legend>Formulario</legend>

            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>

            <label for="remember">Recuerda mi sesion</label>
            <input type="checkbox" name="remember"><br>

            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>
