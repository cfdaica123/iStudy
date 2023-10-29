<h1>Edit User Status</h1>

    <form action="{{ route('user_statuses.update', ['userStatus' => $userStatus->user_status_id]) }}" method="post">
        @csrf
        @method('put')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $userStatus->name }}" required>

        <button type="submit">Update</button>
    </form>
