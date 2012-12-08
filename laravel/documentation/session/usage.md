# Session 用法

## 内容

- [存储项目](#put)
- [解析项目](#get)
- [删除项目](#forget)
- [重新生成](#regeneration)

<a name="put"></a>
## 存储项目

要在session里存储项目，请调用Session类的put方法：


	Session::put('name', 'Taylor');

第一个参数是 session 项目的 **key**。 你要使用这个key来解析来自session的项目。 第二个参数是项目的 **value**。

**flash** 方法则会在session里存储一个当下次请求时就会过期的项目。 对于存储临时的状态或错误消息，这很有用：

	Session::flash('status', 'Welcome Back!');

<a name="get"></a>
## 解析项目

你可以使用Session类的  **get** 方法来解析任何session里的项目， 包括flash数据。 只需传递你要解析的项目的key即可：

	$name = Session::get('name');

默认地， 如果不存在该session项目就会返回NULL。 但你可以给该方法传递第二个参数作为默认值：

	$name = Session::get('name', 'Fred');

	$name = Session::get('name', function() {return 'Fred';});

现在， 当session里不存在 "name" 项目时， 就会返回 "Fred"。

Laravel设置提供了简单的方法来判断session项目是否存在， 请使用 **has** 方法：

	if (Session::has('name'))
	{
	     $name = Session::get('name');
	}

<a name="forget"></a>
## 删除项目

要删除一个来自session的项目，请使用 Session 类的  **forget** 方法：

	Session::forget('name');

你甚至可以删除所有session里的项目， 请使用 **flush** 方法： 

	Session::flush();

<a name="regeneration"></a>
## 重新生成

有时候你会想要"regenerate" session ID。 这意味着session会被赋值一个新的、随机的session ID。 下面是如何做：

	Session::regenerate();