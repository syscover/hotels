<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableAttachmentFamily extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('007_155_attachment_family', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id_155')->unsigned();
            $table->string('name_155', 100);
            $table->smallInteger('width_155')->unsigned()->nullable();
            $table->smallInteger('height_155')->unsigned()->nullable();
            $table->text('data_155')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('007_155_attachment_family');
    }
}
