<?php

use Illuminate\Database\Migrations\Migration;


class HotelsUpdateV3 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('007_153_service', 'slug_153'))
		{
			Schema::table('007_153_service', function ($table) {
				$table->string('slug_153')->after('name_153');
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