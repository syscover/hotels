<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsPublications extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_175_hotels_publications', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('hotel_175')->unsigned();
            $table->integer('publication_175')->unsigned();

            $table->primary(['hotel_175', 'publication_175'], 'pk01_007_175_hotels_publications');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_175_hotels_publications');
	}
}