<h1>Edit Role</h1>

    <form action="{{ route('roles.update', ['roleId' => $role->role_id]) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $role->name }}" required>

        <button type="submit">Update</button>
    </form>
