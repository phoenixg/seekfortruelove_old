<?php

class Create_Static_Companytypes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_companytypes', function($table){
			$table->increments('id');
			$table->string('type', 128);
			$table->timestamps();
		});

		DB::table('static_companytypes')->insert(array(
			'type' => '外资',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '合资',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '国企',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '民营',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '政府机关',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '事业单位',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '非营利机构',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_companytypes')->insert(array(
			'type' => '其他',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('static_companytypes');
	}

}