<h1>Create Role</h1>

    <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Create</button>
    </form>
