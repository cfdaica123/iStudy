<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $primaryKey = 'permission_id';
    protected $fillable = ['name'];


    // Thêm một quyền mới
    public static function createPermission($name)
    {
        return self::create(['name' => $name]);
    }

    public static function getAllPermissions()
    {
        return self::all();
    }

    public static function getPermissionById($id)
    {
        return self::find($id);
    }

    public static function updatePermission($id, $name)
    {
        $permission = self::find($id);

        if ($permission) {
            $permission->update(['name' => $name]);
            return $permission;
        }

        return null;
    }
    public static function deletePermission($id)
    {
        $permission = self::find($id);

        if ($permission) {
            $permission->delete();
            return true;
        }

        return false;
    }
}
