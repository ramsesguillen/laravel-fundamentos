
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @include('partials.nav')
        <h1>Usuarios</h1>
        <a class="btn btn-primary pull-right" href="{{ route('users.create') }}">Nuevo usuario</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $users as $user )
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>
                            {{ $user->rols->pluck('display_name')->implode(', ') }}
                            {{-- @forelse ( $user->rols as $rol )
                                <span>{{ $rol->display_name }}</span>
                            @empty
                                <span>no rol</span>
                            @endforelse --}}
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('users.destroy', $user->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><th>No hay usuarios</th></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
