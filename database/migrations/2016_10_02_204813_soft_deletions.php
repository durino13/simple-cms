<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SoftDeletions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Create deleted_at field in these tables

        $tables = [
            'd_article',
            'users',
            'c_category'
        ];

        foreach ($tables as $tabName) {
            Schema::table($tabName, function ($table) {
                $table->softDeletes();
            });
        }

        // Drop 'trash' column in these tables

        $dropTrashTables = [
            'c_category',
            'd_article'
        ];

        foreach ($dropTrashTables as $tabName) {
            Schema::table($tabName, function ($table) {
                $table->dropColumn('trash');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        $tables = [
            'd_article',
            'users',
            'c_category'
        ];

        foreach ($tables as $tabName) {
            Schema::table($tabName, function ($table) {
                $table->dropColumn('deleted_at');
            });
        }
    }
}
