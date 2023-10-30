<h1>Edit Customer</h1>
    <form method="post" action="{{ route('customers.update', $customer->id) }}">
        @csrf
        @method('PUT')
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="{{ $customer->full_name }}" required>
        <!-- Add other input fields with current customer information -->

        <button type="submit">Update</button>
    </form>
    <a href="{{ route('customers.index') }}">Back to List</a>
