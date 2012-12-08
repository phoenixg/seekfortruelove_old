<?php

class Account_Controller extends Base_Controller
{
	public $restful = true;

	public function get_register()
	{
		return View::make('home.register')
			->with('static_ethnics', DB::table('static_ethnics')->get())
			->with('static_nationalities', DB::table('static_nationalities')->get())
			->with('static_districts', DB::table('static_districts')->get())
			->with('static_marriages', DB::table('static_marriages')->get())
			->with('static_livings', DB::table('static_livings')->get())
			->with('static_academics', DB::table('static_academics')->get())
			->with('static_industries', DB::table('static_industries')->get())
			->with('static_professions', DB::table('static_professions')->get())
			->with('static_companytypes', DB::table('static_companytypes')->get())
			->with('static_salaries', DB::table('static_salaries')->get());
	}

	public function post_create() 
	{
		$validation = User::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to_route('register')
					->with_errors($validation)
					->with_input();
		} else {
			User::create(array(
				'email' => Input::get('email'),
				'nickname' => Input::get('nickname'),
				'password' => Hash::make(Input::get('password')),
				'sex' => Input::get('sex'),
				'ethnic' => Input::get('ethnic'),
				'nationality' => Input::get('nationality'),
				'height' => Input::get('height'),
				'weight' => Input::get('weight'),
				'born' => Input::get('born'),
				'district' => Input::get('district'),
				'marriage' => Input::get('marriage'),
				'living' => Input::get('living'),
				'academic' => Input::get('academic'),
				'school' => Input::get('school'),
				'industry' => Input::get('industry'),
				'profession' => Input::get('profession'),
				'companytype' => Input::get('companytype'),
				'salary' => Input::get('salary'),
				'blog' => Input::get('blog')
			));


			return Redirect::to_route('welcome')
				->with('message', '注册成功！');
		}

		exit;
	}

	public function get_welcome()
	{
		return View::make('welcome');
	}

	public function get_login()
	{
		return View::make('home.login');
	}

	public function post_login()
	{
		$credentials = array(
			'username' => strtolower(Input::get('email')),
			'password' => Input::get('password') 
		);

		if(Auth::attempt($credentials))
		{
			//return Redirect::to_route('search');
			return Redirect::to('search');
			exit;
		}
		
		return Redirect::to_route('login');
			//->with('login_errors', true);
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to_route('login');
	}

}