<!-- resources/views/roles/show_permissions.blade.php -->

<h1>Role Permissions</h1>
<p>Role ID: {{ $role->role_id }}</p>
<p>Role Name: {{ $role->name }}</p>

<p>Permissions:</p>
<ul>
    @forelse ($role->permissions as $permission)
        <li>{{ $permission->name }}</li>
    @empty
        <li>No permissions for this role.</li>
    @endforelse
</ul>

<a href="{{ route('roles.index') }}">Back to Roles</a>

<!-- Thêm nút "Edit Permissions" -->
<a href="{{ route('roles.edit-permissions', $role->role_id) }}" class="edit-permissions">Edit Permissions</a>
