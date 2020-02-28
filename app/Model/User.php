<?php

namespace App\Model;

/**
 * Class User
 *
 * @author A. Suvorkin
 */
class User
{
    /**
     * @var int Идентификатор.
     */
    private $id;

    /**
     * @var string Имя пользователя.
     */
    private $username;

    /**
     * @var UserRole Роль.
     */
    private $role;

    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param UserRole $role
     */
    public function __construct(int $id, string $username, UserRole $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return UserRole
     */
    public function getRole(): UserRole
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}