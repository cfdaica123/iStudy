<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = ['username', 'email', 'password', 'user_status_id', 'role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'user_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }

    public function getAllUsers()
    {
        return $this->all();
    }

    public function getUserById($userId)
    {
        return $this->findOrFail($userId);
    }

    public function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->create($data);
    }


    public function updateUser($userId, $data)
    {
        // Lấy người dùng từ database
        $user = $this->findOrFail($userId);

        // Thêm role_id vào dữ liệu trước khi cập nhật
        $data['role_id'] = $data['role_id'] ?? null;

        $user->update($data);

        // Sử dụng sync để quản lý roles của user
        $user->roles()->associate($data['role_id']);

        return $user;
    }

    public function deleteUser($userId)
    {
        $user = $this->findOrFail($userId);
        $user->delete();

        return $user;
    }
}
