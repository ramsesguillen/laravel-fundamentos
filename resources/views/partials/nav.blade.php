@auth
    <p>{{ auth()->user()->name }}</p>
    <a href="/">Inicio</a>
    <a href="/dashboard">Dashboard</a>

    @if( auth()->user()->hasRoles(['admin', 'estudiante']))
        <a href="{{ route('users.index') }}">Usuarios</a>
    @endif

    <form style="display: inline;"  action="/logout" method="post">
        @csrf
        <a href="#" onclick="this.closest('form').submit()">Logout</a>
    </form>
@else
    <a href="/login">Login</a>
@endauth
