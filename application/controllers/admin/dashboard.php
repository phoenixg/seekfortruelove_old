<?php 
class Admin_Dashboard_Controller extends Base_Controller
{
	public $restful = true;

	public function get_index()
	{
		Printer::write('管理员才能访问的控制器');
	}


}


