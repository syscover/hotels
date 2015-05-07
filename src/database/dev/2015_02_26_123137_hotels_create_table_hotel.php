<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotel extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_170_hotel', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id_170')->unsigned();

            $table->string('lang_150',2); // ??

            $table->string('name_170', 100);
            $table->string('web_170', 100)->nullable();

            
            $table->string('environment_description_170', 255);

            // datos geolocalizacion
            $table->string('country_170', 2);
            $table->string('territorial_area_1_170', 6)->nullable();
            $table->string('territorial_area_2_170', 10)->nullable();
            $table->string('territorial_area_3_170', 10)->nullable();
            $table->string('cp_170', 10)->nullable();
            $table->string('locality_170', 100)->nullable();
            $table->string('address_170', 150)->nullable();



            $table->string('contact_170', 100)->nullable();
            $table->string('booking_email_170', 50)->nullable();
            $table->string('email_170', 50)->nullable();


            $table->string('phone_170', 50)->nullable();
            $table->string('mobile_170', 50)->nullable();
            $table->string('fax_170', 50)->nullable();


            $table->string('n_rooms_170', 50)->nullable();
            $table->string('n_places_170', 50)->nullable();


            $table->text('data_170')->nullable();


            $table->foreign('country_170')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_170')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_170')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_170')->references('id_005')->on('001_005_territorial_area_3')
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
        Schema::drop('007_170_hotel');
	}

}
