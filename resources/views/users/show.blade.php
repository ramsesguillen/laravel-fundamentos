
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @include('partials.nav')
        <h1>Usuarios</h1>
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
                    <tr>
                        <th scope="row">1</th>
                        <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                        <td>
                            @forelse ( $user->rols as $rol )
                                <span>{{ $rol->display_name }}</span>
                            @empty
                                <span>no rol</span>
                            @endforelse
                        </td>
                        <td>
                            @can('edit', $user)
                            <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('users.destroy', $user->id ) }}" method="post">
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
