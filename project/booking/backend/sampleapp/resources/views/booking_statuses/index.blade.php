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
                    <a href="{{ url('/booking_statuses') }}" class="act">Booking Status</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="table" id="table_export">
        <div class="table__header">
            <h1>Booking Status</h1>
            <div class="input-group">
                <input type="search" placeholder="Search data . . . " />
                <ion-icon name="search-outline"></ion-icon>
            </div>

            <div class="button-group">
                <div class="btn__add" title="Add to table"
                    onclick="window.location.href='{{ route('booking_statuses.create') }}'">
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
                <option value="5" @if ($bookingStatuses->perPage() == 5) selected @endif>5</option>
                <option value="15" @if ($bookingStatuses->perPage() == 15) selected @endif>15</option>
                <option value="25" @if ($bookingStatuses->perPage() == 25) selected @endif>25</option>
                <option value="50" @if ($bookingStatuses->perPage() == 50) selected @endif>50</option>
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

                    @foreach ($bookingStatuses as $status)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $status->name }}</td>
                            <td class="button-container">
                                <button
                                    onclick="window.location.href='{{ route('booking_statuses.edit', $status->status_id) }}'"
                                    class="edit">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>


                                <form action="{{ route('booking_statuses.destroy', $status->status_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <button class="pagination-button"
                @if (!$bookingStatuses->onFirstPage()) onclick="window.location='{{ $bookingStatuses->previousPageUrl() }}'" @endif
                {{ $bookingStatuses->onFirstPage() ? 'disabled' : '' }}>Previous</button>
            <span class="pagination-info">{{ $bookingStatuses->currentPage() }} /
                {{ $bookingStatuses->lastPage() }}</span>
            <button class="pagination-button"
                @if ($bookingStatuses->hasMorePages()) onclick="window.location='{{ $bookingStatuses->nextPageUrl() }}'" @endif
                {{ !$bookingStatuses->hasMorePages() ? 'disabled' : '' }}>Next</button>
        </div>


    </section>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
