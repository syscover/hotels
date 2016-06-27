<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableService extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_153_service', function(Blueprint $table) {
            $table->engine = 'InnoDB';
			
            $table->integer('id_153')->unsigned();
            $table->string('lang_id_153', 2);
            $table->string('name_153');
			$table->string('slug_153');
            $table->string('icon_153')->nullable();
            $table->string('data_lang_153')->nullable();
            $table->text('data_153')->nullable();
			
            $table->foreign('lang_id_153', 'fk01_007_153_service')
				->references('id_001')
				->on('001_001_lang')
                ->onDelete('restrict')
				->onUpdate('cascade');

			$table->primary(['id_153', 'lang_id_153'], 'pk01_007_153_service');
			$table->unique(['lang_id_153','slug_153'], 'uk01_007_153_service');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_153_service');
	}
}