
@auth
    {{-- <h1>Rol: {{ auth()->user()->rols }}</h1><p></p> --}}
    <p>{{ auth()->user()->name }}</p>
    <a href="/">Inicio</a>
    <a href="/dashboard">Dashboard</a>
    <a href="{{ route('messages.create') }}">contactos</a>
    <a href="{{ route('messages.index') }}">mensajes</a>

    @if( auth()->user()->hasRoles(['admin', 'estudiante']))
    <a href="{{ route('users.index') }}">Usuarios</a>
    @endif
    {{-- <a href="{{ route('users.show', auth()->user()->id) }}">Perfil</a> --}}
    <a href="{{ route('users.edit', auth()->user()->id) }}">Perfil</a>

    <form style="display: inline;"  action="/logout" method="post">
        @csrf
        <a href="#" onclick="this.closest('form').submit()">Logout</a>
    </form>
@else
    <a href="/login">Login</a>
@endauth
