<?php

namespace App\Repository;

use App\Database;
use App\Factory\UserFactory;

/**
 * Class UserRepository
 *
 * @author A. Suvorkin
 */
class UserRepository
{
    /**
     * @var UserFactory
     */
    private $factory;

    /**
     * @var UserRoleRepository
     */
    private $userRoleRepository;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->factory = new UserFactory;
        $this->userRoleRepository = new UserRoleRepository;
    }

    /**
     * Получение пользователя по идентификатору.
     *
     * @param int $id
     * @return \App\Model\User|bool
     */
    public function getById(int $id)
    {
        $db = new Database;
        $query = $db->getDb()->prepare('SELECT * FROM `user` WHERE `id` = ?');
        $query->execute([$id]);
        $_user = $query->fetch();

        if(empty($_user)) {
            return false;
        }

        return $this->factory->create(
            $_user['id'],
            $_user['username'],
            $this->userRoleRepository->getById($_user['role_id'])
        );
    }

    /**
     * Все пользователи.
     *
     * @return array
     */
    public function getAll()
    {
        $db = new Database;
        $query = $db->getDb()->prepare('SELECT * FROM `user`');
        $query->execute();

        $users = [];
        foreach ($query->fetchAll() as $_user) {
            $users[] = $this->factory->create(
                $_user['id'],
                $_user['username'],
                $this->userRoleRepository->getById($_user['role_id'])
            );
        }

        return $users;
    }

    /**
     * Добавление пользователя.
     *
     * @param string $username
     * @param int $roleId
     */
    public function add(string $username, int $roleId)
    {
        $db = new Database;
        $query = $db->getDb()->prepare('INSERT INTO `user`(`username`, `role_id`) VALUES (?, ?)');
        $query->execute([$username, $roleId]);
    }
}