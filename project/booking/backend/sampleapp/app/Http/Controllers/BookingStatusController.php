<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingStatus;

class BookingStatusController extends Controller
{
    /**
     * Display a listing of booking statuses.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $bookingStatuses = BookingStatus::all();
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of permissions
        $bookingStatuses = BookingStatus::latest()->paginate($perPage);

        return view('booking_statuses.index', compact('bookingStatuses'));
    }

    /**
     * Show the form for creating a new booking status.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('booking_statuses.create');
    }

    /**
     * Store a newly created booking status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        BookingStatus::createBookingStatus($data);

        return redirect()->route('booking_statuses.index');
    }

    /**
     * Show the form for editing a booking status.
     *
     * @param  int  $statusId
     * @return \Illuminate\View\View
     */
    public function edit($statusId)
    {
        $bookingStatus = BookingStatus::getBookingStatusById($statusId);
        return view('booking_statuses.edit', compact('bookingStatus'));
    }

    /**
     * Update the booking status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingStatus  $bookingStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, BookingStatus $bookingStatus)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        BookingStatus::updateBookingStatus($bookingStatus->status_id, $data);

        return redirect()->route('booking_statuses.index');
    }

    /**
     * Remove the booking status.
     *
     * @param  int  $statusId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($statusId)
    {
        $bookingStatus = BookingStatus::find($statusId);

        if (!$bookingStatus) {
            // Handle the case where the booking status is not found
            abort(404);
        }

        $bookingStatus->delete();

        return redirect()->route('booking_statuses.index');
    }
}
