<?php 
class Admin_Admin_Controller extends Base_Controller
{
	public $restful = true;	

	public function get_login()
	{
		if (Auth::check()) {
			return 'you are logged in';
		}

		return View::make('admin.login');
	}


}


