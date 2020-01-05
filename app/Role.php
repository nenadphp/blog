<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    /**
     * @return mixed
     */
    public function getRoles()
    {
        return self::distinct('role')->get();
    }

    /**
     * @param int $userId
     * @param int $roleId
     * @return mixed
     */
    public function addRole(int $userId,int $roleId)
    {
        return DB::table('role_user')->updateOrInsert([
            'user_id' => $userId,
            'role_id' => $roleId
            ]
        );
    }

    /**
     * @param int $userId
     * @param int $roleId
     * @return mixed
     */
    public function removeRole(int $userId,int $roleId)
    {
        return DB::table('role_user')->where('user_id', $userId)->where('role_id', $roleId)->delete();
    }
}
