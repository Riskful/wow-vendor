<?php

namespace App\Migrations;

use App\Database;

/**
 * Class UserMigration
 * @package App\Migrations
 *
 * @author A. Suvorkin
 */
class UserMigration implements iMigration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $database = new Database;
        $query = $database->getDb()->query('CREATE TABLE IF NOT EXISTS `user` (
            id INT AUTO_INCREMENT PRIMARY KEY ,
            username VARCHAR (255),
            role_id INT NOT NULL,
            FOREIGN KEY (role_id)
                REFERENCES user_role(id)
                ON UPDATE RESTRICT ON DELETE CASCADE
        ) CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=INNODB;');
        $query->execute();
    }

    /**
     * {@inheritDoc}
     */
    public function down()
    {
        $database = new Database;
        $query = $database->getDb()->query('DROP TABLE IF EXISTS `user`');
        $query->execute();
    }
}