<?php 
class Admin_Admin_Controller extends Base_Controller
{
	public $restful = true;	

	public function get_login()
	{
		if (Auth::check()) Auth::logout();

		return View::make('admin.login');
	}

	public function post_login()
	{
		$admin = DB::table('admins')->first();

		if(Hash::check(trim(Input::get('password')), $admin->password))
		{	

			return Redirect::to_route('search');
			exit;
		}
		
		return Redirect::to_route('login');
			//->with('login_errors', true);

	}

}


