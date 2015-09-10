<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableDecoration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_151_decoration', function($table) {
            $table->engine = 'InnoDB';
            $table->integer('id_151')->unsigned();
            $table->string('lang_151',2);
            $table->string('name_151', 50);

            $table->string('data_lang_151',255)->nullable();
            $table->text('data_151')->nullable();

            $table->primary(['id_151', 'lang_151']);
            $table->foreign('lang_151')->references('id_001')->on('001_001_lang')
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
        Schema::drop('007_151_decoration');
	}

}
