<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role_id';
    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    /**
     * Get all roles.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllRoles()
    {
        return $this->all();
    }

    /**
     * Get a role by ID.
     *
     * @param  int  $roleId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getRoleById($roleId)
    {
        return $this->findOrFail($roleId);
    }

    /**
     * Create a new role.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createRole($data)
    {
        return $this->create($data);
    }

    /**
     * Update a role.
     *
     * @param  int  $roleId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateRole($roleId, $data)
    {
        $role = $this->findOrFail($roleId);
        $role->update($data);

        return $role;
    }

    /**
     * Delete a role.
     *
     * @param  int  $roleId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteRole($roleId)
    {
        $role = $this->findOrFail($roleId);
        $role->delete();

        return $role;
    }
}
