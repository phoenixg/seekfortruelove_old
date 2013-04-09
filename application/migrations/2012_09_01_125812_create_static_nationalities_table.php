<?php

class Create_Static_Nationalities_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('static_nationalities', function($table){
			$table->increments('id');
			$table->string('nationality', 128);
			$table->timestamps();
		});

		DB::table('static_nationalities')->insert(array(
			'nationality' => '上海（沪、申）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));
		
		DB::table('static_nationalities')->insert(array(
			'nationality' => '北京（京）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '天津（津）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '重庆（渝）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '河北（冀）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '山西（晋）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '内蒙古（蒙）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '福建（闽）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '吉林（吉）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '黑龙江（黑）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '江苏（苏）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '浙江（浙）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '安徽（皖）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '辽宁（辽）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '江西（赣）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '山东（鲁）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '河南（豫）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '湖北（鄂）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '湖南（湘）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '广东（粤）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '广西（桂）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '海南（琼）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '四川（川、蜀）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '贵州（黔、贵）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '云南（滇、云）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '西藏（藏）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '陕西（陕、秦）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '甘肃（甘、陇）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '宁夏（宁）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '青海（青）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '新疆（新）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '香港（港）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '澳门（澳）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '台湾（台）',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_nationalities')->insert(array(
			'nationality' => '国外',
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
		Schema::drop('static_nationalities');
	}

}