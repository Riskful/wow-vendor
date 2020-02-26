<?php

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
    private $rolename;

    /**
     * UserRole constructor.
     * @param int $id
     * @param string $rolename
     */
    public function __construct(int $id, string $rolename)
    {
        $this->id = $id;
        $this->rolename = $rolename;
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
    public function getRolename(): string
    {
        return $this->rolename;
    }
}