<x-metadata title="Home">
    <div>
        <div>Home</div>

        <br>

        <div>{{ $documentNo != null ? 'DocumentNo: ' . $documentNo : '' }}</div>
        <div>{{ $documentDate != null ? 'DocumentDate: ' . $documentDate : '' }}</div>

        <br>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <input name="Authorization" type="hidden" value="{{ request()->get('Authorization') }}">

            <input type="submit" value="Logout">
        </form>
    </div>
</x-metadata>
