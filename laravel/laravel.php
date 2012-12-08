<?php namespace Laravel;

/*
|--------------------------------------------------------------------------
| 框架核心引导程序
|--------------------------------------------------------------------------
|
| 通过引用这个文件来设置框架内核，它包含类自动加载器和对于任何bundles的注册
| 基本上，一旦这个文件被引用，框架就可以由开发者使用了
|
*/

require 'core.php';

/*
|--------------------------------------------------------------------------
| 设置错误 & 异常处理
|--------------------------------------------------------------------------
|
| 下面我们注册自定义的错误及异常处理器，以便我们可以为全部错误显示干净的错误消息
| 并且自定义可被程序员设置的错误日志
|
*/

set_exception_handler(function($e)
{
	require_once path('sys').'error'.EXT;

	Error::exception($e);
});


set_error_handler(function($code, $error, $file, $line)
{
	require_once path('sys').'error'.EXT;

	Error::native($code, $error, $file, $line);
});


register_shutdown_function(function()
{
	require_once path('sys').'error'.EXT;

	Error::shutdown();
});

/*
|--------------------------------------------------------------------------
| 报告全部错误
|--------------------------------------------------------------------------
|
| 把 error reporting 设置成 -1, 我们就强制PHP报告所有的错误
|
*/

error_reporting(-1);

/*
|--------------------------------------------------------------------------
| 开始应用程序 Bundle
|--------------------------------------------------------------------------
|
| 应用程序（application） "bundle"是安装后默认的bundle，
| 我们把它先激活。在这个bundle的引导器里可以设置更多程序员可以hook进去一些核心框架事件，比如配置加载器|
*/

Bundle::start(DEFAULT_BUNDLE);

/*
|--------------------------------------------------------------------------
| 自动启动其他Bundles
|--------------------------------------------------------------------------
|
| 全站使用的Bundles可以被自动启动，这样就可以在每次请求时立即使用，无需在应用程序里特别另外开启
|
*/

foreach (Bundle::$bundles as $bundle => $config)
{
	if ($config['auto']) Bundle::start($bundle);
}

/*
|--------------------------------------------------------------------------
| 注册 Catch-All 路由
|--------------------------------------------------------------------------
|
| 这个路由会抓取所有请求，并且会监听404事件
| This route will catch all requests that do not hit another route in
| the application, and will raise the 404 error event so the error
| can be handled by the developer in their 404 event listener.
|
*/

Routing\Router::register('*', '(:all)', function()
{
	return Event::first('404');
});

/*
|--------------------------------------------------------------------------
| Route The Incoming Request
|--------------------------------------------------------------------------
|
| Phew! We can finally route the request to the appropriate route and
| execute the route to get the response. This will give an instance
| of the Response object that we can send back to the browser
|
*/

$uri = URI::current();

Request::$route = Routing\Router::route(Request::method(), $uri);

$response = Request::$route->call();

/*
|--------------------------------------------------------------------------
| "Render" The Response
|--------------------------------------------------------------------------
|
| The render method evaluates the content of the response and converts it
| to a string. This evaluates any views and sub-responses within the
| content and sets the raw string result as the new response.
|
*/

$response->render();

/*
|--------------------------------------------------------------------------
| Persist The Session To Storage
|--------------------------------------------------------------------------
|
| If a session driver has been configured, we will save the session to
| storage so it is avaiable for the next request. This will also set
| the session cookie in the cookie jar to be sent to the user.
|
*/

if (Config::get('session.driver') !== '')
{
	Session::save();
}

/*
|--------------------------------------------------------------------------
| Send The Response To The Browser
|--------------------------------------------------------------------------
|
| We'll send the response back to the browser here. This method will also
| send all of the response headers to the browser as well as the string
| content of the Response. This should make the view available to the
| browser and show something pretty to the user.
|
*/

$response->send();

/*
|--------------------------------------------------------------------------
| And We're Done!
|--------------------------------------------------------------------------
|
| Raise the "done" event so extra output can be attached to the response
| This allows the adding of debug toolbars, etc. to the view, or may be
| used to do some kind of logging by the application.
|
*/

Event::fire('laravel.done', array($response));


