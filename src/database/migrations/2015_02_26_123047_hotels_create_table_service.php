<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_153_service', function($table) {
            $table->engine = 'InnoDB';
            $table->integer('id_153')->unsigned();
            $table->string('lang_153',2);
            $table->string('name_153', 50);
            $table->text('data_153');

            $table->primary(['id_153', 'lang_153']);
            $table->foreign('lang_153')->references('id_001')->on('001_001_lang')
                ->onDelete('restrict')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_153_service');
	}
}