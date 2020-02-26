<?php

namespace App;

use PDO;

/**
 * Class Database
 *
 * @author A. Suvorkin
 */
class Database
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->db = new PDO(
            'mysql:host=database;dbname=wowvendor',
            'wowvendor',
            'wowvendor'
        );
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }
}