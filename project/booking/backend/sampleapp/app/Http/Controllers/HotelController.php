<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * Display a listing of hotels.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of hotels
        $hotels = Hotel::latest()->paginate($perPage);

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created hotel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Hotel::createHotel($data);

        return redirect()->route('hotels.index');
    }

    /**
     * Show the form for editing a hotel.
     *
     * @param  int  $hotelId
     * @return \Illuminate\View\View
     */
    public function edit($hotelId)
    {
        $hotel = Hotel::getHotelById($hotelId);
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the hotel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        Hotel::updateHotel($hotel->hotel_id, $data);

        return redirect()->route('hotels.index');
    }

    /**
     * Remove the hotel.
     *
     * @param  int  $hotelId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($hotelId)
    {
        $hotel = Hotel::find($hotelId);

        if (!$hotel) {
            // Handle the case where the hotel is not found
            abort(404);
        }

        $hotel->delete();

        return redirect()->route('hotels.index');
    }
}
