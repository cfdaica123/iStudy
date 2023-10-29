<!-- resources/views/users/edit.blade.php -->

<h1>Edit User</h1>

<form action="{{ route('users.update', $user->user_id) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    {{-- <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
        <small>Leave it blank if you don't want to change the password.</small>
    </div> --}}

    <div class="form-group">
        <label for="user_status_id">User Status</label>
        <select name="user_status_id" id="user_status_id" class="form-control">
            <!-- Populate the user statuses options dynamically from the database -->
            @foreach($statuses as $status)
                <option value="{{ $status->user_status_id }}" {{ $user->user_status_id == $status->user_status_id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="role_id">Role</label>
        <select name="role_id" id="role_id" class="form-control">
            <!-- Populate the roles options dynamically from the database -->
            @foreach($roles as $role)
                <option value="{{ $role->role_id }}" {{ $user->role_id == $role->role_id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update User</button>
</form>
