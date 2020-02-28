<?php

namespace App\Model;

/**
 * Class UserRole
 *
 * @author A. Suvorkin
 */
class UserRole
{
    /**
     * @var int Идентификатор.
     */
    private $id;

    /**
     * @var string Название роли.
     */
    private $roleName;

    /**
     * UserRole constructor.
     * @param int $id
     * @param string $rolename
     */
    public function __construct(int $id, string $rolename)
    {
        $this->id = $id;
        $this->roleName = $rolename;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->roleName;
    }
}