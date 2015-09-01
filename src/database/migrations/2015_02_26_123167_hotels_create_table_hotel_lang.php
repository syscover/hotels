<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelLang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_171_hotel_lang', function($table) {
            $table->engine = 'InnoDB';

            $table->integer('id_171')->unsigned();
            $table->string('lang_171',2);

            // cuisine
            $table->string('cuisine_171', 255)->nullable();
            $table->string('special_dish_171', 255)->nullable();

            // geolocation data
            $table->text('indications_171')->nullable();
            $table->text('interest_points_171')->nullable();

            // features
            $table->string('environment_description_171', 255)->nullable();
            $table->string('construction_171', 255)->nullable();
            $table->text('activities_171')->nullable();
            $table->string('description_title_171', 100)->nullable();
            $table->text('description_171')->nullable();

            $table->primary(['id_171', 'lang_171']);
            $table->foreign('id_171')->references('id_170')->on('007_170_hotel')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lang_171')->references('id_001')->on('001_001_lang')
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
        Schema::drop('007_171_hotel_lang');
	}

}
