<!-- resources/views/roles/edit_permissions.blade.php -->

<h1>Edit Role Permissions</h1>
<p>Role ID: {{ $role->role_id }}</p>
<p>Role Name: {{ $role->name }}</p>

<form action="{{ route('roles.update-permissions', $role->role_id) }}" method="post">
    @csrf
    @method('PUT')

    <p>Permissions:</p>
    <ul>
        @foreach ($permissions as $permission)
            <li>
                <label>
                    <input type="checkbox" name="permissions[]" value="{{ $permission->permission_id }}" {{ $role->permissions->contains($permission->permission_id) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </label>
            </li>
        @endforeach
    </ul>

    <button type="submit">Save Permissions</button>
</form>

<a href="{{ route('roles.show-permissions', $role->role_id) }}">Back to Role Permissions</a>
