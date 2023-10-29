<!-- resources/views/room_types/create.blade.php -->

<h1>Create Room Type</h1>

<form method="post" action="{{ route('room_types.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <button type="submit">Create Room Type</button>
</form>

<a href="{{ route('room_types.index') }}">Back to Room Types</a>
