<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class HotelsUpdateV2 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasColumn('007_153_service', 'icon_153'))
		{
			Schema::table('007_153_service', function (Blueprint $table) {
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