<div class="container">
    <h1>User List</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Status</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->status->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->user_id) }}" class="btn btn-info">View</a> <a
                            href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->user_id) }}" method="post"
                            style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} <!-- Pagination links -->

    <a href="{{ route('users.create') }}" class="btn btn-success">Create User</a>
</div>
<a href="{{ route('dashboard') }}" class="btn btn-success">Home</a>
