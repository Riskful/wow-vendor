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
     * @var int Идентификатор роли.
     */
    private $roleId;

    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param int $roleId
     */
    public function __construct(int $id, string $username, int $roleId)
    {
        $this->id = $id;
        $this->username = $username;
        $this->roleId = $roleId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }
}