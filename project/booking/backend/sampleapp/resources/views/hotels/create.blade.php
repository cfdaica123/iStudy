<!-- hotels/create.blade.php -->

<h1>Create Hotel</h1>

<form method="post" action="{{ route('hotels.store') }}">
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="city">City:</label>
    <input type="text" name="city" id="city" required>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required>

    <button type="submit">Create Hotel</button>
</form>

<a href="{{ route('hotels.index') }}">Back to Hotels</a>
