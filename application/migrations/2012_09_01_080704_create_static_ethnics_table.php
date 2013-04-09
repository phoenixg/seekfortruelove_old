<?php

class Create_Static_Ethnics_Table {


	public function up()
	{
		Schema::create('static_ethnics', function($table){
			$table->increments('id');
			$table->string('name', 128);
			$table->timestamps();
		});

		DB::table('static_ethnics')->insert(array(
			'name' => '汉族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));
		
		DB::table('static_ethnics')->insert(array(
			'name' => '壮族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '满族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '回族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '苗族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '维吾尔族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '土家族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '彝族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '蒙古族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));	
		
		DB::table('static_ethnics')->insert(array(
			'name' => '藏族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '布依族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '侗族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '瑶族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '朝鲜族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '白族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '哈尼族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '哈萨克族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '黎族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '傣族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '畲族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '傈僳族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '仡佬族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '东乡族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '高山族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '拉祜族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));	
		
		DB::table('static_ethnics')->insert(array(
			'name' => '水族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '佤族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '纳西族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '羌族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '土族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '仫佬族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '锡伯族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '柯尔克孜族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '达斡尔族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '景颇族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '毛南族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '撒拉族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '布朗族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '塔吉克族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '阿昌族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '普米族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));	
		
		DB::table('static_ethnics')->insert(array(
			'name' => '鄂温克族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '怒族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '京族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '基诺族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '德昂族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '保安族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '俄罗斯族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '裕固族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '乌兹别克族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '门巴族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '鄂伦春族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '独龙族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '塔塔尔族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '赫哲族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

		DB::table('static_ethnics')->insert(array(
			'name' => '珞巴族',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		));

	}

	public function down()
	{
		Schema::drop('static_ethnics');
	}

}
