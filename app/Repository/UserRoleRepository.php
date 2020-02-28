<?php

namespace App\Repository;

use App\Database;
use App\Factory\UserRoleFactory;

/**
 * Class UserRoleRepository
 *
 * @author A. Suvorkin
 */
class UserRoleRepository
{
    /**
     * @var UserRoleFactory
     */
    private $factory;

    /**
     * UserRoleRepository constructor.
     */
    public function __construct()
    {
        $this->factory = new UserRoleFactory;
    }

    /**
     * Получение роли по идентификатору.
     *
     * @param int $id
     * @return \App\Model\UserRole|bool
     */
    public function getById(int $id)
    {
        $db = new Database;
        $query = $db->getDb()->prepare('SELECT * FROM `user_role` WHERE `id` = ?');
        $query->execute([$id]);

        $_role = $query->fetch();

        if(empty($_role)) {
            return false;
        }

        return $this->factory->create($_role['id'], $_role['rolename']);
    }

    /**
     * Получение всех ролей.
     *
     * @return array
     */
    public function getAll()
    {
        $db = new Database;
        $query = $db->getDb()->prepare('SELECT * FROM `user_role`');
        $query->execute();

        $roles = [];
        foreach ($query->fetchAll() as $_role) {
            $roles[] = $this->factory->create(
                $_role['id'],
                $_role['rolename']
            );
        }

        return $roles;
    }
}