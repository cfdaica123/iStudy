<!-- resources/views/tours/show.blade.php -->
<h1>{{ $tour->title }}</h1>
<p>City: {{ $tour->city }}</p>
<p>Address: {{ $tour->address }}</p>
<p>Latitude: {{ $tour->latitude }}</p>
<p>Longitude: {{ $tour->longitude }}</p>
<p>Distance: {{ $tour->distance }}</p>
<p>Price: {{ $tour->price }}</p>
<p>Max Group Size: {{ $tour->max_group_size }}</p>
<p>Description: {{ $tour->description }}</p>
<p>Image: @if ($tour->cover_image)
    <img src="{{ asset($tour->cover_image) }}" alt="Avatar" width="50" height="50">
    
    @else
        <span>Not Image</span>
    @endif
</p>

<!-- Hiển thị Category -->
<p>Category: {{ $tour->category->name }}</p>

<!-- You can add more details as needed -->
<a href="{{ route('tours.index') }}">Back to Tours</a>
