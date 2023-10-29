<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $primaryKey = 'hotel_id';
    protected $fillable = ['name', 'city', 'address'];

    /**
     * Get all hotels.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllHotels()
    {
        return self::all();
    }

    /**
     * Get a hotel by ID.
     *
     * @param  int  $hotelId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getHotelById($hotelId)
    {
        return self::findOrFail($hotelId);
    }

    /**
     * Create a new hotel.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createHotel($data)
    {
        return self::create($data);
    }

    /**
     * Update a hotel.
     *
     * @param  int  $hotelId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateHotel($hotelId, $data)
    {
        $hotel = self::findOrFail($hotelId);
        $hotel->update($data);

        return $hotel;
    }

    /**
     * Delete a hotel.
     *
     * @param  int  $hotelId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteHotel($hotelId)
    {
        $hotel = self::findOrFail($hotelId);
        $hotel->delete();

        return $hotel;
    }
}
