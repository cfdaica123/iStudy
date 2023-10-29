<div class="container">
    <h1>User Details</h1>

    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>

    <!-- Display Customer details if available -->
    @if ($user->customer)
        <h2>Customer Details</h2>
        <p><strong>Customer ID:</strong> {{ $user->customer->customer_id }}</p>
        <p><strong>Full Name:</strong> {{ $user->customer->full_name }}</p>
        <p><strong>Phone:</strong> {{ $user->customer->phone }}</p>
        <p><strong>Address:</strong> {{ $user->customer->address }}</p>
        <p><strong>Gender:</strong> {{ $user->customer->gender }}</p>
        <p><strong>Birthday:</strong> {{ $user->customer->birthday }}</p>
        @if ($user->customer && $user->customer->image)
            <p><strong>Image:</strong> {{ $user->customer->image }}</p>
        @else
            <p><strong>Image:</strong> No image</p>
        @endif

        <!-- Add other customer details as needed -->
    @endif


    <!-- Display Employee details if available -->
    @if ($user->employee)
        <h2>Employee Details</h2>
        <p><strong>Full Name:</strong> {{ $user->employee->full_name }}</p>
        <p><strong>Address:</strong> {{ $user->employee->address }}</p>
        <p><strong>Phone:</strong> {{ $user->employee->phone }}</p>
        <p><strong>Birthday:</strong> {{ $user->employee->birthday }}</p>
        <p><strong>Gender:</strong> {{ $user->employee->gender }}</p>
        <p><strong>Department:</strong> {{ $user->employee->department->name }}</p>
        <p><strong>Position:</strong> {{ $user->employee->position }}</p>
        <p><strong>Hire Date:</strong> {{ $user->employee->hire_date }}</p>
        <p><strong>Salary:</strong> {{ $user->employee->salary }}</p>
        @if ($user->employee && $user->employee->image)
            <p><strong>Image:</strong> {{ $user->employee->image }}</p>
        @else
            <p><strong>Image:</strong> No image</p>
        @endif
    @endif
</div>
