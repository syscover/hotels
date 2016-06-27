<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class HotelsUpdateV6 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasColumn('007_177_hotels_products', 'hotel_price_177'))
		{
			Schema::table('007_177_hotels_products', function (Blueprint $table) {
				$table->decimal('hotel_price_177', 10, 2)->after('lang_id_177');
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