<?php

class Create_Admins_Table{
       
  public function up()
  {
    Schema::create('admins', function($table){
      $table->string('password', 100);
      $table->timestamps();
    });

  }

  public function down()
  {
    Schema::drop('admins');
  }
}