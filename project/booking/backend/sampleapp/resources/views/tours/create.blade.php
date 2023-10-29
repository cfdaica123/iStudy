<!-- resources/views/tours/create.blade.php -->

<h1>Create Tour</h1>

<!-- Form to create a new tour -->
<form method="post" action="{{ route('tours.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Add form fields for tour creation -->

    <!-- Example: Tour Title -->
    <label for="title">Tour Title:</label>
    <input type="text" name="title" id="title" required>

    <!-- Example: City -->
    <label for="city">City:</label>
    <input type="text" name="city" id="city" required>

    <!-- Example: Address -->
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required>

    <!-- Example: Latitude -->
    <label for="latitude">Latitude:</label>
    <input type="text" name="latitude" id="latitude" required>

    <!-- Example: Longitude -->
    <label for="longitude">Longitude:</label>
    <input type="text" name="longitude" id="longitude" required>

    <!-- Example: Distance -->
    <label for="distance">Distance:</label>
    <input type="text" name="distance" id="distance" required>

    <!-- Example: Price -->
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" required>

    <!-- Example: Max Group Size -->
    <label for="max_group_size">Max Group Size:</label>
    <input type="text" name="max_group_size" id="max_group_size" required>

    <!-- Example: Description -->
    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <!-- Example: Cover Image -->
    <label for="cover_image">Cover Image:</label>
    <input type="file" name="cover_image" id="cover_image" accept="image/*">

    <!-- Example: Featured -->
    <!-- Example: Featured -->
<label for="featured">Featured:</label>
<input type="hidden" name="featured" value="0"> <!-- Hidden field with value 0 (false) -->
<input type="checkbox" name="featured" id="featured" value="1" {{ isset($tour) && $tour->featured ? 'checked' : '' }}>


    <!-- Add more form fields as needed -->

    <button type="submit">Create</button>
</form>

<a href="{{ route('tours.index') }}">Back to Tours</a>
