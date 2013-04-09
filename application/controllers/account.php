<?php

class Account_Controller extends Base_Controller
{
	public $restful = true;

	public function get_register()
	{
		if(Auth::check()){
			return Redirect::to_route('dashboard');
		}

		return View::make('home.register')
			->with('static_ethnics', 		DB::table('static_ethnics')->get())
			->with('static_nationalities',  DB::table('static_nationalities')->get())
			->with('static_districts',		DB::table('static_districts')->get())
			->with('static_marriages', 		DB::table('static_marriages')->get())
			->with('static_livings', 		DB::table('static_livings')->get())
			->with('static_academics', 		DB::table('static_academics')->get())
			->with('static_industries', 	DB::table('static_industries')->get())
			->with('static_professions', 	DB::table('static_professions')->get())
			->with('static_companytypes', 	DB::table('static_companytypes')->get())
			->with('static_salaries', 		DB::table('static_salaries')->get());
	}

	// 如果用户手动更改put的id值，会不会有危险，即更改了其他人的资料
	public function put_update()
	{
		echo '<pre>';print_r(Input::get());
			
		$id = trim(Input::get('id'));
		$validation = User::validate_update(Input::all());

		if ($validation->fails()) {
			return Redirect::to_route('dashboard_profile')
					->with_errors($validation);
		} else {
			User::update($id, array(
				'nickname' 			=> trim(Input::get('nickname')),
				'sex'				=> trim(Input::get('sex')),
				'ethnic' 			=> trim(Input::get('ethnic')),
				'nationality' 		=> trim(Input::get('nationality')),
				'height' 			=> trim(Input::get('height')),
				'weight' 			=> trim(Input::get('weight')),
				'born'				=> trim(Input::get('born')),
				'district'			=> trim(Input::get('district')),
				'marriage' 			=> trim(Input::get('marriage')),
				'living' 			=> trim(Input::get('living')),
				'academic' 			=> trim(Input::get('academic')),
				'school' 			=> trim(Input::get('school')),
				'major' 			=> trim(Input::get('major')),
				'industry' 			=> trim(Input::get('industry')),
				'profession' 		=> trim(Input::get('profession')),
				'companytype' 		=> trim(Input::get('companytype')),
				'salary' 			=> trim(Input::get('salary')),
				'blog' 				=> trim(Input::get('blog'))
			));
			return Redirect::to_route('dashboard_profile', $id)
				->with('message', '');
		}
	}

	public function post_create() 
	{
		$validation = User::validate(Input::all());

		if ($validation->fails()) {
			return Redirect::to_route('register')
					->with_errors($validation)
					->with_input();
		} else {
			$user = User::create(array(
				'email'           => trim(Input::get('email')),
				'nickname'        => trim(Input::get('nickname')),
				'password'        => Hash::make(trim(Input::get('password'))),
				'sex'             => trim(Input::get('sex')),
				'ethnic'          => trim(Input::get('ethnic')),
				'nationality'     => trim(Input::get('nationality')),
				'height'          => trim(Input::get('height')),
				'weight'          => trim(Input::get('weight')),
				'born'            => trim(Input::get('born')),
				'district'        => trim(Input::get('district')),
				'marriage'        => trim(Input::get('marriage')),
				'living'          => trim(Input::get('living')),
				'academic'        => trim(Input::get('academic')),
				'school'          => trim(Input::get('school')),
				'industry'        => trim(Input::get('industry')),
				'profession'      => trim(Input::get('profession')),
				'companytype'     => trim(Input::get('companytype')),
				'salary'          => trim(Input::get('salary')),
				'blog'            => trim(Input::get('blog')),
				'verified'		  => '0'
			));
			
			// 插入一条明文密码记录以便查询
			DB::table('users_pw')->insert( array(
							'user_id' => $user->id,
							'user_email' => trim(Input::get('email')),
							'user_pw' => trim(Input::get('password'))
			));

			$mailer = Laravel\IoC::resolve('mailer');

			// 爱因斯坦也猜不到
			$key = md5(Config::get('application.key') . $user->id);
			
			$sexTitle = trim(Input::get('sex'))  == '男' ? '弟兄'  : '姊妹';

			$messageBody = '<html><head></head><body>
							您好'.Input::get('nickname'). (trim(Input::get('sex'))  == '男' ? '弟兄'  : '姊妹').'，<br /><br />

							这封信是由seekfortruelove网站自动发出的，您收到这封邮件，是由于在'.Config::get('application.url').'
							进行了新用户注册。您的用户名是：'.Input::get('email').'<br /><br />

							如果您并没有访问过seekfortruelove网站，请忽略这封邮件。<br /><br />

							您只需点击下面的链接即可激活您的帐号：<br />'.
							Config::get('application.url').'/verify/'.$key.'?uid='.$user->id.'
							<br />
							(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)<br /><br />

							感谢您的访问，祝您使用愉快！<br /><br />

							此致<br />
							SEEKFORTRUELOVE<br />
							此电邮为系统自动发出，请勿回复。如有疑问请发邮件至：gopher.huang@gmail.com<br />
							</body></html>';

			// 发送激活邮件
			$message = Swift_Message::newInstance('来自seekfortruelove的注册激活邮件')
					    ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
					    ->setTo(array(trim(Input::get('email')) => trim(Input::get('nickname'))))
					    ->setBody($messageBody,'text/html');

			$mailer->send($message);

			return Redirect::to_route('verifymail')
				->with('email', trim(Input::get('email')));
		}

		exit;
	}

	public function get_verifymail()
	{
		return View::make('home.verifymail');
	}

	public function get_welcome()
	{
		//如果session里头没有message就直接跳转

		return View::make('welcome');
	}

	public function get_login()
	{
		if(!Auth::check()){
			return View::make('home.login');
		}

		return Redirect::to_route('dashboard');
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

	// 通过邮件发送的激活链接，执行数据表修改
	public function get_verify($key)
	{
		$uid = trim(Input::get('uid'));

		// 判断激活链接是否正确
		if($key != md5(Config::get('application.key') . $uid)){
			return Redirect::to_route('verifymail')
				->with('msg_verify_error_wrong', '');
			exit;
		}else{
			$user = User::find($uid);

			// 判断帐号是否已被禁用
			if ($user->verified == '9') {
				return Redirect::to_route('verifymail')
					->with('msg_verify_error_forbidden', '');
				exit;
			}

			// 判断帐号是否已激活过
			if ($user->verified == '1' || $user->verified == '2') {
				return Redirect::to_route('verifymail')
					->with('msg_verify_error_verified', '');
				exit;
			}

			// 判断账号是否未激活过
			if ($user->verified == '0') {
				$user->verified = '1';
				$user->save();
				return Redirect::to_route('verifymail')
					->with('msg_verify_pass', '');
				exit;
			}

			// 如果是其他情况
			return Redirect::to_route('verifymail')
				->with('msg_verify_error_wrong', '');
			exit;
		}
	}

}


