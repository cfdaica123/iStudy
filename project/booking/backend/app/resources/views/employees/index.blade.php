<h1>Employees</h1>
<a href="{{ route('employees.create') }}">Add Employee</a>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>Address</th>
                <th>Phone</th>
                <!-- Add more columns as needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <!-- Add more columns as needed -->
                    <td>
                        <a href="{{ route('employees.edit', $employee->employee_id) }}">Edit</a>
                        <form method="post" action="{{ route('employees.destroy', $employee->employee_id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $employees->links() }} <!-- Pagination links -->

