<?php
#!/bin/env php

require './vendor/autoload.php';

$migrations = [
    \App\Migrations\UserRoleMigration::class,
    \App\Migrations\UserMigration::class,
    \App\Migrations\AddRolesMigration::class,
    \App\Migrations\AddUsersMigration::class
];

// Migration up
foreach ($migrations as $migration) {
    /** @var \App\Migrations\iMigration $current */
    $current = new $migration;

    if(in_array('migrate:up', $argv)) {
        $current->up();
        printf("Up migration: %s\n", $migration);
    }
}

// Migration down
foreach (array_reverse($migrations) as $migration) {
    /** @var \App\Migrations\iMigration $current */
    $current = new $migration;

    if(in_array('migrate:down', $argv)) {
        $current->down();
        printf("Down migration: %s\n", $migration);
    }
}