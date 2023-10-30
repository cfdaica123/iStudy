<!-- resources/views/customers/create.blade.php -->

<h1>Add Customer</h1>
<form method="post" action="{{ route('customers.store') }}">
    @csrf
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" required>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required>

    <label for="address">Address:</label>
    <input type="text" name="address" required>

    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="birthday">Birthday:</label>
    <input type="date" name="birthday">

    <!-- Add other input fields for image, birthday, etc. -->

    <button type="submit">Save</button>
</form>
<a href="{{ route('customers.index') }}">Back to List</a>
