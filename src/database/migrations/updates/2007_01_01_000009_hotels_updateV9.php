<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Syscover\Pulsar\Libraries\DBLibrary;

class HotelsUpdateV9 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(Schema::hasColumn('007_170_hotel', 'booking_url_170'))
        {
            Schema::table('007_170_hotel', function (Blueprint $table) {
                $table->renameColumn('booking_url_170', 'booking_data_170');
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}

}