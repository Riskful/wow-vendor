<?php
namespace App\Migrations;


interface iMigration
{
    /**
     * Выполнение миграции.
     */
    public function up();

    /**
     * Откат миграции.
     */
    public function down();
}