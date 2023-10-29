<form method="post" action="{{ route('departments.update', ['department' => $department->department_id]) }}">
    @csrf
    @method('put')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $department->name }}" required>

    <!-- Add other fields as needed -->

    <button type="submit">Update Department</button>
</form>
<h1>edit</h1>
