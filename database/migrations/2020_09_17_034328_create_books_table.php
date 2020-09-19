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
            $table->increments('id',11);
            $table->string('code',50);
            $table->string('name',160);
            $table->string('author',50);
            $table->string('description');
            $table->date('release_date');
            $table->integer('category_id');
            $table->integer('publisher_id');
            $table->integer('shelve_id');
            $table->enum('is_avaliable',['yes','no']);
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
