<?php

/*
访问url设计
	GET http://domain.com/ - 首页 done
	GET http://domain.com/faq/ - 常见问题解答
	GET http://domain.com/contact/ - 联系我们
	GET http://domain.com/privacy/ - 隐私声明
	GET http://domain.com/help/ - 帮助中心

	GET http://domain.com/dashboard/ - 普通用户控制面板
	GET http://domain.com/dashboard/stats/ - 普通用户统计信息

	GET http://domain.com/admin/dashboard/ - 管理员控制面板
	GET http://domain.com/admin/dashboard/profile/ - 管理员个人信息
	GET http://domain.com/admin/manage/ - 管理员登陆


*/

//homepage
Route::get('/', array('as' => 'home', function(){
	return View::make('home.index');
}));

//common pages
Route::get('register', 					array('as' => 'register', 										'uses' => 'account@register'));
Route::post('create', 					array('as' => 'create',											'uses' => 'account@create'));
Route::put('update', 					array('as' => 'update', 				'before' => 'csrf', 	'uses' => 'account@update'));
Route::get('verifymail', 				array('as' => 'verifymail',										'uses' => 'account@verifymail'));
Route::get('verify/(:all)',				array('as' => 'verify', 										'uses' => 'account@verify'));
Route::get('welcome',					array('as' => 'welcome', 										'uses' => 'account@welcome'));
Route::get('login', 					array('as' => 'login', 											'uses' => 'account@login'));
Route::post('login', 					array('as' => 'login', 											'uses' => 'account@login'));
Route::get('logout', 					array('as' => 'logout', 										'uses' => 'account@logout'));

//function pages
Route::get('search', 					array('as' => 'search', 				'before' => 'auth', 	'uses' => 'user@search'));
Route::post('search', 					array('as' => 'search', 										'uses' => 'user@search'));
Route::get('profile/(:any)', 			array('as' => 'profile', 										'uses' => 'user@profile'));

//user dashboard
Route::get('dashboard', 				array('as' => 'dashboard', 										'uses' => 'dashboard@index'));
Route::get('dashboard/profile', 		array('as' => 'dashboard_profile',								'uses' => 'dashboard@profile'));
Route::get('dashboard/image', 			array('as' => 'dashboard_image', 								'uses' => 'dashboard@image'));
Route::post('dashboard/imageupload',	array('as' => 'dashboard_imageupload', 							'uses' => 'dashboard@imageupload'));
Route::post('dashboard/imagehandle', 	array('as' => 'dashboard_imagehandle',							'uses' => 'dashboard@imagehandle'));
Route::post('dashboard/imagecrop', 		array('as' => 'dashboard_imagecrop',							'uses' => 'dashboard@imagecrop'));
Route::delete('dashboard/imagedelete',  array('as' => 'dashboard_imagedelete', 							'uses' => 'dashboard@imagedelete'));

//admin dashboard
Route::get('admin/login', 				array('as' => 'admin_login', 									'uses' => 'admin.admin@login'));
Route::post('admin/login', 				array('as' => 'admin_login', 									'uses' => 'admin.admin@login'));
Route::get('admin/dashboard', 			array('as' => 'admin_dashboard', 								'uses' => 'admin.dashboard@index'));                                   
Route::get('admin/dashboard/examine', 	array('as' => 'admin_dashboard_examine', 						'uses' => 'admin.dashboard@examine'));                               

//test pages
Route::controller(array(
	'test'
));


/*
Route::controller(array(
	'account',
	'dashboard'
));
*/


View::composer(array('layouts.default', 'layouts.dashboard'), function()
{
	//CSS
	Asset::add('css-bootstrap', 'css/bootstrap.min.css');
	Asset::add('css-bootstrap-responsive', 'css/bootstrap-responsive.min.css');
	Asset::add('css-global', 'css/global.css');
	Asset::add('css-googlefonts', 'css/googlefonts.css');

	//JavaScript
	Asset::add('jquery', 'js/jquery-1.8.0.min.js');
	Asset::add('js-bootstrap', 'js/bootstrap.min.js');
	Asset::add('js-modernizr', 'js/modernizr.custom.js');
	Asset::add('js-common', 'js/common.js');
});



/*
Route::get('authors', array('as' => 'authors', 'uses' => 'authors@index'));
Route::get('author/(:any)', array('as' => 'author', 'uses' => 'authors@view'));
Route::get('authors/new', array('as' => 'new_author', 'uses' => 'authors@new'));
Route::post('authors/create', array('before' => 'csrf', 'uses' => 'authors@create'));
Route::get('author/(:any)/edit', array('as' => 'edit_author', 'uses' => 'authors@edit'));
Route::put('author/update', array('before' => 'csrf', 'uses' => 'authors@update'));
Route::delete('author/delete', array('before' => 'csrf', 'uses' => 'authors@destroy'));
*/



/*
|--------------------------------------------------------------------------
| 应用程序 404 & 500 错误处理器
|--------------------------------------------------------------------------
|
| 为了集中和简化处理404错误, Laravel采用了极好的事件系统来获取响应。
| 你可以随意修改成符合自己风格和需求的样子。
|
| 类似地，我们使用事件来处理500级别的显示。
| 当某个异常被抛出时，这些错误就被激活。
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| 路由过滤器
|--------------------------------------------------------------------------
|
| 过滤器提供了简单的方法来为路由附加功能
| 内置的前置和后置过滤器，在请求你的应用程序之前，称作 before 和 after
| 你还可以自己创建其他的过滤器来附加到独立的路由里
|
| 我们来看一个例子
|
| 首先，定义一个过滤器：
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| 然后，把过滤器附加给路由：
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

// TODO
Route::filter('auth_admin', function()
{
	return 'auth_admin';
});






