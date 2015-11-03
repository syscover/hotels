<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_176_hotels_services', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('hotel_176')->unsigned();
            $table->integer('service_176')->unsigned();

            $table->primary(['hotel_176', 'service_176']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_176_hotels_services');
	}
}