<!-- departments/create.blade.php -->

<h1>Create Department</h1>

<form method="post" action="{{ route('departments.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <!-- Add other fields as needed -->

    <button type="submit">Create Department</button>
</form>

<a href="{{ route('departments.index') }}">Back to Departments</a>
