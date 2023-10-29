<!-- resources/views/rooms/index.blade.php -->

<h1>Rooms</h1>
<form method="GET" class="num__page">
    <label for="perPage">Records per page:</label>
    <select name="perPage" id="perPage" onchange="this.form.submit()">
        <option value="5" @if ($rooms->perPage() == 5) selected @endif>5</option>
        <option value="15" @if ($rooms->perPage() == 15) selected @endif>15</option>
        <option value="25" @if ($rooms->perPage() == 25) selected @endif>25</option>
        <option value="50" @if ($rooms->perPage() == 50) selected @endif>50</option>
    </select>
</form>

<div class="pagination">
    <button class="pagination-button"
        @if (!$rooms->onFirstPage()) onclick="window.location='{{ $rooms->previousPageUrl() }}'" @endif
        {{ $rooms->onFirstPage() ? 'disabled' : '' }}>Previous</button>
    <span class="pagination-info">{{ $rooms->currentPage() }} /
        {{ $rooms->lastPage() }}</span>
    <button class="pagination-button"
        @if ($rooms->hasMorePages()) onclick="window.location='{{ $rooms->nextPageUrl() }}'" @endif
        {{ !$rooms->hasMorePages() ? 'disabled' : '' }}>Next</button>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Hotel</th>
            <th>Room Type</th>
            <th>Price per Night</th>
            <th>Available</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->room_id }}</td>
                <td>{{ $room->hotel->name }}</td>
                <td>{{ $room->roomType->name }}</td>
                <td>{{ $room->price_per_night }}</td>
                <td>{{ $room->available ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('rooms.edit', ['room' => $room->room_id]) }}">Edit</a>
                    <form action="{{ route('rooms.destroy', ['room' => $room->room_id]) }}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('rooms.create') }}">Create Room</a>
