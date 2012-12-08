# 类自动加载

## 内容

- [基础](#the-basics)
- [注册目录](#directories)
- [注册映射](#mappings)
- [注册命名空间](#namespaces)

<a name="the-basics"></a>
## 基础

自动加载允许你懒惰地加载类文件，只要它们需要，就无需明确*requiring* 或 *including* 它们。 所以，只要是你实际需要的类，你就只需跳过加载步骤，直接使用即可。

默认地， **models** 和 **libraries**目录在**application/start.php**文件里由auto-loader注册。 加载器使用了类-文件名的共识，所有文件名都是小写。 比如， 一个位于models目录下的"User"类应该有一个"user.php"的文件。 你还可以用子目录嵌套类。 只需要将类的命名空间匹配目录结构即可。 因此， 一个"Entities\User"类就在models目录下有一个叫做"entities/user.php"的文件名。

<a name="directories"></a>
## 注册目录

正如上面提及的，models和libraries目录默认由auto-loader所注册好了； 然而，你还可以注册任何你想要的目录，只要满足同样的类-文件名的共识即可：

#### 用auto-loader注册目录:

	Autoloader::directories(array(
		path('app').'entities',
		path('app').'repositories',
	));

<a name="mappings"></a>
## 注册映射

有时你也许想要手动映射一个类至它有关的文件。 这是最优雅的加载类的方法：

#### 用auto-loader注册一个类和文件的映射:

	Autoloader::map(array(
		'User'    => path('app').'models/user.php',
		'Contact' => path('app').'models/contact.php',
	));

<a name="namespaces"></a>
## 注册命名空间

许多第三方类库使用了PSR-0标准作为他们的结构。 PSR-0 规定类名称应该和它们的文件名匹配， 目录结构由命名空间指明。 如果你使用的是一个PSR-0类库， 那么只要用auto-loader注册它的根命名空间和目录即可：

#### 用auto-loader注册一个命名空间:

	Autoloader::namespaces(array(
		'Doctrine' => path('libraries').'Doctrine',
	));

在PHP拥有命名空间以前， 许多项目使用下划线来指明目录结构。 如果你使用的是这些遗物类库， 你仍旧可以简单地用auto-loader注册它。 比如，如果你使用了SwiftMailer， 你可能会注意到所有类都以 "Swift_" 开头。 因此， 我们就用auto-loader注册"Swift"为下划线项目的根。

#### 用auto-loader注册一个"下划线"类库:

	Autoloader::underscored(array(
		'Swift' => path('libraries').'SwiftMailer',
	));