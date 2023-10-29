<h1>Create New Booking Status</h1>

<form action="{{ route('booking_statuses.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <button type="submit">Create</button>
</form>
