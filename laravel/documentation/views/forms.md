# 建立表单

## 内容

- [打开表单](#opening-a-form)
- [CSRF 保护](#csrf-protection)
- [Labels](#labels)
- [Text, Text Area, Password & Hidden 字段](#text)
- [Checkboxes 和 Radio 按钮](#checkboxes-and-radio-buttons)
- [Drop-Down 列表](#drop-down-lists)
- [Buttons](#buttons)
- [自定义宏](#custom-macros)

> **注意:** 所有在表单元素里的输入数据都通过HTML::entities方法来过滤。

<a name="opening-a-form"></a>
## 打开表单

#### 打开表单，设置为POST至当前URL:

	echo Form::open();

#### 打开表单，使用给定的URI和请求方法:

	echo Form::open('user/profile', 'PUT');

#### 打开表单，POST至HTTPS URL:

	echo Form::open_secure('user/profile');

#### 打开表单，并指定额外的HTML属性:

	echo Form::open('user/profile', 'POST', array('class' => 'awesome'));

#### 打开表单，接受文件上传:

	echo Form::open_for_files('users/profile');

#### 打开表单，接受文件上传并使用HTTPS:

	echo Form::open_secure_for_files('users/profile');

#### 关闭表单:

	echo Form::close();

<a name="csrf-protection"></a>
## CSRF 保护

Laravel提供了简单的方法来保护应用程序避免跨站请求伪造。 首先， 在用户的session里放置一个随机的token。 它是自动完成的。 然后， 使用token方法来生成表单 hidden 字段的输入：

#### 生成包含session CSRF token的隐藏字段:

	echo Form::token();

#### 将CSRF过滤器添加至路由:

	Route::post('profile', array('before' => 'csrf', function()
	{
		//
	}));

#### 解析CSRF token字符串:

	$token = Session::token();

> **注意:** 在使用Laravel CSRF保护机制前， 你必须指定一个session驱动器。

*更多阅读:*

- [路由过滤器](/docs/routing#filters)
- [跨站请求伪造](http://en.wikipedia.org/wiki/Cross-site_request_forgery)

<a name="labels"></a>
## Labels

#### 生成一个 label 元素:

	echo Form::label('email', 'E-Mail Address');

#### 指定label的额外HTML属性:

	echo Form::label('email', 'E-Mail Address', array('class' => 'awesome'));

> **注意:** 在创建label之后， 任何你创建的表单元素，只要是匹配label名称的，都会自动接收同label名称一样的ID。

<a name="text"></a>
## Text, Text Area, Password & Hidden 字段

#### 生成一个text输入元素:

	echo Form::text('username');

#### 指定一个text输入元素的默认值:

	echo Form::text('email', 'example@gmail.com');

> **注意:** *hidden* 和 *textarea* 方法有和 *text* 方法一样的签名。 你用学一个的价钱一下子学了三个哦！

#### 生成一个password输入元素:

	echo Form::password('password');

<a name="checkboxes-and-radio-buttons"></a>
## Checkboxes 和 Radio Buttons

#### 生成一个 checkbox 输入元素:

	echo Form::checkbox('name', 'value');

#### 生成一个 checkbox ，默认选中:

	echo Form::checkbox('name', 'value', true);

> **注意:** *radio* 方法具有和*checkbox*方法一样的签名。又一下子学了两个哦！

<a name="drop-down-lists"></a>
## Drop-Down 列表

#### 从数组元素中生成一个 drop-down 列表:

	echo Form::select('size', array('L' => 'Large', 'S' => 'Small'));

#### 生成一个 drop-down 列表，默认选中一个项目:

	echo Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S');

<a name="buttons"></a>
## Buttons

#### 生成一个submit按钮元素:

	echo Form::submit('点击我!');

> **注意:** 需要创建一个button元素吗？ 试试看*button*方法。 它和*submit*方法一样哦。

<a name="custom-macros"></a>
## 自定义宏

It's easy to define your own custom Form class helpers called "macros". Here's how it works. First, simply register the macro with a given name and a Closure:

#### Registering a Form macro:

	Form::macro('my_field', function()
	{
		return '<input type="awesome">';
	});

Now you can call your macro using its name:

#### Calling a custom Form macro:

	echo Form::my_field();