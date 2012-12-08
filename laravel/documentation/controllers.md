# 控制器

## 内容

- [基础](#the-basics)
- [控制器路由](#controller-routing)
- [Bundle 控制器](#bundle-controllers)
- [Action 过滤器](#action-filters)
- [嵌套控制器](#nested-controllers)
- [控制器 Layouts](#controller-layouts)
- [RESTful 控制器](#restful-controllers)
- [独立注入](#dependency-injection)
- [控制器工厂](#controller-factory)

<a name="the-basics"></a>
##  基础

控制器是负责接受用户输入、管理来自model、libraries和view的交互的类。 通常，它们向model索要数据，然后返回给视图呈现给用户。

在现代网页开发中，控制器的用法是注入应用程序逻辑的常见方法。 然而，Laravel还引入了路由声明来加强开发者对应用程序逻辑植入的能力。 在[路由文档](/docs/routing)里详细说明了。 我们鼓励新用户以控制器开始开发。 没有什么应用程序逻辑是用路由能做而用控制器不能做的。


控制器类应该存储在 **application/controllers** 文件夹里，并且要继承Base\_Controller类。一个Home\_Controller类已包含在Laravel框架里。

#### 创建一个简单的控制器:

	class Admin_Controller extends Base_Controller
	{

		public function action_index()
		{
			//
		}

	}

**Actions** 是控制器方法的名称，它们倾向于网络可访问。 Actions应该以"action\_"作为前缀。 所有其他方法，不管scope是什么，都无法通过网络访问。

> **注意:** Base\_Controller 类继承了主Laravel控制器类, 它提供了便捷的方式来放置所有控制器都通用的方法。

<a name="controller-routing"></a>
## 控制器路由

重要的一点，所有Laravel的路由必须明确指定，包括路由和控制器。

这意味着没有明确指定的控制器方法将**无法**访问。 你可以自动指定控制器的所有方法。 控制器路由注册通常定义在**application/routes.php**。

查看 [路由页面](/docs/routing#controller-routing) 获取更多路由至控制器的信息。

<a name="bundle-controllers"></a>
## Bundle 控制器

Bundles是Laravel的模块管理系统。 Bundles可以轻松地处理应用程序的请求。 我们会在[bundles的更多信息](/docs/bundles)详细地说明。

创建属于bundles的控制器几乎和创建应用程序控制器一摸一样。 只要把控制器类名称前缀为bundle的名称即可，如果你的bundle名叫"admin"， 那么你的控制器类名称应该如此：

#### 创建一个bundle控制器类:

	class Admin_Home_Controller extends Base_Controller
	{

		public function action_index()
		{
			return "Hello Admin!";
		}

	}

但是，你该如何注册bundle控制器的路由呢？ 很简单。 这样做：

#### 注册一个bundles控制器的路由:

	Route::controller('admin::home');

太棒了！ 现在我们可以在web上访问我们的"admin" bundle的home控制器了。

> **注意:** 纵观Laravel，双冒号语法被用作象征bundles。 更多关于bundles的信息见 [bundle 文档](/docs/bundles).

<a name="action-filters"></a>
## Action 过滤器

Action过滤器是可以在控制器action之前或之后执行的方法。 使用Laravel你不仅可以控制哪个过滤器应用于哪个方法，还可以选择哪种 http 动作 (post, get, put, and delete) 应用在过滤器上。

你可以在控制器的constructor里面给控制器actions指定"before"和"after"过滤器。

#### 为所有方法添加一个过滤器:

	$this->filter('before', 'auth');

这个例子中，'auth'过滤器会在每次运行该控制器的action之前执行。 auth action是Laravel自带的，可以在 **application/routes.php**找到。 auth过滤器验证用户是否已经登陆，如果没有，就重定向到'login'。

#### 为部分方法添加一个过滤器:

	$this->filter('before', 'auth')->only(array('index', 'list'));

这个例子中，auth过滤器会在action_index()或action_list()方法运行之前执行。 在访问这些页面之前，用户必须登陆。 此外，该控制器里没有其他action要求验证session。

#### 为除了某些方法外的其他方法添加一个过滤器:

	$this->filter('before', 'auth')->except(array('add', 'posts'));

类似上面的例子，这个声明确保auth过滤器只有在某些控制器方法才执行。 不是声明过滤器应用在哪个action，而是声明action不要求验证session的action。 有时候使用'except'方法更为安全，因为添加新的action时，有可能忘记在only()里面添加过滤器。 


#### 添加运行POST的过滤器:

	$this->filter('before', 'csrf')->on('post');

这个例子显示了过滤器如何只针对某个特定的http动作。 在这个例子里，我们只在表单post提交的时候才运行csrf过滤器。 csrf过滤器被设计用来阻止表单提交内容来自其他系统（比如spam机器人），这个过滤器是Laravel自带的。 你可以在**application/routes.php**里找到这个csrf过滤器。


*进深阅读:*

- *[路由过滤器](/docs/routing#filters)*

<a name="nested-controllers"></a>
## 嵌套控制器

控制器可以在**application/controllers**文件夹的任何数量的子文件夹里嵌套。

将控制器类定义和存储于**controllers/admin/panel.php**.

	class Admin_Panel_Controller extends Base_Controller
	{

		public function action_index()
		{
			//
		}

	}

#### 使用"dot"语法注册嵌套控制器:

	Route::controller('admin.panel');

> **注意:** 当使用嵌套控制器时，总是从最深到最浅的顺序注册你的控制器，以避免控制器路由阴影重叠。

#### 访问控制器的 "index" action:

	http://localhost/admin/panel

<a name="controller-layouts"></a>
## 控制器 Layouts

结合控制器使用Layouts 详见[模板页面](http://laravel.com/docs/views/templating).

<a name="restful-controllers"></a>
## RESTful 控制器

与其用"action_"前缀控制器，你还可以用它们要响应的HTTP动作来前缀它们。

#### 在控制器里添加一个 RESTful 属性:

	class Home_Controller extends Base_Controller
	{

		public $restful = true;

	}

#### 建立 RESTful 控制器actions:

	class Home_Controller extends Base_Controller
	{

		public $restful = true;

		public function get_index()
		{
			//
		}

		public function post_index()
		{
			//
		}

	}

当建立CRUD方法时，这就非常有用，你可以区分哪个用来计算，哪个用来渲染表单，哪个用来验证和存储结果的逻辑。

<a name="dependency-injection"></a>
## 独立注入

如果你专注于撰写测试代码， 你很可能想要注入独立的东西进控制器的constructor。 没问题。 只要注册你的控制器于[IoC 容器](/docs/ioc)就可以。 当使用容器来注册控制器的时候， 用**controller** 作为前缀的键。 所以，在我们的 **application/start.php**文件里，我们可以像这样注册user控制器：

	IoC::register('controller: user', function()
	{
		return new User_Controller;
	});

当针对一个控制器的请求来到你的应用程序的时候， Laravel会自动判断容器里面是否有已注册的控制器， 如果存在， 那么就会使用容器来解决控制器的实例。

> **Note:** Before diving into controller dependency injection, you may wish to read the documentation on Laravel's beautiful [IoC container](/docs/ioc).
> **注意:** 在更深地了解控制器独立注入之前， 你可以想要阅读下 Laravel漂亮的 [IoC 容器](/docs/ioc)文档。

<a name="controller-factory"></a>
## 控制器工厂

如果你想获得更多对于控制器实例的控制，比如使用第三方Ioc容器，你需要使用Laravel的控制器工厂。

**注册一个处理控制器实例的事件:**

	Event::listen(Controller::factory, function($controller)
	{
		return new $controller;
	});

该事件会接收需要resovled的控制器的类名称。 你所需要做的只是返回一个控制器的实例就行了。
