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
        Schema::create('007_171_hotel_lang', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('id_171')->unsigned();
            $table->string('lang_id_171', 2);

            // cuisine
            $table->string('cuisine_171')->nullable();
            $table->string('special_dish_171')->nullable();

            // geolocation data
            $table->text('indications_171')->nullable();
            $table->text('interest_points_171')->nullable();

            // features
            $table->string('environment_description_171')->nullable();
            $table->string('construction_171')->nullable();
            $table->text('activities_171')->nullable();
            $table->string('description_title_171')->nullable();
            $table->text('description_171')->nullable();
            
            $table->foreign('id_171', 'fk01_007_171_hotel_lang')
                ->references('id_170')
                ->on('007_170_hotel')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('lang_id_171', 'fk02_007_171_hotel_lang')
                ->references('id_001')
                ->on('001_001_lang')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->primary(['id_171', 'lang_id_171'], 'pk01_007_171_hotel_lang');
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