<?php

use Illuminate\Database\Migrations\Migration;


class HotelsUpdateV2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('007_153_service', 'ico_153'))
		{
			Schema::table('007_153_service', function ($table) {
				$table->string('icon_153', 50)->nullable()->after('name_153');
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