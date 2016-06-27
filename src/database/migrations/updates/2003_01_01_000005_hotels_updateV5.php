<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class HotelsUpdateV5 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(! Schema::hasColumn('007_170_hotel', 'field_group_id_170'))
		{
			Schema::table('007_170_hotel', function (Blueprint $table) {
				$table->integer('field_group_id_170')->unsigned()->nullable()->after('id_170');
				$table->foreign('field_group_id_170', 'fk09_007_170_hotel')
					->references('id_025')
					->on('001_025_field_group')
					->onDelete('restrict')
					->onUpdate('cascade');
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