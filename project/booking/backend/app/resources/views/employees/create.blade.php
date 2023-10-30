<!-- resources/views/employees/create.blade.php -->

<h1>Add Employee</h1>
<form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data">
    @csrf
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" required>

    <label for="address">Address:</label>
    <input type="text" name="address" required>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required>

    <label for="birthday">Birthday:</label>
    <input type="date" name="birthday">

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="user_id">User:</label>
    <input type="number" name="user_id" required>

    <label for="position">Position:</label>
    <input type="text" name="position" required>

    <label for="hire_date">Hire Date:</label>
    <input type="date" name="hire_date" required>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" required>

    <button type="submit">Save</button>
</form>
<a href="{{ route('employees.index') }}">Back to List</a>
