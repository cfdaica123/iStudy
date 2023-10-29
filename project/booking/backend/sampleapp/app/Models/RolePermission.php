<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'role_permissions';
    protected $primaryKey = 'role_permission_id';
    protected $fillable = ['role_id', 'permission_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    public function getRolePermissionsByRoleId($roleId)
    {
        return $this->where('role_id', $roleId)->with('permission')->get();
    }

    public function getPermissionsByRoleId($roleId)
    {
        return $this->where('role_id', $roleId)->pluck('permission_id')->toArray();
    }

    public function getRolesByPermissionId($permissionId)
    {
        return $this->where('permission_id', $permissionId)->pluck('role_id')->toArray();
    }

    public function createRolePermissions($roleId, $permissionIds)
    {
        $rolePermissions = [];

        foreach ($permissionIds as $permissionId) {
            $rolePermissions[] = ['role_id' => $roleId, 'permission_id' => $permissionId];
        }

        return $this->insert($rolePermissions);
    }

    public function updateRolePermission($rolePermissionId, $data)
    {
        return $this->where('role_permission_id', $rolePermissionId)->update($data);
    }

    public function deleteRolePermission($rolePermissionId)
    {
        return $this->where('role_permission_id', $rolePermissionId)->delete();
    }
}
