<?php

use Illuminate\Database\Migrations\Migration;


class HotelsUpdateV1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('007_170_hotel', 'slug_170'))
		{
			Schema::table('007_170_hotel', function ($table) {
				$table->string('slug_170', 255)->nullable()->after('name_170');

				$table->index('slug_170');
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