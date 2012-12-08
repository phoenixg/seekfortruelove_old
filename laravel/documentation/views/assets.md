# 管理 Assets

## 内容

- [注册 Assets](#registering-assets)
- [Dumping Assets](#dumping-assets)
- [Asset 依赖性](#asset-dependencies)
- [Asset 容器](#asset-containers)
- [Bundle Assets](#bundle-assets)

<a name="registering-assets"></a>
## 注册 Assets

**Asset**类提供了简单的方式来管理你的CSS和JavaScript。 要注册一个asset，只需要在**Asset** 类调用**add**方法：

#### 注册一个asset:

	Asset::add('jquery', 'js/jquery.js');

**add**方法接受三个参数。 第一个参数是asset的名称， 第二个参数是asset的相对于**public**目录的路径， 第三个参数是asset独立性列表（这个后面会更详细介绍）。注意，我们没有告诉这个方法我们注册的是JavaScript 还是 CSS。 **add**方法会使用文件扩展名来判断我们注册的文件类型。


<a name="dumping-assets"></a>
## Dumping Assets

当你准备在视图里放置指向注册的assets的链接的时候，你要使用**styles**或**scripts**方法：

#### Dumping assets 至视图:

	<head>
		<?php echo Asset::styles(); ?>
		<?php echo Asset::scripts(); ?>
	</head>

<a name="asset-dependencies"></a>
## Asset 依赖性

有时候你需要指定asset的依赖性。 这意味着asset要求其他asset在视图里声明后它才可以被声明。 在Laravel里面，asset的依赖性管理变得不能再容易了。 还记得你给assets取的"names"吗？ 你可以把它传递为 **add** 方法的第三个参数来声明依赖性：

#### 注册拥有依赖性的bundle:

	Asset::add('jquery-ui', 'js/jquery-ui.js', 'jquery');

这个例子中，我们注册了**jquery-ui** asset， 并指定了它依赖于**jquery** asset。 现在， 当你在视图里放置asset链接时， jQuery asset会总是在jQuery UI asset之前声明。 需要声明不只一个依赖性吗？ 没问题：

#### 注册拥有多个依赖性的asset:

	Asset::add('jquery-ui', 'js/jquery-ui.js', array('first', 'second'));

<a name="asset-containers"></a>
## Asset 容器

要改进响应时间，常见的做法是在HTML文档底部放置JavaScript。 但是，如果你还需要在文档头部放置一些assets该怎么办？ 没问题。 asset类提供了简单的方式来管理asset **containers**。 只需调用Asset类的**container**方法，告诉它container名称即可。 一旦你有了一个container实例， 你就可以用同样的语法随意添加任何assets至container了：

#### 解析asset容器的实例:

	Asset::container('footer')->add('example', 'js/example.js');

#### Dumping 那个来自给定container的 assets:

	echo Asset::container('footer')->scripts();

<a name="bundle-assets"></a>
## Bundle Assets

在学习如何便利地add和dump bundle assets之前，你要阅读下 [创建和发布 bundle assets](/docs/bundles#bundle-assets).

当注册assets的时候， 路径通常是相对于**public**目录的。 然而，在处理bundle assets的时候这会带来不便， 因为它们在**public/bundles** 目录下面。 但是，记住， Laravel是为了让你变得更轻松而诞生的。 所以，简单指定Asset container正在管理的是什么bundle即可。

#### 指定asset container正在管理的bundle:

	Asset::container('foo')->bundle('admin');

现在，当你add一个asset的时候， 你可以使用相对于bundle的public目录的路径了。 Laravel会自动生成正确的完整路径。