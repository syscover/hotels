<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableImage extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('007_172_image', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id_172')->unsigned();
            $table->string('lang_172', 2);
            $table->integer('hotel_172')->unsigned()->nullable();
            $table->string('name_172', 255)->nullable();
            $table->integer('sorting_172')->unsigned()->nullable();

            $table->integer('family_357')->unsigned()->nullable();

            $table->string('file_name_172', 1020)->nullable();
            $table->string('mime_172', 255)->nullable();
            $table->integer('size_172')->unsigned()->nullable();
            $table->smallInteger('width_172')->unsigned()->nullable();
            $table->smallInteger('height_172')->unsigned()->nullable();
            $table->text('data_172')->nullable();

            $table->foreign('lang_172')->references('id_001')->on('001_001_lang')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('hotel_172')->references('id_170')->on('007_170_hotel')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_172', 'lang_172']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('007_172_image');
    }
}
