@extends('layouts.app')

@section('title', 'Booking Statuses')

@section('content')
    <div class="head-title">
        <div class="left">
            <h1>Admin Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Admin</a>
                </li>
                <i class="fas fa-chevron-right"></i>
                <li>
                    <a href="{{ url('/roles') }}" class="act">Role</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="table" id="table_export">
        <div class="table__header">
            <h1>Role</h1>
            <div class="input-group">
                <input type="search" placeholder="Search data . . . " />
                <ion-icon name="search-outline"></ion-icon>
            </div>

            <div class="button-group">
                <div class="btn__add" title="Add to table" onclick="window.location.href='{{ route('roles.create') }}'">
                    <label>
                        <ion-icon name="add-circle-outline"></ion-icon>
                        <input type="button" style="display: none" />
                    </label>
                </div>


                <div class="export__file" title="Export File">
                    <label for="export-file" class="export__file-btn">
                        <ion-icon name="download-outline"></ion-icon>
                    </label>
                    <input type="checkbox" name="" id="export-file" />
                    <div class="export__file-options">
                        <label>Export As &nbsp; &#10140;</label>
                        <label for="export-file" id="toPDF">
                            PDF
                            <img src="{{ asset('images/pdf.png') }}" alt="" />
                        </label>

                        <label for="export-file" id="toJSON">
                            JSON
                            <img src="{{ asset('images/json.png') }}" alt="" />
                        </label>

                        <label for="export-file" id="toCSV">
                            CSV
                            <img src="{{ asset('images/csv.png') }}" alt="" />
                        </label>

                        <label for="export-file" id="toEXCEL">
                            EXCEL
                            <img src="{{ asset('images/excel.png') }}" alt="" />
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <form method="GET" class="num__page">
            <label for="perPage">Records per page:</label>
            <select name="perPage" id="perPage" onchange="this.form.submit()">
                <option value="5" @if ($roles->perPage() == 5) selected @endif>5</option>
                <option value="15" @if ($roles->perPage() == 15) selected @endif>15</option>
                <option value="25" @if ($roles->perPage() == 25) selected @endif>25</option>
                <option value="50" @if ($roles->perPage() == 50) selected @endif>50</option>
            </select>
        </form>
        <div class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="button-container">
                                <button onclick="window.location.href='{{ route('roles.edit', $role->role_id) }}'"
                                    class="edit">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>

                                <form action="{{ route('roles.destroy', $role->role_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>

                                <button
                                    onclick="window.location.href='{{ route('roles.show-permissions', $role->role_id) }}'"
                                    class="show-permissions">
                                    Show Permissions
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="pagination">
            <button class="pagination-button"
                @if (!$roles->onFirstPage()) onclick="window.location.href='{{ $roles->previousPageUrl() }}'" @endif
                {{ $roles->onFirstPage() ? 'disabled' : '' }}>Previous</button>
            <span class="pagination-info">{{ $roles->currentPage() }} /
                {{ $roles->lastPage() }}</span>
            <button class="pagination-button"
                @if ($roles->hasMorePages()) onclick="window.location='{{ $roles->nextPageUrl() }}'" @endif
                {{ !$roles->hasMorePages() ? 'disabled' : '' }}>Next</button>
        </div>


    </section>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
