<!-- resources/views/employees/edit.blade.php -->

<h1>Edit Employee</h1>
<form method="post" action="{{ route('employees.update', $employee->employee_id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" value="{{ $employee->full_name }}" required>

    <label for="address">Address:</label>
    <input type="text" name="address" value="{{ $employee->address }}" required>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="{{ $employee->phone }}" required>

    <label for="birthday">Birthday:</label>
    <input type="date" name="birthday" value="{{ $employee->birthday }}">

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
    </select>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="user_id">Email:</label>
    <input type="email" name="user_email" value="{{ $employee->user->email }}" required>

    <label for="position">Position:</label>
    <input type="text" name="position" value="{{ $employee->position }}" required>

    <label for="hire_date">Hire Date:</label>
    <input type="date" name="hire_date" value="{{ $employee->hire_date }}" required>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" value="{{ $employee->salary }}" required>

    <button type="submit">Update</button>
</form>
<a href="{{ route('employees.index') }}">Back to List</a>
