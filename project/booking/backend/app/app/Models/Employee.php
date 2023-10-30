<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'address',
        'phone',
        'birthday',
        'gender',
        'image',
        'user_id',
        'position',
        'hire_date',
        'salary',
    ];

    protected $primaryKey = 'employee_id';
    // Nếu bạn không muốn sử dụng cột 'created_at' và 'updated_at'
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
