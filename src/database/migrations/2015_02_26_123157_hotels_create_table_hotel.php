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

            $table->string('name_170', 100);
            $table->string('web_170', 100)->nullable();

            // geolocation data
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
            $table->string('n_events_rooms_170', 50)->nullable();
            $table->string('n_places_events_rooms_170', 50)->nullable();

            $table->string('latitude_170', 50)->nullable();
            $table->string('longitude_170', 50)->nullable();

            // billing data
            $table->string('billing_name_170', 100);
            $table->string('billing_surname_170', 100);
            $table->string('billing_company_name_170', 100);
            $table->string('billing_tin_170', 50)->nullable();
            $table->string('billing_country_170', 2);
            $table->string('billing_territorial_area_1_170', 6)->nullable();
            $table->string('billing_territorial_area_2_170', 10)->nullable();
            $table->string('billing_territorial_area_3_170', 10)->nullable();
            $table->string('billing_cp_170', 10)->nullable();
            $table->string('billing_locality_170', 100)->nullable();
            $table->string('billing_address_170', 150)->nullable();
            $table->string('billing_phone_170', 50)->nullable();
            $table->string('billing_email_170', 100)->nullable();
            $table->string('billing_iban_170', 50);
            $table->string('billing_swift_170', 20);

            // restaurant
            $table->string('restaurant_name_170', 100);
            $table->boolean('restaurant_terrace_170');
            $table->tinyInteger('restaurant_type_170'); // 1 open public, 2 open with booking, 3 only guest, 4 only guest with booking

            $table->text('data_170')->nullable();

            $table->foreign('country_170')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_1_170')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_2_170')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('territorial_area_3_170')->references('id_005')->on('001_005_territorial_area_3')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('billing_country_170')->references('id_002')->on('001_002_country')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('billing_territorial_area_1_170')->references('id_003')->on('001_003_territorial_area_1')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('billing_territorial_area_2_170')->references('id_004')->on('001_004_territorial_area_2')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('billing_territorial_area_3_170')->references('id_005')->on('001_005_territorial_area_3')
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