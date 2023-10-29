<!-- resources/views/tours/edit.blade.php -->

<h1>Edit Tour</h1>

<!-- Form to edit an existing tour -->
<form method="post" action="{{ route('tours.update', ['tour' => $tour->tour_id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Add form fields for tour editing -->

    <!-- Example: Tour Title -->
    <label for="title">Tour Title:</label>
    <input type="text" name="title" id="title" value="{{ $tour->title }}" required>

    <!-- Example: City -->
    <label for="city">City:</label>
    <input type="text" name="city" id="city" value="{{ $tour->city }}" required>

    <!-- Example: Address -->
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="{{ $tour->address }}" required>

    <!-- Example: Latitude -->
    <label for="latitude">Latitude:</label>
    <input type="text" name="latitude" id="latitude" value="{{ $tour->latitude }}" required>

    <!-- Example: Longitude -->
    <label for="longitude">Longitude:</label>
    <input type="text" name="longitude" id="longitude" value="{{ $tour->longitude }}" required>

    <!-- Example: Distance -->
    <label for="distance">Distance:</label>
    <input type="text" name="distance" id="distance" value="{{ $tour->distance }}" required>

    <!-- Example: Price -->
    <label for="price">Price:</label>
    <input type="text" name="price" id="price" value="{{ $tour->price }}" required>

    <!-- Example: Max Group Size -->
    <label for="max_group_size">Max Group Size:</label>
    <input type="text" name="max_group_size" id="max_group_size" value="{{ $tour->max_group_size }}" required>

    <!-- Example: Description -->
    <label for="description">Description:</label>
    <textarea name="description" id="description" required>{{ $tour->description }}</textarea>

    <!-- Example: Cover Image -->
    <label for="cover_image">Cover Image:</label>
    <input type="file" name="cover_image" id="cover_image">

    <!-- Example: Existing Cover Image -->
    <!-- Example: Existing Cover Image -->
    @if (optional($tour->cover_image)->filename)
        <p>Current Image:</p>
        <img src="{{ asset('images/' . $tour->cover_image->filename) }}" alt="{{ $tour->title }}">
        <!-- Add a link to navigate to another page to view the image -->
        <a href="{{ route('image.show', ['image' => $tour->cover_image->image_id]) }}">View Full Size Image</a>
    @else
        <p>No Image</p>
    @endif

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->category_id }}"
                {{ $tour->category_id == $category->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <!-- Example: Featured -->
    <label for="featured">Featured:</label>
    <input type="hidden" name="featured" value="0"> <!-- Hidden field with value 0 (false) -->
    <input type="checkbox" name="featured" id="featured" value="1" {{ $tour->featured ? 'checked' : '' }}>

    <!-- Add more form fields as needed -->

    <button type="submit">Update</button>
</form>

<a href="{{ route('tours.index') }}">Back to Tours</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
