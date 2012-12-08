<?php

class Create_Static_Salaries_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_salaries', function($table){
			$table->increments('id');
			$table->string('range', 128);
			$table->timestamps();
		});

		DB::table('static_salaries')->insert(array(
			'range' => '<1,000',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '1,000 - 1,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '2,000 - 2,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '3,000 - 3,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '4,000 - 4,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '5,000 - 5,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '6,000 - 6,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '7,000 - 7,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '8,000 - 8,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '9,000 - 9,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '10,000 - 11,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '12,000 - 14,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '15,000 - 19,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '20,000 - 29,900',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_salaries')->insert(array(
			'range' => '>30,000',
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
		Schema::drop('static_salaries');
	}

}