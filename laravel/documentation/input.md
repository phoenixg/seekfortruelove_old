# 输入 & Cookies

## 内容

- [输入](#input)
- [JSON 输入](#json)
- [文件](#files)
- [老式输入](#old-input)
- [用老式输入重定向](#redirecting-with-old-input)
- [Cookies](#cookies)
- [合并 & 替换](#merge)

<a name="input"></a>
## 输入

**Input** 类处理来自你的应用程序的输入，即GET, POST, PUT, 或 DELETE 的请求。下面是一些如何使用Input类访问输入数据的方法:

#### 从输入数组中解析一个值:

	$email = Input::get('email');

> **注意:** "get" 方法可以用于所有请求类型(GET, POST, PUT, and DELETE) ， 而不仅仅是GET请求。

#### 从输入数组中解析全部值:

	$input = Input::get();

#### 解析包括$_FILES数组的全部输入:

	$input = Input::all();

默认地, 如果输入项目不存在， 就会返回 *null* 。 然而， 你可以在第二个参数里传递一个不同的默认值：

#### 如果请求输入项目不存在，就返回一个默认值:

	$name = Input::get('name', 'Fred');

#### 使用一个闭包来返回默认值:

	$name = Input::get('name', function() {return 'Fred';});

#### 判断输入内容是否包含给定的项目:

	if (Input::has('name')) ...

> **注意:** 如果输入项目为空字符串， 那么"has" 方法会返回 *false* 。

<a name="json"></a>
## JSON 输入

当你使用JavaScript MVC框架（比如Backbone.js）的时候，你需要获得来自应用程序post过来的JSON。 为了让你更轻省， 我们写了 `Input::json`方法：

#### 获取 JSON 输入:

	$data = Input::json();

<a name="files"></a>
## 文件

#### 返回来自 $_FILES 数组的全部项目:

	$files = Input::file();

#### 返回来自 $_FILES 数组的一个项目:

	$picture = Input::file('picture');

#### 返回来自 $_FILES 数组的特定项目:

	$size = Input::file('picture.size');

<a name="old-input"></a>
## 老式输入

通常，当非法内容提交时，你可能需要重新计算表单。 Laravel的Input类被设计成记忆这个问题。 你可以轻松地解析来自前一个请求的输入。 首先，你需要把输入数据flash进session里面：

#### Flashing 输入至session:

	Input::flash();

#### Flashing 选中的输入至session:

	Input::flash('only', array('username', 'email'));

	Input::flash('except', array('password', 'credit_card'));

#### 解析来自前一个请求的 flashed 输入项目:

	$name = Input::old('name');

> **注意:** 在使用"old"方法前， 你必须指定 session driver .

*更多阅读:*

- *[Sessions](/docs/session/config)*

<a name="redirecting-with-old-input"></a>
## 用老式输入重定向

现在你知道如何flash 输入进session了。 下面是一个捷径， 你可以用来防止不得不重新调整老式输入的方法：

#### 来自重定向实例的 Flashing 输入:

	return Redirect::to('login')->with_input();

#### 来自重定向实例的 Flashing 选中的输入:

	return Redirect::to('login')->with_input('only', array('username'));

	return Redirect::to('login')->with_input('except', array('password'));

<a name="cookies"></a>
## Cookies

Laravel提供了漂亮的对 $_COOKIE 数组的封装。 然而， 在用它之前， 你需要了解一些事情。 首先， Laravel 的所有cookie都包含一个"签名哈希"。 这使框架可以验证你的cookie在客户端没有被修改过。 其次， 当设置cookie的时候， cookie并非马上发送至浏览器， 而是放在池子里直到请求的最后才一起发送至浏览器。 这意味着你无法同时设置和解析你在同一个请求中的值。

#### 解析一个cookie值:

	$name = Cookie::get('name');

#### 如果请求的cookie不存在，就返回一个默认值:

	$name = Cookie::get('name', 'Fred');

#### 设置一个持续60分钟的cookie:

	Cookie::put('name', 'Fred', 60);

#### 创建一个持续5年的"永久" cookie :

	Cookie::forever('name', 'Fred');

#### 删除一个cookie:

	Cookie::forget('name');

<a name="merge"></a>
## 合并 & 替换

有时候你想合并或替换当前的输入。 这么做：

#### 用当前的输入来合并新的输入:

	Input::merge(array('name' => 'Spock'));

#### 用新的数据替换全部的输入数组:

	Input::merge(array('doctor' => 'Bones', 'captain' => 'Kirk'));