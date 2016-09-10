<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDatabaseImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared(file_get_contents('database/seeds/initial_import.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared(
            '
            drop table r_article_category;
            drop table d_article;
            drop table c_category;
            drop table c_status;
            drop table users;
            drop table password_resets;
            '
        );
    }
}
