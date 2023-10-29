<h1>Categories</h1>
<form method="GET" class="num__page">
    <label for="perPage">Records per page:</label>
    <select name="perPage" id="perPage" onchange="this.form.submit()">
        <option value="5" @if ($categories->perPage() == 5) selected @endif>5</option>
        <option value="15" @if ($categories->perPage() == 15) selected @endif>15</option>
        <option value="25" @if ($categories->perPage() == 25) selected @endif>25</option>
        <option value="50" @if ($categories->perPage() == 50) selected @endif>50</option>
    </select>
</form>

<div class="pagination">
    <button class="pagination-button"
        @if (!$categories->onFirstPage()) onclick="window.location='{{ $categories->previousPageUrl() }}'" @endif
        {{ $categories->onFirstPage() ? 'disabled' : '' }}>Previous</button>
    <span class="pagination-info">{{ $categories->currentPage() }} /
        {{ $categories->lastPage() }}</span>
    <button class="pagination-button"
        @if ($categories->hasMorePages()) onclick="window.location='{{ $categories->nextPageUrl() }}'" @endif
        {{ !$categories->hasMorePages() ? 'disabled' : '' }}>Next</button>
</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <!-- Add more table headers if needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->name }}</td>
                    <!-- Add more table cells if needed -->
                    <td>
                        <a href="{{ route('categories.edit', ['categoryId' => $category->category_id]) }}">Edit</a>
                        <form action="{{ route('categories.destroy', ['categoryId' => $category->category_id]) }}" method="post" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('categories.create') }}">Create Category</a>
