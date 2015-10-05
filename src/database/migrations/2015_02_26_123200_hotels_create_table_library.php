<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableLibrary extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('007_154_library', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_154')->unsigned();
            $table->string('file_name_154', 1020)->nullable();
            $table->string('mime_154', 255);
            $table->integer('size_154')->unsigned();
            $table->tinyInteger('type_154')->unsigned();                    // 1 = image, 2 = file, 3 = video
            $table->string('type_text_154', 50);
            $table->smallInteger('width_154')->unsigned()->nullable();
            $table->smallInteger('height_154')->unsigned()->nullable();
            $table->text('data_154')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('007_154_library');
    }
}
