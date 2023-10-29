<!-- resources/views/room_types/edit.blade.php -->

<h1>Edit Room Type</h1>

<form method="post" action="{{ route('room_types.update', ['roomType' => $roomType->room_type_id]) }}">
    @csrf
    @method('put')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $roomType->name }}" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description">{{ $roomType->description }}</textarea>

    <button type="submit">Update Room Type</button>
</form>

<a href="{{ route('room_types.index') }}">Back to Room Types</a>
