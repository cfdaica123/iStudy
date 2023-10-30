<h1>Add User</h1>
    <form method="post" action="{{ route('users.store') }}">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <button type="submit">Save</button>
    </form>
    <a href="{{ route('users.index') }}">Back to List</a>
