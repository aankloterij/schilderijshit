<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paintings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('naam', 256);
            $table->string('artist', 256);
            $table->text('description');

            $table->string('catagories', 256);
            $table->string('image_location', 256);
            $table->integer('retail');

            $table->integer('width');
            $table->integer('height');

            $table->integer('year');
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
        Schema::drop('paintings');
    }
}
