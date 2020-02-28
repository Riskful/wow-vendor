<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\UserRoleRepository;

/**
 * Class UserController
 *
 * @author A. Suvorkin
 */
class UserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserRoleRepository
     */
    private $userRoleRepository;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->userRoleRepository = new UserRoleRepository;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->userRoleRepository->getAll();
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->userRepository->getAll();
    }

    /**
     * @param $username
     * @param $roleId
     */
    public function addUser(string $username, int $roleId)
    {
        $this->userRepository->add($username, $roleId);
    }
}