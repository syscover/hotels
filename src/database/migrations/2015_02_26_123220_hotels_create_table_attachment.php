<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableAttachment extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('007_156_attachment', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id_156')->unsigned();
            $table->string('lang_156', 2);
            $table->integer('hotel_156')->unsigned()->nullable();
            $table->integer('family_156')->unsigned()->nullable();
            $table->integer('library_156')->unsigned()->nullable();         // original element library
            $table->string('library_file_name_156', 1020)->nullable();
            $table->integer('sorting_156')->unsigned()->nullable();
            $table->string('name_156', 255)->nullable();
            $table->string('file_name_156', 1020)->nullable();
            $table->string('mime_156', 255)->nullable();
            $table->integer('size_156')->unsigned()->nullable();
            $table->tinyInteger('type_156')->unsigned();                    // 1 = image, 2 = file, 3 = video
            $table->string('type_text_156', 50);
            $table->smallInteger('width_156')->unsigned()->nullable();
            $table->smallInteger('height_156')->unsigned()->nullable();

            $table->text('data_lang_156')->nullable();
            $table->text('data_156')->nullable();

            $table->foreign('lang_156')->references('id_001')->on('001_001_lang')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('hotel_156')->references('id_170')->on('007_170_hotel')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('family_156')->references('id_155')->on('007_155_attachment_family')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('library_156')->references('id_154')->on('007_154_library')
                ->onDelete('set null')->onUpdate('cascade');

            $table->primary(['id_156', 'lang_156']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('007_156_attachment');
    }
}
