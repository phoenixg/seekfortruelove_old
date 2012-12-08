# Laravel 文档

- [基础知识](#the-basics)
- [谁会享受Laravel？](#who-will-enjoy-laravel)
- [是什么让Laravel与众不同？](#laravel-is-different)
- [应用程序结构](#application-structure)
- [Laravel的社区](#laravel-community)
- [协议信息](#laravel-license)

<a name="the-basics"></a>
## 基础知识

欢迎查看Laravel文档。这份手册被设计成不仅是一个入门指南，也是一个特性参考文档。尽管你可以直接跳进某个部分进行学习，但我们建议你按着次序来阅读这份文档，因为这样你才能逐渐建立起一些后续文档中用到的概念。

<a name="who-will-enjoy-laravel"></a>
## 谁会享受Laravel？

Laravel是一个强大的框架，强调灵活性和表达性。Laravel的新用户会享受和其他轻量级和流行的框架中一样享受到的轻松。用户会赞赏这个框架用其他框架中没有的现代性编码方式。Laravel的灵活性允许你很好地组织、升级你的应用程序，而它的表达性允许你和你的团队以简明和易读的方式进行开发。


<a name="laravel-is-different"></a>
## 是什么让Laravel与众不同？

有许多Laravel和其他框架不同的地方。以下是一些我们认为必杀的优势：

- **Bundles** 是Laravel的模块管理系统。[Laravel Bundle Repository](http://bundles.laravel.com/) 总是提供了一些我们能添加进应用程序的特性。你可以下载一个bundle repository到你的bundles目录，或使用Artisan命令行工具来自动化安装。
- **Eloquent ORM** 是最先进的PHP ActiveRecord植入。它具备简单应用约束条件到处理包括关系（relationships）和嵌套的饥渴加载（nested eager-loading）的能力，你可以使用ActiveRecord的便利性，来完全掌握你的数据。 Eloquent原生支持所有来自Laravel的Fluent querty-builder的方法。
- **应用程序逻辑** 可以通过使用controller（网页开发者也许已经对此很熟悉了）被植入你的应用程序，或使用类似Sinatra框架的语法来直接进入route声明。 Laravel的设计哲学是给开发者提供从创建小型站点到大型企业应用的需要的灵活性。
- **反向路由** 允许你创建指向命名的路由的链接。 当创建链接的时候，只需使用route的名称，Laravel会自动插入正确的URI。 这允许你以后改变路由，而Laravel会自动更新全站所有有关的链接。
- **Restful 控制器** 是区分你是GET还是POST请求逻辑的可选方法。 比如登陆的例子，你的控制器的 get_login() 方法会显示表单，而你的控制器的 post_login() 方法则会接受提交上来的表单、验证，然后要么带错误信息重定向到登陆表单，要么重定向到你的用户的控制面板。
- **类自动加载** 让你可以免除不得不维护一个自动加载配置，以及加载不必要组件的烦恼。想要使用一个library或model吗？不用劳烦加载它了，直接使用它即可。 Laravel 会处理剩下的一切。
- **视图 Composers** 是当视图加载完毕后可以运行的代码段。 关于这个的好例子是博客中边缘导航栏视图里包括一份随机博客帖子的列表。 你的 composer 要包含加载博客帖子的逻辑，以便你可以加载视图，然后就完成了。 这让你得以免除不得不确保控制器加载了来自model的大量数据的烦恼，而这些数据跟页面的内容并无关系。
- **IoC 容器** (控制倒转，Inversion of Control) 给了你生成新对象，以及可选的实例化和引用单例的方法。 IoC 意味着你很少需要引导任何外部的libraries。 它还意味着你可以从代码的任何地方访问这些对象，而无需处理不灵活的单体结构。
- **移植（Migrations）** 是数据库schemas的版本控制，它们被整合进了Laravel。 你可以使用"Artisan"命令行套件来生成和运行移植。 一旦其他成员作了schema改变，你可以从repository中升级你的本地副本，执行移植。现在你也保持最新了！
- **单元测试** 是Laravel的重要组成部分。 Laravel 本身有几百个测试来帮助确保新做的改变不会破坏任何东西。 这是Laravel之所以广泛地能够在企业领域使用的原因之一。 Laravel还让你轻松地为你自己的代码撰写单元测试。 你可以使用"Artisan"命令行套件来运行测试。
- **自动分页** 让你免除很多分页配置的困扰。 与其放入当前页面，并且获取db记录总数，然后用limit/offset来选出你的数据，你现在只需要调用'paginate'，然后告诉Laravel要把分页链接放在视图的哪里即可。 Laravel 会自动处理剩下的一切。 Laravel的分页系统被设计成简单注入、简单改变。 还有一点很重要，Laravel可以把这些任务自动化完成，并不意味着你无法手动调用和配置这些系统，只要你愿意就可以。


这些仅仅是Laravel有别于其他PHP框架的一部分内容。 所有的特性都会在这份文档中说明。

<a name="application-structure"></a>
## 应用程序结构

Laravel's directory structure is designed to be familiar to users of other popular PHP frameworks. Web applications of any shape or size can easily be created using this structure similarly to the way that they would be created in other frameworks.

However due to Laravel's unique architecture, it is possible for developers to create their own infrastructure that is specifically designed for their application. This may be most beneficial to large projects such as content-management-systems. This kind of architectural flexibility is unique to Laravel.

Throughout the documentation we'll specify the default locations for declarations where appropriate.

<a name="laravel-community"></a>
## Laravel的社区

Laravel is lucky to be supported by rapidly growing, friendly and enthusiastic community. The [Laravel Forums](http://forums.laravel.com) are a great place to find help, make a suggestion, or just see what other people are saying.

Many of us hang out every day in the #laravel IRC channel on FreeNode. [Here's a forum post explaining how you can join us.](http://forums.laravel.com/viewtopic.php?id=671) Hanging out in the IRC channel is a really great way to learn more about web-development using Laravel. You're welcome to ask questions, answer other people's questions, or just hang out and learn from other people's questions being answered. We love Laravel and would love to talk to you about it, so don't be a stranger!

<a name="laravel-license"></a>
## 协议信息

Laravel is open-sourced software licensed under the [MIT License](http://www.opensource.org/licenses/mit-license.php).