# 事件

## 内容

- [基础](#the-basics)
- [激活事件](#firing-events)
- [监听事件](#listening-to-events)
- [排队事件](#queued-events)
- [Laravel 事件](#laravel-events)

<a name="the-basics"></a>
## 基础

事件可以提供一种很好的方法来建立de-coupled应用程序， 允许插件来切换应用程序核心的同时无需修改其代码。

<a name="firing-events"></a>
## 激活事件

要激活一个事件， 只需要告诉 **Event** 类你要激活的事件名称即可。 

#### 激活一个事件:

	$responses = Event::fire('loaded');

注意我们将**fire** 方法的结果赋值为一个变量。 这个方法会返回一个数组， 包括所有该事件监听器的响应。 


有时候你可能像要激活一个事件， 但只要获取首次响应即可。 那么这样做：

#### 激活一个时间， 解析首次的响应:

	$response = Event::first('loaded');

> **注意:** **first** 方法仍旧会激活监听该事件的处理器， 但只会返回首次响应。

**Event::until** 方法会执行事件处理器， 直到返回非null的响应。

#### 激活一个事件，直到收到第一个非null响应:

	$response = Event::until('loaded');

<a name="listening-to-events"></a>
## 监听事件

那么，如果没人在监听，事件有什么用呢？ 这样来注册一个当事件激活时，会调用的事件处理器。

#### 注册一个事件处理器:

	Event::listen('loaded', function()
	{
		// 在 "loaded" 事件发生时我会被执行!
	});

我们在这里提供给该方法的这个闭包会在每次"loaded"事件被激活时执行。 

<a name="queued-events"></a>
## 排队事件

有时候你可能想"queue"一个要激活的事件，而不是立马激活它。 那么就使用 `queue` 和 `flush` 方法。 首先，用一个独特的识别符抛出一个事件在一个给定的队列上。 

#### 注册一个队列事件:

	Event::queue('foo', $user->id, array($user));

这个方法接受三个参数。 第一个参数是队列的名称， 第二个参数是为这个队列项目而设置的独特的识别符，第三个参数是传递给队列flusher的数据数组。 

下面，我们会为`foo`队列注册一个flusher：

#### 注册一个事件 flusher:

	Event::flusher('foo', function($key, $user)
	{
		//
	});

注意， 事件flusher接受两个参数。 第一个参数， 是队列事件的独特的识别符， 这个例子里就是用户的ID。 第二个参数（以及其他的参数）是该队列事件负载的项目。 

最后， 我们可以运行我们的flusher， 使用`flush` 方法把所有队列事件都flush掉：

	Event::flush('foo');

<a name="laravel-events"></a>
## Laravel 事件

Laravel内核激活了几个事件。 它们是：

#### 当启用一个bundle的时候激活的事件:

	Event::listen('laravel.started: bundle', function() {});

#### 当数据库查询被执行的时候激活的事件:

	Event::listen('laravel.query', function($sql, $bindings, $time) {});

#### 当响应被发送至浏览器之前激活的事件:

	Event::listen('laravel.done', function($response) {});

#### 当使用Log类日志一条消息时激活的事件:

	Event::listen('laravel.log', function($type, $message) {});