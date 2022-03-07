<x-metadata title="Login">
    <div>
        <div>Login</div>

        <br>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <input type="submit" value="Login">
        </form>
    </div>
</x-metadata>
