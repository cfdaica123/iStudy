<!-- resources/views/booking_statuses/edit.blade.php -->

<h1>Edit Booking Status</h1>

<form action="{{ route('booking_statuses.update', ['bookingStatus' => $bookingStatus->status_id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $bookingStatus->name }}" required>

    <button type="submit">Update</button>
</form>
