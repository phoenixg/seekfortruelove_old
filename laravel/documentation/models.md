# 模型 & 类库

## 内容

- [模型](#models)
- [类库](#libraries)
- [自动加载](#auto-loading)
- [最佳实践](#best-practices)

<a name="models"></a>
## 模型

模型是应用程序的心脏。 你的应用程序逻辑（控制器 / 路由） 和视图（html）仅仅是用户和你的模型交互的中间媒介。 模型中包含的最典型的逻辑的类型是[业务逻辑](http://en.wikipedia.org/wiki/Business_logic)。

*模型中存在的功能的一些例子:*

- 数据库交互
- 文件读写（I/O）
- 同Web Services交互

比如，也许你正在写一个博客程序。 你很可能想要有一个"Post"模型。 用户想要对posts做评论，所以你还要一个"Conmment"模型。 如果有要做评论的用户，那么你还要一个"User"模型。 明白了吗？

<a name="libraries"></a>
## 类库

类库是执行应用程序里没有特殊指定的任务的类。 比如， 一个PDF生成类会转换HTML。 这样的任务，尽管复杂，但是没有在应用程序里指定的， 所以要考虑做成一个"library"。

创建一个类库和在libraries目录里创建并存储一个类一样简单。 下面的例子，我们创建了一个简单的类，有一个方法，echo一些你传递给它的文本。 我们在libraries目录里创建**printer.php**文件，代码如下：

	<?php

	class Printer {

		public static function write($text) {
			echo $text;
		}
	}

你现在可以在应用程序的任何地方调用Printer::write('这些文本是通过write方法打印出来的！')。

<a name="auto-loading"></a>
## 自动加载

类库和模型之所以非常易于使用，这要感谢Laravel的自动加载器。 获取更多关于自动加载器的信息，见文档的 [自动加载器](/docs/loading)。

<a name="best-practices"></a>
## 最佳实践

我们都听过这样的话:"控制器要瘦！" 但是，我们在现实中要如何做呢？ 问题很可能出在"model"。 这表示什么呢？ 这是不是一个有用的术语？ 许多跟"database"打交道的"model"，都会导致控制器变得臃肿，因而使用轻量的model访问数据库。 让我们看看还有什么其他途径。

要是我们完全报废"models"目录会如何？ 我们将之命名为一些其他有用的东西。 事实上，我们就把它命名成application好了。 也许我们的卫星跟踪站点叫做"Trackler"， 于是我们创建了一个"trackler"目录，里面有application目录。

很好！ 下一步，我们把类分成"entities", "services", and "repositories"。 于是，我们将在"trackler"目录下为他们的每一个创建三个目录。 我们看看每个：

### Entities

把entities想象成应用程序的数据容器。 他们主要就是包含属性而已。 所以，我们的应用程序里，可以有一个"Location" entity， 它有一个"latitude"和"longitude"属性。 像这样：

	<?php namespace Trackler\Entities;
	
	class Location {

		public $latitude;
		public $longitude;

		public function __construct($latitude, $longitude)
		{
			$this->latitude = $latitude;
			$this->longitude = $longitude;
		}

	}

看上去不错。 现在我们有两个一个entity， 让我们再来探索下其他两个文件夹。

### Services

Services包含了应用程序的*processes*。 所以，让我们继续使用Trackler这个例子。 我们的应用程序也许有一个表单，用户会输入它们的GPS位置信息。 然而，我们需要验证它们格式是否正确。 我们需要*validate* 这个*location entity*。 所以，在我们的"services"目录里，我们可以在下面的类里创建一个"validators"文件夹：


	<?php namespace Trackler\Services\Validators;

	use Trackler\Entities\Location;

	class Location_Validator {

		public static function validate(Location $location)
		{
			// Validate the location instance...
		}

	}

棒极了！ 现在我们有了独立于控制器和路由的测试验证的方法！ 所以，我们验证了位置，我们现在要准备存储它了。 我们要怎么做呢？

### Repositories

Repositories是应用程序数据访问层。 它们负责存储和解析应用程序的*entities*。 所以，我们继续使用我们的*location* entity。 我们需要位置repository来存储它们。 我们可以使用我们想要的机制来存储它们， 要么是关系型逐句哭，Redis，或下一代的存储方法。 我们看看例子：

	<?php namespace Trackler\Repositories;

	use Trackler\Entities\Location;

	class Location_Repository {

		public function save(Location $location, $user_id)
		{
			// Store the location for the given user ID...
		}

	}

现在我们干净地区分了应用程序entities, services, and repositories。 这意味着我们可以注入一些repositories进services或控制器，然后独立于数据库得测试应用程序中的一个片段。 而且，我们可以完全地切换存储方式，而无需影响我们的services, entities, 或控制器。 我们完成了一个优良的*关注点分离*。

*更多阅读:*

- [IoC 容器](/docs/ioc)