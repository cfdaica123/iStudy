<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $primaryKey = 'user_status_id';
    protected $fillable = ['name'];

    /**
     * Get all user statuses.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllUserStatuses()
    {
        return $this->all();
    }

    /**
     * Get a user status by ID.
     *
     * @param  int  $statusId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserStatusById($statusId)
    {
        return $this->findOrFail($statusId);
    }

    /**
     * Create a new user status.
     *
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createUserStatus($data)
    {
        return $this->create($data);
    }

    /**
     * Update a user status.
     *
     * @param  int  $statusId
     * @param  array  $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateUserStatus($statusId, $data)
    {
        $userStatus = $this->findOrFail($statusId);
        $userStatus->update($data);

        return $userStatus;
    }

    /**
     * Delete a user status.
     *
     * @param  int  $statusId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function deleteUserStatus($statusId)
    {
        $userStatus = $this->findOrFail($statusId);
        $userStatus->delete();

        return $userStatus;
    }
}
