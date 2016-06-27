<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Syscover\Pulsar\Libraries\DBLibrary;

class HotelsUpdateV8 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// change lang_150
		DBLibrary::renameColumnWithForeignKey('007_150_environment', 'lang_150', 'lang_id_150', 'VARCHAR', 2, false, false, 'fk01_007_150_environment', '001_001_lang', 'id_001');

		// change lang_151
		DBLibrary::renameColumnWithForeignKey('007_151_decoration', 'lang_151', 'lang_id_151', 'VARCHAR', 2, false, false, 'fk01_007_151_decoration', '001_001_lang', 'id_001');

		// change lang_152
		DBLibrary::renameColumnWithForeignKey('007_152_relationship', 'lang_152', 'lang_id_152', 'VARCHAR', 2, false, false, 'fk01_007_152_relationship', '001_001_lang', 'id_001');

		// change lang_153
		DBLibrary::renameColumnWithForeignKey('007_153_service', 'lang_153', 'lang_id_153', 'VARCHAR', 2, false, false, 'fk01_007_153_service', '001_001_lang', 'id_001');

		
		// change country_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'country_170', 'country_id_170', 'VARCHAR', 2, false, false, 'fk01_007_170_hotel', '001_002_country', 'id_002');
		// change territorial_area_1_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'territorial_area_1_170', 'territorial_area_1_id_170', 'VARCHAR', 6, false, true, 'fk02_007_170_hotel', '001_003_territorial_area_1', 'id_003');
		// change territorial_area_2_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'territorial_area_2_170', 'territorial_area_2_id_170', 'VARCHAR', 10, false, true, 'fk03_007_170_hotel', '001_004_territorial_area_2', 'id_004');
		// change territorial_area_3_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'territorial_area_3_170', 'territorial_area_3_id_170', 'VARCHAR', 10, false, true, 'fk04_007_170_hotel', '001_005_territorial_area_3', 'id_005');
		// change billing_country_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'billing_country_170', 'billing_country_id_170', 'VARCHAR', 2, false, true, 'fk05_007_170_hotel', '001_002_country', 'id_002');
		// change billing_territorial_area_1_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'billing_territorial_area_1_170', 'billing_territorial_area_1_id_170', 'VARCHAR', 6, false, true, 'fk06_007_170_hotel', '001_003_territorial_area_1', 'id_003');
		// change billing_territorial_area_2_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'billing_territorial_area_2_170', 'billing_territorial_area_2_id_170', 'VARCHAR', 10, false, true, 'fk07_007_170_hotel', '001_004_territorial_area_2', 'id_004');
		// change billing_territorial_area_3_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'billing_territorial_area_3_170', 'billing_territorial_area_3_id_170', 'VARCHAR', 10, false, true, 'fk08_007_170_hotel', '001_005_territorial_area_3', 'id_005');
		// change custom_field_group_170
		DBLibrary::renameColumnWithForeignKey('007_170_hotel', 'custom_field_group_170', 'field_group_id_170', 'INT', 10, true, true, 'fk09_007_170_hotel', '001_025_field_group', 'id_025');

		// change lang_171
		DBLibrary::renameColumnWithForeignKey('007_171_hotel_lang', 'lang_171', 'lang_id_171', 'VARCHAR', 2, false, false, 'fk02_007_171_hotel_lang', '001_001_lang', 'id_001');

		// change hotel_176
		DBLibrary::renameColumnWithForeignKey('007_176_hotels_services', 'hotel_176', 'hotel_id_176', 'INT', 10, true, false, 'fk01_007_176_hotels_services', '007_170_hotel', 'id_170', 'cascade', 'cascade');
		// change service_176
		DBLibrary::renameColumnWithForeignKey('007_176_hotels_services', 'service_176', 'service_id_176', 'INT', 10, true, false, 'fk02_007_176_hotels_services', '007_153_service', 'id_153', 'cascade', 'cascade');

		// change hotel_177
		DBLibrary::renameColumnWithForeignKey('007_177_hotels_products', 'hotel_177', 'hotel_id_177', 'INT', 10, true, false, 'fk01_007_177_hotels_products', '007_170_hotel', 'id_170', 'cascade', 'cascade');
		// change product_177
		DBLibrary::renameColumnWithForeignKey('007_177_hotels_products', 'product_177', 'product_id_177', 'INT', 10, true, false, 'fk02_007_177_hotels_products', '012_111_product', 'id_111', 'cascade', 'cascade');
		// change lang_177
		DBLibrary::renameColumnWithForeignKey('007_177_hotels_products', 'lang_177', 'lang_id_177', 'VARCHAR', 2, false, false, 'fk03_007_177_hotels_products', '001_001_lang', 'id_001');
		
		// rename columns
		// parent_110
		DBLibrary::renameColumn('007_170_hotel', 'restaurant_type_170', 'restaurant_type_id_170', 'TINYINT', 3, true, true);

		// hotel_175
		DBLibrary::renameColumn('007_175_hotels_publications', 'hotel_175', 'hotel_id_175', 'INT', 10, true, false);
		// publication_175
		DBLibrary::renameColumn('007_175_hotels_publications', 'publication_175', 'publication_id_175', 'INT', 10, true, false);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}

}