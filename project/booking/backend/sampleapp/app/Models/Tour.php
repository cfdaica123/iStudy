<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $primaryKey = 'tour_id';
    protected $fillable = [
        'title', 'city', 'address', 'latitude', 'longitude', 'distance', 'price',
        'max_group_size', 'description', 'cover_image', 'featured',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    /**
     * Get all tours.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllTours()
    {
        return self::all();
    }

    /**
     * Get a tour by ID.
     *
     * @param  int  $tourId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function getTourById($tourId)
    {
        return self::findOrFail($tourId);
    }

    /**
     * Create a new tour.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createTour($data)
    {
        return self::create($data);
    }

    /**
     * Update a tour.
     *
     * @param  int  $tourId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function updateTour($tourId, $data)
    {
        try {
            $tour = self::findOrFail($tourId);
            $tour->update($data);

            return $tour;
        } catch (\Exception $e) {
            // Nếu có lỗi, ném nó lại để nó được xử lý ở nơi gọi phương thức
            throw $e;
        }
    }



    /**
     * Delete a tour.
     *
     * @param  int  $tourId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function deleteTour($tourId)
    {
        $tour = self::findOrFail($tourId);
        $tour->delete();

        return $tour;
    }

    /**
     * Get the cover image for the tour.
     */
    public function coverImage()
    {
        return $this->belongsTo(Image::class, 'cover_image_id');
    }
}
