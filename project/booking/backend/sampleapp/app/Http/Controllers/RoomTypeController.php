<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of room types.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);
        $roomTypes = RoomType::latest()->paginate($perPage);

        return view('room_types.index', compact('roomTypes'));
    }

    /**
     * Show the form for creating a new room type.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('room_types.create');
    }

    /**
     * Store a newly created room type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        RoomType::createRoomType($data);

        return redirect()->route('room_types.index');
    }

    /**
     * Show the form for editing a room type.
     *
     * @param  int  $roomTypeId
     * @return \Illuminate\View\View
     */
    public function edit($roomTypeId)
    {
        $roomType = RoomType::getRoomTypeById($roomTypeId);
        return view('room_types.edit', compact('roomType'));
    }

    /**
     * Update the room type.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, RoomType $roomType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        RoomType::updateRoomType($roomType->room_type_id, $data);

        return redirect()->route('room_types.index');
    }

    /**
     * Remove the room type.
     *
     * @param  int  $roomTypeId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roomTypeId)
    {
        $roomType = RoomType::find($roomTypeId);

        if (!$roomType) {
            abort(404);
        }

        $roomType->delete();

        return redirect()->route('room_types.index');
    }
}
