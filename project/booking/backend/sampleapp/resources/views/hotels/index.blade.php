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
                    <a href="{{ url('/hotels') }}" class="act">Hotel</a>
                </li>
            </ul>
        </div>
    </div>

    <section class="table" id="table_export">
        <div class="table__header">
            <h1>Hotel</h1>
            <div class="input-group">
                <input type="search" placeholder="Search data . . . " />
                <ion-icon name="search-outline"></ion-icon>
            </div>

            <div class="button-group">
                <div class="btn__add" title="Add to table"
                    onclick="window.location.href='{{ route('departments.create') }}'">
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
                <option value="5" @if ($hotels->perPage() == 5) selected @endif>5</option>
                <option value="15" @if ($hotels->perPage() == 15) selected @endif>15</option>
                <option value="25" @if ($hotels->perPage() == 25) selected @endif>25</option>
                <option value="50" @if ($hotels->perPage() == 50) selected @endif>50</option>
            </select>
        </form>
        <div class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->city }}</td>
                            <td>{{ $hotel->address }}</td>
                            <td class="button-container">
                                <button
                                    onclick="window.location.href='{{ route('hotels.edit',$hotel->hotel_id) }}'"
                                    class="edit">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>

                                <form action="{{ route('hotels.destroy',$hotel->hotel_id) }}"
                                    method="POST">
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
                @if (!$hotels->onFirstPage()) onclick="window.location.href='{{ $hotels->previousPageUrl() }}'" @endif
                {{ $hotels->onFirstPage() ? 'disabled' : '' }}>Previous</button>
            <span class="pagination-info">{{ $hotels->currentPage() }} /
                {{ $hotels->lastPage() }}</span>
            <button class="pagination-button"
                @if ($hotels->hasMorePages()) onclick="window.location='{{ $hotels->nextPageUrl() }}'" @endif
                {{ !$hotels->hasMorePages() ? 'disabled' : '' }}>Next</button>
        </div>


    </section>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@endsection
