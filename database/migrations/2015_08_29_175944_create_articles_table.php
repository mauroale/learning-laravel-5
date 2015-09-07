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
            $table->integer('user_id')->unsigned();
            $table->string('title');            
            $table->text('body');
            $table->timestamp('published_at');
            $table->timestamps();            
        

        // Criando uma FK com o usuario que escreveu o artigo

        $table->foreign('user_id')
              ->references('id')
              ->on('users')  // ate aqui cria a FK user_id com users.id
              ->onDelete('cascade'); //  quando deletar o usuario deleta seus artigos também





        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
