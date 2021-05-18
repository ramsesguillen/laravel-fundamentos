
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>
    @include('partials.nav')
    <h1>Usuarios</h1>
    @forelse ( $users as $user )
        <li>{{ $user->name }} - {{ $user->rol }}</li>
    @empty

    @endforelse
</body>
</html>
