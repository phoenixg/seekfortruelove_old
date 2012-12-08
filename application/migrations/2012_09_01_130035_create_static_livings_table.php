<?php

class Create_Static_Livings_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_livings', function($table){
			$table->increments('id');
			$table->string('status', 128);
			$table->timestamps();
		});

		DB::table('static_livings')->insert(array(
			'status' => '住自己家',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_livings')->insert(array(
			'status' => '租房',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_livings')->insert(array(
			'status' => '已购',
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
		Schema::drop('static_livings');
	}

}