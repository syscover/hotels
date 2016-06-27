<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTablePublication extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_174_publication', function(Blueprint $table) {
            $table->engine = 'InnoDB';
			
            $table->increments('id_174')->unsigned();
            $table->string('name_174');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_174_publication');
	}
}