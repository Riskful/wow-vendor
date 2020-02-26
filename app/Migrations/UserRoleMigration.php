<?php

namespace App\Migrations;

use App\Database;

/**
 * Class UserRoleMigration
 * @package App\Migrations
 *
 * @author A. Suvorkin
 */
class UserRoleMigration implements iMigration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $database = new Database;
        $query = $database->getDb()->query(
            'CREATE TABLE IF NOT EXISTS `user_role` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                rolename VARCHAR (255) NOT NULL
            ) CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=INNODB;'
        );
        $query->execute();
    }

    /**
     * {@inheritDoc}
     */
    public function down()
    {
        $database = new Database;
        $query = $database->getDb()->query('DROP TABLE IF EXISTS `user_role`');
        $query->execute();
    }
}