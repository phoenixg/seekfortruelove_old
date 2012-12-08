# 路由

## 内容

- [基础](#the-basics)
- [通配符](#wildcards)
- [404 事件](#the-404-event)
- [过滤器](#filters)
- [Pattern 过滤器](#pattern-filters)
- [Global 过滤器](#global-filters)
- [路由组](#route-groups)
- [命名路由](#named-routes)
- [HTTPS 路由](#https-routes)
- [Bundle 路由](#bundle-routes)
- [Controller 路由](#controller-routing)
- [CLI 路由测试](#cli-route-testing)

<a name="the-basics"></a>
## 基础

Laravel使用最新的PHP 5.3的特性来使得路由变得简单而富有表达性。 从简单的API到复杂的web应用程序，都尽可能简单。路由通常定义在**application/routes.php**。

与其他框架不同，Laravel可以以两种方式嵌入应用程序逻辑。控制器时最普遍的，还可以用路由。小型站的话用路由极其方便。

下面的例子里，第一个参数是你“注册”的路由。 第二个参数是包含针对那个路由的函数逻辑。路由无需前置斜杠来定义。除了默认路由外，它**只有**一个前斜杠。

> **注意:** 路由按照注册的顺序来生效, 所以请在**routes.php**文件的底部注册任何 "catch-all" 路由。

#### 注册一条响应 "GET /" 的路由:

	Route::get('/', function()
	{
		return "Hello World!";
	});

#### 注册一条针对任何HTTP动作的路由 (GET, POST, PUT, 和 DELETE):

	Route::any('/', function()
	{
		return "Hello World!";
	});

#### 注册响应其他方法的路由：

	Route::post('user', function()
	{
		//
	});

	Route::put('user/(:num)', function($id)
	{
		//
	});

	Route::delete('user/(:num)', function($id)
	{
		//
	});

**注册一条URI，响应多种HTTP动作:**

	Router::register(array('GET', 'POST'), $uri, $callback);

<a name="wildcards"></a>
## 通配符

#### 强制一个URI段为任意数字:

	Route::get('user/(:num)', function($id)
	{
		//
	});

#### 允许一个URI段为任意字母-数字结合的字符串:

	Route::get('post/(:any)', function($title)
	{
		//
	});

#### 允许一个URI段为可选的:

	Route::get('page/(:any?)', function($page = 'index')
	{
		//
	});

<a name="the-404-event"></a>
## 404 事件

如果进入你应用程序的请求不满足任何已存在的路由，那么404事件就被激活。你可以在**application/routes.php**文件中找到默认的事件处理机制。

#### 默认的404事件处理器:

	Event::listen('404', function()
	{
		return Response::error('404');
	});

你可以按自己的需求随意更改这里！

*进深阅读:*

- *[事件](/docs/events)*

<a name="filters"></a>
## 过滤器

路由过滤器可以在一条路由执行前或执行后运行。如果"before"过滤器返回了一个值，那么这个值就是路由没有执行请求的响应，当植入验证过滤器等时，这很有用。过滤器通常定义在**application/routes.php**。

#### 注册一个过滤器:

	Route::filter('filter', function()
	{
		return Redirect::to('home');
	});

#### 为路由添加一个过滤器:

	Route::get('blocked', array('before' => 'filter', function()
	{
		return View::make('blocked');
	}));

#### 为路由添加一个"after"过滤器:

	Route::get('download', array('after' => 'log', function()
	{
		//
	}));

#### 为路由添加多个过滤器:

	Route::get('create', array('before' => 'auth|csrf', function()
	{
		//
	}));

#### 为过滤器传递参数:

	Route::get('panel', array('before' => 'role:admin', function()
	{
		//
	}));

<a name="pattern-filters"></a>
## Pattern 过滤器

有时候你可能要添加一个过滤器给所有以某个URI开始的所有请求。比如，你可能想要添加一个"auth"过滤器给所有以"admin"开头的URI。可以这样做：

#### 定义一个基于 URI pattern 的过滤器:

	Route::filter('pattern: admin/*', 'auth');

<a name="global-filters"></a>
## Global 过滤器

Laravel有两种"global"过滤器，执行针对你的应用程序每次 **before** 和 **after**的请求。你可以在**application/routes.php**文件里找到它们。这些过滤器在启用common bundles或添加全局assets的时候非常有用。


> **注意:**  **after** 过滤器为当前请求接受 **Response** 对象。

<a name="route-groups"></a>
## 路由组

路由组允许你添加一系列的属性给路由组，允许你保持代码的整洁。

	Route::group(array('before' => 'auth'), function()
	{
		Route::get('panel', function()
		{
			//
		});

		Route::get('dashboard', function()
		{
			//
		});
	});

<a name="named-routes"></a>
## 命名路由

频繁地使用路由的URI来生成URLs或重定向，在路由日后改变的时候可能引起问题。给路由的赋值一个名称给了你便捷的方法来在应用程序中引用你的路由。当路由改变发生时，生成的链接也会指向新的路由，无需另外的配置。

#### 注册一个命名路由:

	Route::get('/', array('as' => 'home', function()
	{
		return "Hello World";
	}));

#### 为命名路由生成一个URL:

	$url = URL::to_route('home');

#### 重定向至命名路由:

	return Redirect::to_route('home');

只有当你有命名路由的时候，你才可以使用给定的名称简单地检查路由是否处理了当前请求。

#### 决定处理请求的路由是否存在一个给定的名称:

	if (Request::route()->is('home'))
	{
		// "home" 路由正在处理请求!
	}

<a name="https-routes"></a>
## HTTPS 路由

当定义路由时，你可以使用"https"属性来指明当生成URL或重定向到那条路由时要采用HTTPS协议。

#### 定义一条 HTTPS 路由:

	Route::get('login', array('https' => true, function()
	{
		return View::make('login');
	}));

#### 使用 "secure" 捷径方法:

	Route::secure('GET', 'login', function()
	{
		return View::make('login');
	});

<a name="bundle-routes"></a>
## Bundle 路由

Bundles是Laravel的模块管理系统。 Bundles可以简单地在应用程序里配置来处理请求。 我们会在[更多bundles的信息](/docs/bundles) 详细解释。 目前为止，阅读这段，只要知道路由可以用在bundles里，也可以在bundles里注册就可以了。

我们打开**application/bundles.php**文件，添加一些东西：

#### 注册bundle来处理路由:

	return array(

		'admin' => array('handles' => 'admin'),

	);

注意，我们的bundle配置数组里新的**handles**选项？这告诉Laravel要去在任何以"admin"开始的URI的请求时加载Admin bundle。

现在你已经准备好为bundle注册一些路由了呃，所以请在bundle的根目录创建一个**routes.php**文件：

#### 为bundle注册一个根路由:

	Route::get('(:bundle)', function()
	{
		return '欢迎来到 Admin bundle!';
	});

我们查看这个例子。注意到 **(:bundle)**这个占位符了吗？ 这会替换你用来注册bundle的 **handles** 从句的值。 这让你的代码保持[D.R.Y.](http://en.wikipedia.org/wiki/Don't_repeat_yourself) ，允许使用你的bundle的人改变根URI而不破坏你的路由！ 漂亮，不是吗？

当然，你可以给所有路由使用 **(:bundle)** 占位符，而不仅仅是你的根路由。

#### 注册bundle路由:

	Route::get('(:bundle)/panel', function()
	{
		return "我处理向 admin/panel 提交的请求!";
	});

<a name="controller-routing"></a>
## Controller 路由

控制器提供了其他管理你的应用程序逻辑的方式。如果你不熟悉控制器，你也许想要阅读下[了解一下控制器](/docs/controllers) ，然后返回这个段落。

重要的一点，Laravel的所有路由必须明确指定，包括路由到控制器。 这意味着控制器方法如果没有在路由里面注册，就**无法**访问到。 可以通过在控制器里使用控制器的路由注册来自动暴露全部的方法。 控制器路由注册一般定义在**application/routes.php**。

最可能的，你仅仅想要注册"controllers"目录下的全部控制器。 你可以用一条语句来完成。这样做：

#### 注册全部的控制器:

	Route::controller(Controller::detect());

**Controller::detect** 方法简单地返回全部已定义的控制器的方法为数组。

如果你想要在bundle里面自动侦测控制器，只需要给该方法传递一个bundle名称。 如果没有指定bundle，那么就会搜索application目录下的controller。

#### 注册全部"admin" bundle的控制器:

	Route::controller(Controller::detect('admin'));

#### 注册"home"控制器的路由:

	Route::controller('home');

#### 注册几个控制器的路由:

	Route::controller(array('dashboard.panel', 'admin'));

一旦一个控制器被注册了，你可以使用简单的URI约定来访问它的方法：

	http://localhost/controller/method/arguments

这个约定类似CodeIgniter和其他流行框架的访问方式， 第一段是控制器名称，第二段是方法名称，剩余的段用来传递方法的参数。 如果没有方法传递，那么就会使用"index"方法。

这个路由约定也许不能适用于全部场景，所以你也可以明确地路由URIs至控制器的方法，可以用这样的语法。

#### 注册一个路由，指向控制器的某个方法:

	Route::get('welcome', 'home@index');

#### 注册一个过滤的路由，指向控制器的某个方法:

	Route::get('welcome', array('after' => 'log', 'uses' => 'home@index'));

#### 注册一个命名的路由，指向控制器的某个方法:

	Route::get('welcome', array('as' => 'home.welcome', 'uses' => 'home@index'));

<a name="cli-route-testing"></a>
## CLI 路由测试

你可以使用Laravel的"Artisan"命令行工具来测试路由。 简单的指定你要使用的请求方法和URI就可以了。 路由响应会以var_dump的形式返回到CLI输出。

#### 通过Artisan CLI调用一条路由:

	php artisan route:call get api/user/1