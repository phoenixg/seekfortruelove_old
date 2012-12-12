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

$mailer = Laravel\IoC::resolve('mailer');

$messageBody = 
'您好'.Input::get('nickname').
'弟兄/姐妹，这封信是由seekfortruelove网站自动发出的，您收到这封邮件，是由于在[seekfortruelove网址]进行了新用户注册。您的用户名是：'.Input::get('email').'

如果您并没有访问过seekfortruelove网站，请忽略这封邮件。

您只需点击下面的链接即可激活您的帐号：
http://www.domain.com/code123456789
(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)

此电邮为系统自动发出，请勿回复。 

感谢您的访问，祝您使用愉快！

此致
SEEKFORTRUELOVE
http://www.domain.com/
如有疑问请发邮件至：test@gmail.com
';


/*

您好 Input::get('nickname') 弟兄/姐妹，

这封信是由seekfortruelove网站自动发出的，您收到这封邮件，是由于在[seekfortruelove网址]进行了新用户注册。您的用户名是：Input::get('email')

如果您并没有访问过seekfortruelove网站，请忽略这封邮件。

您只需点击下面的链接即可激活您的帐号：
http://www.domain.com/code123456789
(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)

此电邮为系统自动发出，请勿回复。 

感谢您的访问，祝您使用愉快！

此致
SEEKFORTRUELOVE
http://www.domain.com/
如有疑问请发邮件至：test@gmail.com

*/


			// 发送激活邮件
$message = Swift_Message::newInstance('来自seekfortruelove的注册反馈信息')
		    ->setFrom(array('gopher.huang@gmail.com'=>'管理员'))
		    ->setTo(array('2814258914@qq.com'=> Input::get('nickname')))
		    ->addPart('Plain Text Message','text/plain')
		    ->setBody($messageBody,'text/html');






// Send the email
$mailer->send($message);

die;

			// 
			return Redirect::to_route('welcome')
				->with('message', '注册成功！');
		}

		exit;
	}

	public function get_welcome()
	{
		//如果session里头没有message就直接跳转

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