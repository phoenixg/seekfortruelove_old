<?php

class Create_Admins_Table{
       
  public function up()
  {
    Schema::create('admins', function($table){
      $table->string('password', 100);
      $table->timestamps();
    });


    DB::table('admins')->insert(array(
      'password' => Hash::make('111111'),
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ));
  }

  public function down()
  {
    Schema::drop('admins');
  }
}