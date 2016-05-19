<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intro_text');
            $table->string('article_text');
            $table->dateTime('publish_date');
            $table->string('url');
            $table->integer('author_id')->unsigned();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('articles_tags', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('tag_id')->references('id')->on('tags');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles_tags', function (Blueprint $table) {
            $table->dropForeign('articles_tags_article_id_foreign');
            $table->dropForeign('articles_tags_tag_id_foreign');
            $table->drop('articles_tags');
        });
        Schema::drop('tags');
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('articles_author_id_foreign');
            $table->drop('articles');
        });
    }
}
