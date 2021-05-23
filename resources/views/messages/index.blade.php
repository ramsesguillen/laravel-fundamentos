
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
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">emial</th>
                <th scope="col">Mensaje</th>
                <th scope="col">Nota</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $messages as $message )
                    <tr>
                        <th scope="row">{{ $message->id }}</th>
                        @if( $message->user_id )
                            <td><a href="{{ route('users.show', $message->user->id) }}">{{ $message->user->name }}</a></td>
                            <td>{{ $message->user->email }}</td>
                        @else
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                        @endif
                        <td><a href="{{ route('messages.show', $message->id) }}">{{ $message->message }}</a></td>
                        <td>{{ $message->nota?->body }}</td>
                        <td>
                            <a href="{{ route('messages.edit', $message->id ) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('messages.destroy', $message->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><th>No hay datos</th></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
