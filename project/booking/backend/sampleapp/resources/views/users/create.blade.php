<div class="container">
    <h1>Create User</h1>

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role_id" id="role" class="form-control">
                <!-- Populate the roles options dynamically from the database -->
                <option value="">--Chọn--</option>
                @foreach($roles as $role)
                    <option value="{{ $role->role_id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>






        <!-- Add other form fields for user creation -->
        <!-- For example, you might want to add more fields based on your user model -->

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
