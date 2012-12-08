# 建立 HTML

## 内容

- [实体（Entities）](#entities)
- [脚本和样式表](#scripts-and-style-sheets)
- [链接](#links)
- [链接至命名路由](#links-to-named-routes)
- [链接至控制器actions](#links-to-controller-actions)
- [Mail-To 链接](#mail-to-links)
- [图片](#images)
- [列表](#lists)
- [自定义宏](#custom-macros)

<a name="entities"></a>
## 实体（Entities）

当你在视图里显示用户输入的时候，很重要的是，转换所有字符为HTML的"entity"表达形式。

比如， < 符号应该被转换成实体表达。 转换HTML字符串为实体帮助保护你的应用程序避免跨站脚本攻击：

#### 转换字符串为实体:

	echo HTML::entities('<script>alert('hi');</script>');

#### 使用 "e" 全局辅助函数:

	echo e('<script>alert('hi');</script>');

<a name="scripts-and-style-sheets"></a>
## 脚本和样式表

#### 生成一个指向JavaScript文件的引用:

	echo HTML::script('js/scrollTo.js');

#### 生成一个指向CSS文件的引用:

	echo HTML::style('css/common.css');

#### 生成一个指向给定media type的CSS文件的引用:

	echo HTML::style('css/common.css', 'print');

*更多阅读:*

- *[管理 Assets](/docs/views/assets)*

<a name="links"></a>
## 链接

#### 生成一个来自URI的链接:

	echo HTML::link('user/profile', 'User Profile');

#### 生成一个使用HTTPS的链接:

	echo HTML::secure_link('user/profile', 'User Profile');

#### 生成一个指定额外HTML属性的链接:

	echo HTML::link('user/profile', 'User Profile', array('id' => 'profile_link'));

<a name="links-to-named-routes"></a>
## 链接至命名路由

#### 生成一个指向命名路由的链接:

	echo HTML::link_to_route('profile');

#### 生成一个指向使用了通配符值的命名路由的链接:

	$url = HTML::link_to_route('profile', array($username));

*更多阅读:*

- *[命名路由](/docs/routing#named-routes)*

<a name="links-to-controller-actions"></a>
## 链接至控制器actions

#### 生成一个指向控制器action的链接:

	echo HTML::link_to_action('home@index');

### 生成一个指向使用了通配符值的控制器action的链接:

	echo HTML::link_to_action('user@profile', array($username));

<a name="mail-to-links"></a>
## Mail-To 链接

HTML类的"mailto"方法会混淆给定的e-mail地址，以免被机器人嗅探到。

#### 创建一个 mail-to 链接:

	echo HTML::mailto('example@gmail.com', 'E-Mail Me!');

#### 创建一个使用e-mail地址为链接文本的 mail-to 链接:

	echo HTML::mailto('example@gmail.com');

<a name="images"></a>
## 图片

#### 生成一个HTML图片标签:

	echo HTML::image('img/smile.jpg', $alt_text);

#### 生成一个带有额外HTML属性的图片标签:

	echo HTML::image('img/smile.jpg', $alt_text, array('id' => 'smile'));

<a name="lists"></a>
## 列表

#### 从数组元素创建列表:

	echo HTML::ol(array('Get Peanut Butter', 'Get Chocolate', 'Feast'));

	echo HTML::ul(array('Ubuntu', 'Snow Leopard', 'Windows'));

<a name="custom-macros"></a>
## 自定义宏

定义你自己的HTML类辅助函数叫做"macros"。下面是它如何工作的。 首先，只需要用给定的名称和一个闭包注册这个宏即可。

#### 注册一个HTML宏:

	HTML::macro('my_element', function()
	{
		return '<article type="awesome">';
	});

现在你就可以用它的名称来调用这个宏了:

#### 调用一个自定义的HTML宏:

	echo HTML::my_element();
