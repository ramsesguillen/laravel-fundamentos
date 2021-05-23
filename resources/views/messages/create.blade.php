<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

    @include('partials.nav')
    <h1>Mensaje</h1>

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <form action="{{ route('messages.store') }}" method="post">
        @csrf
        <fieldset>
            <legend>Formulario</legend>
            @guest
            <input type="text" name="name" placeholder="Nombre"><br>
            <input type="email" name="email" placeholder="Email"><br>
            @endguest
            <textarea name="message"placeholder="Mensaje"></textarea><br>

            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>
