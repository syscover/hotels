<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;


class HotelsUpdateV4 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasColumn('007_153_service', 'slug_153'))
		{
			$key = DB::select(DB::raw('SHOW KEYS FROM 007_153_service WHERE Key_name=\'uk01_007_153_service\''));

			if($key == null)
			{
				Schema::table('007_153_service', function (Blueprint $table) {
					$table->unique(['lang_153','slug_153'], 'uk01_007_153_service');
				});
			}
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}

}