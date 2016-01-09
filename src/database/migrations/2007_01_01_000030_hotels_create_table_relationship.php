<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableRelationship extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('007_152_relationship', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_152')->unsigned();
            $table->string('lang_152',2);
            $table->string('name_152', 50);

            $table->string('data_lang_152')->nullable();
            $table->text('data_152')->nullable();

            $table->primary(['id_152', 'lang_152']);
            $table->foreign('lang_152', 'fk01_007_152_relationship')->references('id_001')->on('001_001_lang')
                ->onDelete('restrict')->onUpdate('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('007_152_relationship');
	}
}