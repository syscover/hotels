<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableEnvironment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_150_environment', function($table) {
            $table->engine = 'InnoDB';
            $table->integer('id_150')->unsigned();
            $table->string('lang_150',2);
            $table->string('name_150', 50);

            $table->string('data_lang_150',255)->nullable();
            $table->text('data_150')->nullable();

            $table->primary(['id_150', 'lang_150']);
            $table->foreign('lang_150', 'fk01_007_150_environment')->references('id_001')->on('001_001_lang')
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
        Schema::drop('007_150_environment');
	}

}
