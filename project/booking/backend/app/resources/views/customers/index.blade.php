<h1>Customers</h1>

    <!-- Dropdown để chọn số bản ghi hiển thị -->
    <form method="GET" class="num__page">
        <label for="perPage">Records per page:</label>
        <select name="perPage" id="perPage" onchange="this.form.submit()">
            <option value="5" @if ($customers->perPage() == 5) selected @endif>5</option>
            <option value="15" @if ($customers->perPage() == 15) selected @endif>15</option>
            <option value="25" @if ($customers->perPage() == 25) selected @endif>25</option>
            <option value="50" @if ($customers->perPage() == 50) selected @endif>50</option>
        </select>
    </form>

    <!-- Bảng danh sách khách hàng -->
    <table class="table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}">View</a>
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                        <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        <button class="pagination-button"
            @if (!$customers->onFirstPage()) onclick="window.location='{{ $customers->previousPageUrl() }}'" @endif
            {{ $customers->onFirstPage() ? 'disabled' : '' }}>Previous</button>
        <span class="pagination-info">{{ $customers->currentPage() }} /
            {{ $customers->lastPage() }}</span>
        <button class="pagination-button"
            @if ($customers->hasMorePages()) onclick="window.location='{{ $customers->nextPageUrl() }}'" @endif
            {{ !$customers->hasMorePages() ? 'disabled' : '' }}>Next</button>
    </div>
    <a href="{{ route('customers.create') }}">Add Customer</a>

    <script>
        // Hàm thay đổi số bản ghi hiển thị khi chọn từ dropdown
        function changeRecordsPerPage() {
            const recordsPerPage = document.getElementById('recordsPerPage').value;
            window.location.href = "{{ route('customers.index') }}?records=" + recordsPerPage;
        }
    </script>
