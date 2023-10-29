<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';
    protected $fillable = ['hotel_id', 'room_type_id', 'price_per_night', 'available'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }


    /**
     * Get all rooms.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllRooms()
    {
        return self::all();
    }

    /**
     * Get a room by ID.
     *
     * @param  int  $roomId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getRoomById($roomId)
    {
        return self::findOrFail($roomId);
    }

    /**
     * Create a new room.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createRoom($data)
    {
        return self::create($data);
    }

    /**
     * Update a room.
     *
     * @param  int  $roomId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateRoom($roomId, $data)
    {
        $room = self::findOrFail($roomId);
        $room->update($data);

        return $room;
    }

    /**
     * Delete a room.
     *
     * @param  int  $roomId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteRoom($roomId)
    {
        $room = self::findOrFail($roomId);
        $room->delete();

        return $room;
    }
}
