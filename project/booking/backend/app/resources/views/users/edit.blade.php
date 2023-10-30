<h1>Edit User</h1>
    <form method="post" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>

        <button type="submit">Update</button>
    </form>
    <a href="{{ route('users.index') }}">Back to List</a>
