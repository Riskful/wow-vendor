<?php

namespace App\Controller;

use App\Database;
use App\Model\User;

/**
 * Class UserController
 *
 * @author A. Suvorkin
 */
class UserController
{
    /**
     * @return array
     */
    public function getRoles()
    {
        $database = new Database;
        $query = $database->getDb()->query('SELECT * FROM `user_role`');

        return $query->fetchAll();
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        $database = new Database;
        $query = $database->getDb()->query('SELECT * FROM `user`');

        return $query->fetchAll();
    }

    /**
     * @param User $user
     */
    public function addUser(User $user)
    {
        $database = new Database;
        $query = $database->getDb()->prepare('INSERT INTO `user`(`username`, `role_id`) VALUES (?, ?)');

        $query->execute([$user->getUsername(), $user->getRoleId()]);
    }
}