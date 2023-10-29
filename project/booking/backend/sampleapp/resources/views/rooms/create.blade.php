<h1>Create Room</h1>

    <!-- Form to create a new room, customize the form structure as needed -->
    <form method="post" action="{{ route('rooms.store') }}">
        @csrf
        <!-- Add form fields for room creation -->

        <!-- Example: Room Type Dropdown -->
        <label for="room_type_id">Room Type:</label>
        <select name="room_type_id" id="room_type_id" required>
            @foreach ($roomTypes as $roomType)
                <option value="{{ $roomType->room_type_id }}">{{ $roomType->name }}</option>
            @endforeach
        </select>

        <!-- Example: Hotel Dropdown -->
        <label for="hotel_id">Hotel:</label>
        <select name="hotel_id" id="hotel_id" required>
            @foreach ($hotels as $hotel)
                <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
            @endforeach
        </select>

        <!-- Example: Price per Night -->
        <label for="price_per_night">Price per Night:</label>
        <input type="number" name="price_per_night" id="price_per_night" required>


        <!-- Example: Availability -->
        <!-- Example: Availability -->
<label for="available">Available:</label>
<input type="hidden" name="available" value="0"> <!-- Thêm dòng này -->
<input type="checkbox" name="available" id="available" value="1">


        <!-- Add more form fields as needed -->

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('rooms.index') }}">Back to Rooms</a>
