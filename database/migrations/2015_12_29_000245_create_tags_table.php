<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->timestamps();
        });


        /*
        Schema::create('articles_tag', function (Blueprint $table){
            $table->integer('article_id')->unsigned()->index();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            $table->timestamps();
        });
        */

        Schema::create('articles_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('articles_id', false, true)->length(10)->index();
            $table->integer('tag_id', false, true)->length(10)->index();
            $table->timestamps();

            $table->foreign('articles_id')
            ->references('id')
            ->on('articles')
            ->onDelete('cascade');

            $table->foreign('tag_id')
            ->references('id')
            ->on('tags')
            ->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tags');
        Schema::drop('articles_tag');

    }
}
