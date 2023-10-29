
    <h1>Edit Permission</h1>
    <form action="{{ route('permissions.update', ['permission' => $permission->permission_id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $permission->name }}" required>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('permissions.index') }}">Back to Permissions</a>

