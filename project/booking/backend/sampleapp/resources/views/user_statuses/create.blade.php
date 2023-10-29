<h1>Create User Status</h1>

    <form action="{{ route('user_statuses.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Create</button>
    </form>
