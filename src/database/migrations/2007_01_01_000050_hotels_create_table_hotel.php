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
        Schema::create('007_170_hotel', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id_170')->unsigned();
            $table->integer('field_group_id_170')->unsigned()->nullable();

            // hotel description
            $table->string('name_170');
            $table->string('slug_170')->nullable();
            $table->string('web_170')->nullable();
            $table->string('web_url_170')->nullable();
            $table->string('contact_170')->nullable();
            $table->string('email_170')->nullable();
            $table->string('phone_170')->nullable();
            $table->string('mobile_170')->nullable();
            $table->string('fax_170')->nullable();
            $table->integer('environment_170')->unsigned()->nullable();
            $table->integer('decoration_170')->unsigned()->nullable();
            $table->integer('relationship_170')->unsigned()->nullable();
            $table->string('n_rooms_170')->nullable();
            $table->string('n_places_170')->nullable();
            $table->string('n_events_rooms_170')->nullable();
            $table->string('n_events_rooms_places_170')->nullable();

            // access
            $table->string('user_170');
            $table->string('password_170');
            $table->boolean('active_170');

            // geolocation data
            $table->string('country_id_170', 2);
            $table->string('territorial_area_1_id_170', 6)->nullable();
            $table->string('territorial_area_2_id_170', 10)->nullable();
            $table->string('territorial_area_3_id_170', 10)->nullable();
            $table->string('cp_170')->nullable();
            $table->string('locality_170')->nullable();
            $table->string('address_170')->nullable();
            $table->string('latitude_170')->nullable();
            $table->string('longitude_170')->nullable();

            // booking data
            $table->string('booking_url_170')->nullable();
            $table->string('booking_email_170')->nullable();

            // restaurant
            $table->boolean('country_chef_restaurant_170')->nullable();
            $table->string('country_chef_url_170')->nullable();
            $table->string('restaurant_name_170')->nullable();
            
            // 0 open public
            // 1 open by reservation
            // 2 only guest
            // 3 only guest with reservation
            $table->tinyInteger('restaurant_type_id_170')->unsigned()->nullable(); 
            $table->boolean('restaurant_terrace_170')->nullable();

            // billing data
            $table->string('billing_name_170')->nullable();
            $table->string('billing_surname_170')->nullable();
            $table->string('billing_company_name_170')->nullable();
            $table->string('billing_tin_170')->nullable();
            $table->string('billing_country_id_170', 2)->nullable();
            $table->string('billing_territorial_area_1_id_170', 6)->nullable();
            $table->string('billing_territorial_area_2_id_170', 10)->nullable();
            $table->string('billing_territorial_area_3_id_170', 10)->nullable();
            $table->string('billing_cp_170')->nullable();
            $table->string('billing_locality_170')->nullable();
            $table->string('billing_address_170')->nullable();
            $table->string('billing_phone_170')->nullable();
            $table->string('billing_email_170')->nullable();

            // IBAN and SWIFT
            $table->string('billing_iban_country_170', 2)->nullable();
            $table->string('billing_iban_check_digits_170', 2)->nullable();
            $table->string('billing_iban_basic_bank_account_number_170', 30)->nullable();
            $table->string('billing_bic_170', 11)->nullable();
            $table->string('data_lang_170')->nullable();
            $table->text('data_170')->nullable();
            
            $table->foreign('country_id_170', 'fk01_007_170_hotel')
                ->references('id_002')
                ->on('001_002_country')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('territorial_area_1_id_170', 'fk02_007_170_hotel')
                ->references('id_003')
                ->on('001_003_territorial_area_1')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('territorial_area_2_id_170', 'fk03_007_170_hotel')
                ->references('id_004')
                ->on('001_004_territorial_area_2')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('territorial_area_3_id_170', 'fk04_007_170_hotel')
                ->references('id_005')
                ->on('001_005_territorial_area_3')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('billing_country_id_170', 'fk05_007_170_hotel')
                ->references('id_002')
                ->on('001_002_country')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('billing_territorial_area_1_id_170', 'fk06_007_170_hotel')
                ->references('id_003')
                ->on('001_003_territorial_area_1')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('billing_territorial_area_2_id_170', 'fk07_007_170_hotel')
                ->references('id_004')
                ->on('001_004_territorial_area_2')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('billing_territorial_area_3_id_170', 'fk08_007_170_hotel')
                ->references('id_005')
                ->on('001_005_territorial_area_3')
                ->onDelete('restrict')
                ->onUpdate('cascade');
            $table->foreign('field_group_id_170', 'fk09_007_170_hotel')
                ->references('id_025')
                ->on('001_025_field_group')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->index('slug_170', 'ix01_007_170_hotel');
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