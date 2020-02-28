<?php

namespace App\Factory;

use App\Model\User;
use App\Model\UserRole;

/**
 * Class UserFactory
 *
 * @author A. Suvorkin
 */
class UserFactory
{
    /**
     * @param int $id
     * @param string $username
     * @param UserRole $userRole
     * @return User
     */
    public function create(int $id, string $username, UserRole $userRole)
    {
        return new User($id, $username, $userRole);
    }
}