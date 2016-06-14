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

            $table->primary(['hotel_176', 'service_176'], 'pk01_007_176_hotels_services');

			$table->foreign('hotel_176', 'fk01_007_176_hotels_services')->references('id_170')->on('007_170_hotel')
				->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('service_176', 'fk02_007_176_hotels_services')->references('id_153')->on('007_153_service')
				->onDelete('cascade')->onUpdate('cascade');
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