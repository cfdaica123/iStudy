
    <h1>Create Permission</h1>
    <form action="{{ route('permissions.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Create</button>
    </form>
    <a href="{{ route('permissions.index') }}">Back to Permissions</a>

