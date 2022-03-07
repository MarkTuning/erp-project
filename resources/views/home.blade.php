<x-metadata title="Home">
    <div>
        <div>Home</div>

        <br>

        <div>DocumentNo: {{ $data['DocumentNo'] }}</div>
        <div>DocumentDate: {{ $data['DocumentDate'] }}</div>

        <br>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <input name="Authorization" type="hidden" value="{{ request()->get('Authorization') }}">

            <input type="submit" value="Logout">
        </form>
    </div>
</x-metadata>
