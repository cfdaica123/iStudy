<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $primaryKey = 'room_type_id';
    protected $fillable = ['name', 'description'];

    /**
     * Get all room types.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllRoomTypes()
    {
        return self::all();
    }

    /**
     * Get a room type by ID.
     *
     * @param  int  $roomTypeId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getRoomTypeById($roomTypeId)
    {
        return self::findOrFail($roomTypeId);
    }

    /**
     * Create a new room type.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createRoomType($data)
    {
        return self::create($data);
    }

    /**
     * Update a room type.
     *
     * @param  int  $roomTypeId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateRoomType($roomTypeId, $data)
    {
        $roomType = self::findOrFail($roomTypeId);
        $roomType->update($data);

        return $roomType;
    }

    /**
     * Delete a room type.
     *
     * @param  int  $roomTypeId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteRoomType($roomTypeId)
    {
        $roomType = self::findOrFail($roomTypeId);
        $roomType->delete();

        return $roomType;
    }
}
