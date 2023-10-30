<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'start_date',
        'end_date',
    ];

    public function category()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }
}
