<?php

namespace App\Http\Services;

use App\Role;

class RoleServices
{
    /**
     * @var Role $model
     */
    private $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @param int $userId
     * @param int $roleId
     * @param bool $role
     * @return mixed
     * @throws \Exception
     */
    public function updateUserRole(int $userId, int $roleId, $role)
    {
        if ($role === 'true') {
            return $this->model->addRole($userId, $roleId);
        }

        if ($role === 'false') {
            return $this->model->removeRole($userId, $roleId);
        }

        throw new \Exception('Adding role error');
    }
}
