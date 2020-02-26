<?php

namespace App\Migrations;

use App\Database;

/**
 * Class AddRolesMigration
 * @package App\Migrations
 *
 * @author A. Suvorkin
 */
class AddRolesMigration implements iMigration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $database = new Database;
        $query = $database->getDb()->prepare("INSERT INTO `user_role` (`rolename`) VALUES (?)");

        $roles = ['admin', 'manager', 'user'];
        foreach ($roles as $role) {
            $query->execute([$role]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function down()
    {
        // TODO: Implement down() method.
    }
}