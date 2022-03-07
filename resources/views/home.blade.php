<x-metadata title="Home">
    <div>
        <div>Home</div>

        <br>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <input name="Authorization" type="hidden" value="{{ request()->get('Authorization') }}">

            <input type="submit" value="Logout">
        </form>
    </div>
</x-metadata>
