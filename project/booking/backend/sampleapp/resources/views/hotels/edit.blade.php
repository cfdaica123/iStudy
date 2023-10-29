<!-- hotels/edit.blade.php -->

<h1>Edit Hotel</h1>

<form method="post" action="{{ route('hotels.update', ['hotel' => $hotel->hotel_id]) }}">
    @csrf
    @method('put')

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ $hotel->name }}" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" value="{{ $hotel->city }}" required>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="{{ $hotel->address }}" required>

    <button type="submit">Update Hotel</button>
</form>

<a href="{{ route('hotels.index') }}">Back to Hotels</a>
