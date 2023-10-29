<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Hotel;


class RoomController extends Controller
{
    /**
     * Display a listing of rooms.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of rooms
        $rooms = Room::with(['hotel', 'roomType'])->latest()->paginate($perPage);

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new room.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roomTypes = RoomType::all(); // Thay RoomType bằng tên model thực của bạn
        $hotels = Hotel::all(); // Thay Hotel bằng tên model thực của bạn

        return view('rooms.create', compact('roomTypes', 'hotels'));
    }
    /**
     * Store a newly created room.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,hotel_id',
            'room_type_id' => 'required|exists:room_types,room_type_id',
            'price_per_night' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'available' => 'required|boolean',
        ]);

        // Chuyển đổi giá trị 'price_per_night' thành số thực
        $data['price_per_night'] = floatval($data['price_per_night']);

        // Kiểm tra giới hạn của price_per_night
        if (strlen($data['price_per_night']) > 10) {
            // Nếu vượt quá giới hạn, có thể xử lý tùy theo yêu cầu, ví dụ: thông báo lỗi và redirect lại form
            return redirect()->back()->withInput()->withErrors(['price_per_night' => 'Price per night should not exceed 10 digits.']);
        }



        Room::create($data);

        return redirect()->route('rooms.index');
    }





    /**
     * Show the form for editing a room.
     *
     * @param  int  $roomId
     * @return \Illuminate\View\View
     */
    public function edit($roomId)
    {
        $room = Room::with(['hotel', 'roomType'])->findOrFail($roomId);
        $roomTypes = RoomType::all();
        $hotels = Hotel::all(); // Thêm dòng này để lấy dữ liệu hotels
        return view('rooms.edit', compact('room', 'roomTypes', 'hotels'));
    }


    /**
     * Update the room.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'hotel_id' => 'required|exists:hotels,hotel_id',
            'room_type_id' => 'required|exists:room_types,room_type_id',
            'price_per_night' => 'required|numeric',
            'available' => 'required|boolean',
        ]);

        $room->update($data);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the room.
     *
     * @param  int  $roomId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($roomId)
    {
        $room = Room::find($roomId);

        if (!$room) {
            // Handle the case where the room is not found
            abort(404);
        }

        $room->delete();

        return redirect()->route('rooms.index');
    }
}
