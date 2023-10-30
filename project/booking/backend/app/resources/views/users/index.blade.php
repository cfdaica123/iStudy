<!-- resources/views/users/index.blade.php -->

<h1>Users</h1>
<a href="{{ route('users.create') }}">Add User</a>
<a href="{{ route('users.create', ['type' => 'employee']) }}">Add Employee</a>
<a href="{{ route('users.create', ['type' => 'customer']) }}">Add Customer</a>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}">Show</a>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                        <form method="post" action="{{ route('users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
