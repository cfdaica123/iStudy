<!-- resources/views/rooms/edit.blade.php -->

<h1>Edit Room</h1>

<!-- Form to edit an existing room, customize the form structure as needed -->
<form method="post" action="{{ route('rooms.update', ['room' => $room->room_id]) }}">
    @csrf
    @method('put')
    <!-- Add form fields for room editing -->

    <!-- Example: Room Type Dropdown -->
    <label for="room_type_id">Room Type:</label>
    <select name="room_type_id" id="room_type_id" required>
        @foreach ($roomTypes as $roomType)
            <option value="{{ $roomType->room_type_id }}" {{ $room->room_type_id == $roomType->room_type_id ? 'selected' : '' }}>
                {{ $roomType->name }}
            </option>
        @endforeach
    </select>

    <!-- Example: Hotel Dropdown -->
    <label for="hotel_id">Hotel:</label>
    <select name="hotel_id" id="hotel_id" required>
        @foreach ($hotels as $hotel)
            <option value="{{ $hotel->hotel_id }}" {{ $room->hotel_id == $hotel->hotel_id ? 'selected' : '' }}>
                {{ $hotel->name }}
            </option>
        @endforeach
    </select>

    <!-- Example: Price per Night -->
    <label for="price_per_night">Price per Night:</label>
    <input type="number" name="price_per_night" id="price_per_night" value="{{ $room->price_per_night }}" required>

    <!-- Example: Availability -->
    <label for="available">Available:</label>
    <input type="hidden" name="available" value="0">
    <input type="checkbox" name="available" id="available" value="1" {{ $room->available ? 'checked' : '' }}>

    <!-- Add more form fields as needed -->

    <button type="submit">Update</button>
</form>

<a href="{{ route('rooms.index') }}">Back to Rooms</a>
