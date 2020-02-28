<?php

namespace App\Factory;

use App\Model\UserRole;

/**
 * Class UserRoleFactory
 *
 * @author A. Suvorkin
 */
class UserRoleFactory
{
    /**
     * @param $id
     * @param $roleName
     * @return UserRole
     */
    public function create($id, $roleName)
    {
        return new UserRole($id, $roleName);
    }
}