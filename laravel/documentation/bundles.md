# Bundles

## 内容

- [基础](#the-basics)
- [创建 Bundles](#creating-bundles)
- [注册 Bundles](#registering-bundles)
- [Bundles & 类加载](#bundles-and-class-loading)
- [启用 Bundles](#starting-bundles)
- [路由至 Bundles](#routing-to-bundles)
- [使用 Bundles](#using-bundles)
- [Bundle Assets](#bundle-assets)
- [安装 Bundles](#installing-bundles)
- [升级 Bundles](#upgrading-bundles)

<a name="the-basics"></a>
## 基础

Bundles是Laravel 3.0里面改进的核心点。 有组织代码进方便的"bundles"的方法。 一个bundle可以有自己的视图、配置、路由、migrations、任务等。 一个bundle可以是任何的东西，比如一个数据库ORM，或者一个健壮的验证系统。 模块化的设想体现在Laravel的设计决策中。 很多时候， 你可以把application文件夹设想做特殊的、默认的bundle，由Laravel事先加载和使用。


<a name="creating-and-registering"></a>
## 创建 Bundles

创建bundle的第一步是在**bundles**目录里创建一个文件夹。 比如， 我们创建一个"admin" bundle， 它可以是管理员后台。 **application/start.php** 文件提供了一些基本的配置，帮助你定义我们的应用程序如何去执行。另外，为了同样的目的， 我们还要在我们新的bundle文件夹下面创建一个**start.php**文件。每次这个bundle被加载时，都会运行这个文件。 我们来创建它：

#### 创建一个 bundle start.php 文件:

	<?php

	Autoloader::namespaces(array(
		'Admin' => Bundle::path('admin').'models',
	));

在这个start文件里，我们告诉自动加载器（auto-loader）命名空间是"Admin"的类应该用bundle的modles目录加载。 你可以在start文件里干任何事， 但通常它只被用作用auto-loader来注册类。 **事实上，你无需为你的bundle创建一个start文件。** 

下一步，我们看看这个bundle如何注册进我们的应用程序中！

<a name="registering-bundles"></a>
## 注册 Bundles

现在我们有我们的admin bundle了， 我们需要注册进Laravel里面。 打开 **application/bundles.php** 文件， 这里可以注册所有我们应用程序要使用的bundles。 我们添加自己的：

#### 注册一个简单的bundle:

	return array('admin'),

约定俗成地， Laravel会假设Admin bundle位于bundle目录的根层级， 但我们可以随自己的意思指定其他的位置：

#### 注册一个自定义路径的bundle:

	return array(

		'admin' => array('location' => 'userscape/admin'),

	);

现在Laravel会在**bundles/userscape/admin**底下查找我们的bundle。

<a name="bundles-and-class-loading"></a>
## Bundles & 类加载

通常，一个bundle的**start.php** 文件只包括auto-loader注册。 所以， 你也许想跳过 **start.php** ，直接在bundle的注册数组里声明bundle的映射， 比如；

#### 在bundle注册的时候定义 auto-loader 映射:

	return array(

		'admin' => array(
			'autoloads' => array(
				'map' => array(
					'Admin' => '(:bundle)/admin.php',
				),
				'namespaces' => array(
					'Admin' => '(:bundle)/lib',
				),
				'directories' => array(
					'(:bundle)/models',
				),
			),
		),

	);

注意，这里的每个选项都对应Laravel  [auto-loader](/docs/loading)的一个函数。 事实上， 选项的值会在auto-loader上自动被传递给对应的函数。

你可能还注意到了**(:bundle)** 占位符。 为了便利， 这会自动被替换成bundle的路径。 小菜一碟。 

<a name="starting-bundles"></a>
## 启用 Bundles

所以我们的bundle已经创建并注册好了， 但我们还无法使用它。 首先，我们需要启用它：

#### 启用一个 bundle:

	Bundle::start('admin');

这告诉Laravel运行bundle的 **start.php** 文件， 它会在auto-loader里注册它的类。 这个启用方法还会加载bundle的**routes.php**，如果有的话。

> **注意:** Bundle 只能启用一次。 后续再调用启用的话会被无视。

如果你在全局使用一个bundle， 你可能想让它在每次请求时都启用。 如果是这样，你可以在 **application/bundles.php** 文件中配置bundle自动加载：

#### 配置一个bundle自动启用:

	return array(

		'admin' => array('auto' => true),

	);

你不用总是需要明确启用一个bundle。 事实上， 你写的代码好像bundle被自动启用了，而Laravel会处理剩下的一切。 比如，如果你在尝试使用一个bundle的视图、配置、语言、路由或过滤器， 那么bundle会自动启用！

一旦启用了bundle， 它就激活了一个事件。 你可以监听启用bundle的事件，像这样：

#### 监听bundle的启用事件:

	Event::listen('laravel.started: admin', function()
	{
		//  "admin" bundle 被启用了...
	});

还可以"禁用"一个bundle，让它永远无法启用。

#### 禁用一个bundle，让它无法启用:

	Bundle::disable('admin');

<a name="routing-to-bundles"></a>
## 路由至 Bundles

参考文档[bundle 路由](/docs/routing#bundle-routes) 和  [bundle 控制器](/docs/controllers#bundle-controllers)，以获得更多关于路由和bundle的信息。


<a name="using-bundles"></a>
## 使用 Bundles

正如之前提及的，bundles可以有视图、配置、语言等文件。 Laravel使用一种双冒号语法来加载这些项目。 我们看看例子：

#### 加载一个bundle视图:

	return View::make('bundle::view');

#### 加载一个bundle配置项目:

	return Config::get('bundle::file.option');

#### 加载一个bundle语言条目:

	return Lang::line('bundle::file.line');

有时候你需要收集更多关于一个bundle的"meta"信息， 比如它是否存在、它的位置，或它全部的配置数组。 那么这样：

#### 判断一个bundle是否存在:

	Bundle::exists('admin');

#### 解析一个bundle的安装路径:

	$location = Bundle::path('admin');

#### 解析一个bundle的配置数组:

	$config = Bundle::get('admin');

#### 解析所有已安装bundles的名称:

	$names = Bundle::names();

<a name="bundle-assets"></a>
## Bundle Assets

如果你的bundle包含视图， 很可能你有JavaScript和图片这样的assets，需要在 **public** 目录中可访问。 没问题。 只需要在你的bundle里创建**public**文件夹，然后把所有assets放进这个文件夹里就可以了。


很棒！ 但是，它们如何进入application的**public** 文件夹呢。 Laravel的"Artisan"命令行工具提供了简单的命令行指令来复制全部的bundle assets到public目录里。这样做：

#### 将 bundle assets 发布到 public 目录里:

	php artisan bundle:publish

这条命令会为bundle assets创建一个文件夹于application的**public/bundles**目录。 比如， 如果你的bundle名称叫做"admin"， 那么会创建一个 **public/bundles/admin** 文件夹， 它包括你bundles的public文件夹下全部的文件。

更多关于当处于public目录时，便利地获取bundle assets的路径的信息，请参考文档的[asset 管理](/docs/views/assets#bundle-assets)。

<a name="installing-bundles"></a>
## 安装 Bundles

当然，你可能总是会手动安装bundles；然而，"Artisan" CLI提供了极好的方式来安装和升级你的bundle。 这个框架使用了简单的Zip方式来解压安装你的bundle。 这样做：

#### 用Artisan来安装一个bundle:

	php artisan bundle:install eloquent

极好！ 现在你的bundle已经安装好了， 你可以[注册它](#registering-bundles) 以及 [发布它的 assets](#bundle-assets).

需要一份已有bundles的列表吗？ 逛逛Laravel的[bundle 目录](http://bundles.laravel.com)吧

<a name="upgrading-bundles"></a>
## 升级 Bundles

当你升级一个bundle的时候，Laravel会自动删除旧的bundle，然后安装一份新的拷贝。 

#### 用Artisan升级一个bundle:

	php artisan bundle:upgrade eloquent

> **注意:** 在升级bundle之后，你可能要 [重新发布它的 assets](#bundle-assets).

**重要:** 由于bundle在升级时被完全删除了，所以你必须注意你在bundle代码里做过的任何改变。 你可能需要改变一些bundle的配置。 与其直接修改bundle代码，不如使用bundle的start事件来设置它们。 在你的 **application/start.php** 文件中像这样写：

#### 监听一个bundle的启用事件:

	Event::listen('laravel.started: admin', function()
	{
		Config::set('admin::file.option', true);
	});