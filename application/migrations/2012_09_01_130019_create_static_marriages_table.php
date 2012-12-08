<?php

class Create_Static_Marriages_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_marriages', function($table){
			$table->increments('id');
			$table->string('status', 128);
			$table->timestamps();
		});

		DB::table('static_marriages')->insert(array(
			'status' => '未婚',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_marriages')->insert(array(
			'status' => '离异',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_marriages')->insert(array(
			'status' => '丧偶',
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
		Schema::drop('static_marriages');
	}

}