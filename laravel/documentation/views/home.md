# 视图 & 响应

## 内容

- [基础](#the-basics)
- [绑定数据到视图](#binding-data-to-views)
- [嵌套视图](#nesting-views)
- [命名视图](#named-views)
- [视图 Composers](#view-composers)
- [重定向](#redirects)
- [带有Flash数据的重定向](#redirecting-with-flash-data)
- [下载](#downloads)
- [错误](#errors)

<a name="the-basics"></a>
## 基础

视图包含发送给使用你的应用程序的用户的HTML。 通过将应用程序业务逻辑和视图分离，你的代码会变得更加易于维护。

所有视图都存储在 **application/views** 目录下，均使用PHP文件扩展名。 **View** 类提供了简单的解析你的视图，并返回给客户端的方法。 我们看看例子吧！

#### 创建视图:

	<html>
		我保存在 views/home/index.php!
	</html>

#### 在路由中返回视图:

	Route::get('/', function()
	{
		return View::make('home.index');
	});

#### 在控制器中返回视图:

	public function action_index()
	{
		return View::make('home.index');
	});

#### 判断视图是否存在:

	$exists = View::exists('home.index');

有时候你需要对发送至浏览器的响应更多一点的控制。 比如，你需要自定义响应的header，或改变HTTP状态码。 就可以这样做：

#### 返回一个自定义的响应:

	Route::get('/', function()
	{
		$headers = array('foo' => 'bar');

		return Response::make('Hello World!', 200, $headers);
	});

#### 返回一个自定义的包含视图的响应:

	return Response::view('home', 200, $headers);

#### 返回一个JSON格式的响应:

	return Response::json(array('name' => 'Batman'));

#### 返回Eloquent 模型为 JSON 格式:

	return Response::eloquent(User::find(1));

<a name="binding-data-to-views"></a>
## 绑定数据到视图

通常，路由或控制器会响应来自model的数据给视图显示。 于是，我们需要传递数据至视图的方法。 有这么几种方法来完成这个目标，选择一种你最喜欢的吧！

#### 绑定数据至视图:

	Route::get('/', function()
	{
		return View::make('home')->with('name', 'James');
	});

#### 在视图里访问绑定的数据:

	<html>
		Hello, <?php echo $name; ?>.
	</html>

#### 链式绑定数据至视图:

	View::make('home')
		->with('name', 'James')
		->with('votes', 25);

#### 传递数组数据至绑定数据:

	View::make('home', array('name' => 'James'));

#### 使用魔术方法绑定数据:

	$view->name  = 'James';
	$view->email = 'example@example.com';

#### 使用数组接口方法绑定数据:

	$view['name']  = 'James';
	$view['email'] = 'example@example.com';

<a name="nesting-views"></a>
## 嵌套视图

很多时候你会希望视图里嵌套视图。 嵌套视图有时候被称作"partials"， 它们帮助你保持视图的精简和模块化。

#### 使用"nest"方法绑定一个嵌套视图:

	View::make('home')->nest('footer', 'partials.footer');

#### 传递数据至嵌套视图:

	$view = View::make('home');

	$view->nest('content', 'orders', array('orders' => $orders));

有时候你想要直接包含来自其他视图的视图。 你可以使用 **render** 这个辅助函数。

#### 使用 "render" 辅助函数来显示一个视图:

	<div class="content">
		<?php echo render('user.profile'); ?>
	</div>

还有一种常见的情况是，有一个partial视图负责显示数据的实时列表。 比如，你想创建一个partial视图负责显示关于某份订单的明细。 比如，你想要遍历订单的数组，渲染partial视图至每个订单。 使用**render_each**辅助函数会让这变得简单：


#### 为数组里每个项目渲染一份partial视图:

	<div class="orders">
		<?php echo render_each('partials.order', $orders, 'order');
	</div>

第一个参数是partial视图的名称， 第二个参数是数组数据， 第三个参数是当每个数组元素被传递给partial视图时，应该使用的变量名称。

<a name="named-views"></a>
## 命名视图

命名视图可以帮助你的代码更具表达性和组织性。 使用方法：

#### 注册一个命名视图:

	View::name('layouts.default', 'layout');

#### 获取命名视图的实例:

	return View::of('layout');

#### 绑定数据至命名视图:

	return View::of('layout', array('orders' => $orders));

<a name="view-composers"></a>
## 视图 Composers

每次视图被创建时，它的"composer"事件就会激活。 你可以监听这个事件，用它来绑定assets和常用数据。 经常用在比如边栏显示一个随机博客列表。 你可以通过加载layout视图来嵌套partial视图。 接着，为那个partial定义一个composer。 这个composer就可以查询posts表，收集所有必要数据给视图。 无需随机逻辑！ Composers通常定义在 **application/routes.php**。 比如：

#### 为"home"视图注册一个视图composer:

	View::composer('home', function($view)
	{
		$view->nest('footer', 'partials.footer');
	});

现在每次当"home"视图被创建时，一个View的实例就会被传递给已注册的Closure，允许你按需要准备视图。

#### 注册处理多个视图的composer:

	View::composer(array('home', 'profile'), function($view)
	{
		//
	});

> **注意:** 视图可以有不止一个composer。 尽情摆弄吧！

<a name="redirects"></a>
## 重定向

重要的一点是，路由和控制器都要求使用'return'来响应。 当你要重定向时，不要调用"Redirect::to()""， 而要使用"return Redirect::to()"。 这个区别很重要，它有别于其他PHP框架。

#### 重定向至其他URI:

	return Redirect::to('user/profile');

#### 重定向时带有指定的状态码:

	return Redirect::to('user/profile', 301);

#### 重定向至安全的URI:

	return Redirect::to_secure('user/profile');

#### 重定向至应用程序根:

	return Redirect::home();

#### 重定向回之前的action:

	return Redirect::back();

#### 重定向至命名路由:

	return Redirect::to_route('profile');

#### 重定向至控制器action:

	return Redirect::to_action('home@index');

有时候你需要重定向至命名路由， 还要指定值，而非路由的URI通配符。 你可以轻松地用合适的值来替代通配符：

#### 重定向至带有通配符值的命名路由:

	return Redirect::to_route('profile', array($username));

#### 重定向至带有通配符值的action:

	return Redirect::to_action('user@profile', array($username));

<a name="redirecting-with-flash-data"></a>
## 带有Flash数据的重定向

在用户创建了账户或登录进你的应用程序后，常见的做法是显示欢迎信息或状态信息。 但是，你要如何在下次请求时设置这种状态信息呢？ 就要用到with()方法来伴随重定向响应时传递flash数据。

	return Redirect::to('profile')->with('status', 'Welcome Back!');

你可以在视图里用Session的get方法来获取消息：

	$status = Session::get('status');

*更多阅读:*

- *[Sessions](/docs/session/config)*

<a name="downloads"></a>
## 下载

#### 发送一个文件下载响应:

	return Response::download('file/path.jpg');

#### 发送一个文件下载并赋值文件名的响应:

	return Response::download('file/path.jpg', 'photo.jpg');

<a name="errors"></a>
## 错误

要生成合适的错误响应，只需指明你要返回的响应码即可。 相关存储在 **views/error** 的视图会自动返回。

#### 生成一个404错误响应:

	return Response::error('404');

#### 生成一个500错误响应:

	return Response::error('500');