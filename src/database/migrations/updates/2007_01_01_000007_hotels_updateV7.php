<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class HotelsUpdateV7 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasColumn('007_177_hotels_products', 'hotel_price_177'))
		{
			Schema::table('007_177_hotels_products', function (Blueprint $table) {
				$table->dropColumn('hotel_price_177');
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