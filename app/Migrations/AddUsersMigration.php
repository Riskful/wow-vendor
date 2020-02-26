<?php

namespace App\Migrations;

use App\Database;

/**
 * Class AddUsersMigration
 * @package App\Migrations
 *
 * @author A. Suvorkin
 */
class AddUsersMigration implements iMigration
{
    public function up()
    {
        $database = new Database;
        $query = $database->getDb()->query('SELECT * FROM `user_role`');
        $roles = $query->fetchAll();

        $users = [
            [
                'username' => 'John',
                'roleId' => $roles[rand(0, 2)]['id']
            ],
            [
                'username' => 'Bill',
                'roleId' => $roles[rand(0, 2)]['id']
            ],
            [
                'username' => 'Thompson',
                'roleId' => $roles[rand(0, 2)]['id']
            ],
            [
                'username' => 'Warren',
                'roleId' => $roles[rand(0, 2)]['id']
            ],
            [
                'username' => 'Holmes',
                'roleId' => $roles[rand(0, 2)]['id']
            ]
        ];

        $query = $database->getDb()->prepare('INSERT INTO `user` (`username`, `role_id`) VALUES (?, ?)');

        foreach ($users as $user) {
            $query->execute([$user['username'], $user['roleId']]);
        }
    }

    public function down()
    {
        // TODO: Implement down() method.
    }
}