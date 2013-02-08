<?php

class Create_Static_Academics_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_academics', function($table){
			$table->increments('id');
			$table->string('academic', 128);
			$table->timestamps();
		});

		DB::table('static_academics')->insert(array(
			'academic' => '小学',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '初中',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '中专',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '高中',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '大专',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '本科',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '研究生',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '博士',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_academics')->insert(array(
			'academic' => '博士后',
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
		Schema::drop('static_academics');
	}

}