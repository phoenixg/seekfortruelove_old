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
		var_dump(Input::get());

		echo '<pre>';print_r(DB::table('admins')->first());
die;
		if(Hash::check(trim(Input::get('password')), ))
		{
			//return Redirect::to_route('search');
			return Redirect::to('search');
			exit;
		}
		
		return Redirect::to_route('login');
			//->with('login_errors', true);

	}

}


