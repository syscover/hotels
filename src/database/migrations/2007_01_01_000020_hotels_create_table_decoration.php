<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableDecoration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_151_decoration', function(Blueprint $table) {
            $table->engine = 'InnoDB';
			
            $table->integer('id_151')->unsigned();
            $table->string('lang_id_151', 2);
            $table->string('name_151');
            $table->string('data_lang_151')->nullable();
            $table->text('data_151')->nullable();
			
            $table->foreign('lang_id_151', 'fk01_007_151_decoration')
				->references('id_001')
				->on('001_001_lang')
                ->onDelete('restrict')
				->onUpdate('cascade');

			$table->primary(['id_151', 'lang_id_151'], 'pk01_007_151_decoration');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_151_decoration');
	}
}