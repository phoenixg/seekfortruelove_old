<?php

class Create_Images_Table{
       
  public function up()
  {
    Schema::create('images', function($table){
      $table->integer('user_id');
      $table->string('filename', 100);
      $table->string('filename_thumb', 100);
      $table->timestamps();
    });

  }

  public function down()
  {
    Schema::drop('images');
  }
}