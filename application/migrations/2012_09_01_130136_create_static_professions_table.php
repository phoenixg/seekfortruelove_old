<?php

class Create_Static_Professions_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_professions', function($table){
			$table->increments('id');
			$table->string('profession', 128);
			$table->timestamps();
		});

		DB::table('static_professions')->insert(array(
			'profession' => '技术',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '设计',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '销售',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '管理',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '财务/会计',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '行政',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '后勤',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '客服',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '教师',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '市场',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '法务',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '质控',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '技工',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '金融/证券',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '翻译',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '警察',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '公务员',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '创业',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '自由职业',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_professions')->insert(array(
			'profession' => '其他',
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
		Schema::drop('static_professions');
	}

}