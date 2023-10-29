<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    // use HasFactory;

    protected $primaryKey = 'status_id';
    protected $fillable = ['name'];

    /**
     * Get all booking statuses.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllBookingStatuses()
    {
        return self::all();
    }

    /**
     * Get a booking status by ID.
     *
     * @param  int  $statusId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getBookingStatusById($statusId)
    {
        return self::findOrFail($statusId);
    }

    /**
     * Create a new booking status.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createBookingStatus($data)
    {
        return self::create($data);
    }

    /**
     * Update a booking status.
     *
     * @param  int  $statusId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateBookingStatus($statusId, $data)
    {
        $bookingStatus = self::findOrFail($statusId);
        $bookingStatus->update($data);

        return $bookingStatus;
    }

    /**
     * Delete a booking status.
     *
     * @param  int  $statusId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteBookingStatus($statusId)
    {
        $bookingStatus = self::findOrFail($statusId);
        $bookingStatus->delete();

        return $bookingStatus;
    }
}
