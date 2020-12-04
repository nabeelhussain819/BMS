<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');

            $table->unsignedBigInteger('author_id');

            $table->foreign('author_id')->references('id')->on('authors')->cascadeOnDelete();

            $table->text('description');

            $table->float('price', 10);

            $table->unsignedBigInteger('genre');

            $table->foreign('genre')->references('id')->on('genres')->cascadeOnDelete();

            $table->unsignedBigInteger('category');

            $table->foreign('category')->references('id')->on('categories')->cascadeOnDelete();

            $table->unsignedBigInteger('language');

            $table->foreign('language')->references('id')->on('languages')->cascadeOnDelete();

            $table->integer('year');
            //here we use foreign key 
            $table->unsignedBigInteger('created_By');

            $table->foreign('created_By')->references('id')->on('users');
            //same here 
            $table->unsignedBigInteger('updated_By');

            $table->foreign('updated_By')->references('id')->on('users');

            $table->boolean('active');

            $table->string('ISBN');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
