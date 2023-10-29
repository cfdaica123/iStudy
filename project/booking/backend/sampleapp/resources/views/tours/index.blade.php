<h1>Tour List</h1>
<form method="GET" class="num__page">
    <label for="perPage">Records per page:</label>
    <select name="perPage" id="perPage" onchange="this.form.submit()">
        <option value="5" @if ($tours->perPage() == 5) selected @endif>5</option>
        <option value="15" @if ($tours->perPage() == 15) selected @endif>15</option>
        <option value="25" @if ($tours->perPage() == 25) selected @endif>25</option>
        <option value="50" @if ($tours->perPage() == 50) selected @endif>50</option>
    </select>
</form>

<div class="pagination">
    <button class="pagination-button"
        @if (!$tours->onFirstPage()) onclick="window.location='{{ $tours->previousPageUrl() }}'" @endif
        {{ $tours->onFirstPage() ? 'disabled' : '' }}>Previous</button>
    <span class="pagination-info">{{ $tours->currentPage() }} /
        {{ $tours->lastPage() }}</span>
    <button class="pagination-button"
        @if ($tours->hasMorePages()) onclick="window.location='{{ $tours->nextPageUrl() }}'" @endif
        {{ !$tours->hasMorePages() ? 'disabled' : '' }}>Next</button>
    
    <!-- Display the list of tours -->
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>City</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
                <tr>
                    <td>{{ $tour->title }}</td>
                    <td>{{ $tour->city }}</td>
                    <td>{{ $tour->price }}</td>
                    <td>
                        @if ($tour->cover_image)
                            <img src="{{ asset($tour->cover_image) }}" alt="Avatar" width="50" height="50">
                        @else
                            <span>Not Image</span>
                        @endif
                    </td>
                    <td>{{ $tour->category->name }}</td>
                    <td>
                        <a href="{{ route('tours.show', ['tour' => $tour->tour_id]) }}">View Details</a>
                        <a href="{{ route('tours.edit', ['tour' => $tour->tour_id]) }}">Edit</a>
                        <!-- Thêm nút xóa -->
                        <form method="post" action="{{ route('tours.destroy', ['tour' => $tour->tour_id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this tour?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $tours->links() }}

    <a href="{{ route('tours.create') }}">Create New Tour</a>
</div>
