<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HotelsCreateTableHotelsProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(Schema::hasTable('012_111_product') && ! Schema::hasTable('007_177_hotels_products'))
		{
			Schema::create('007_177_hotels_products', function (Blueprint $table) {
				$table->engine = 'InnoDB';
				
				$table->integer('hotel_id_177')->unsigned();
				$table->integer('product_id_177')->unsigned();
				$table->string('lang_id_177', 2);
				$table->decimal('hotel_price_177', 10, 2);
				$table->text('description_177');
				
				$table->foreign('hotel_id_177', 'fk01_007_177_hotels_products')
					->references('id_170')
					->on('007_170_hotel')
					->onDelete('cascade')
					->onUpdate('cascade');
				$table->foreign('product_id_177', 'fk02_007_177_hotels_products')
					->references('id_111')
					->on('012_111_product')
					->onDelete('cascade')
					->onUpdate('cascade');
				$table->foreign('lang_id_177', 'fk03_007_177_hotels_products')
					->references('id_001')
					->on('001_001_lang')
					->onDelete('restrict')
					->onUpdate('cascade');

				$table->primary(['hotel_id_177', 'product_id_177', 'lang_id_177'], 'pk01_007_177_hotels_products');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if(Schema::hasTable('007_177_hotels_products'))
		{
			Schema::drop('007_177_hotels_products');
		}
	}
}