# 缓存用法

## 内容

- [存储项目](#put)
- [解析项目](#get)
- [删除项目](#forget)

<a name="put"></a>
## 存储项目

要存储项目进缓存非常容易。 简单的在Cache类上调用 **put** 方法即可：

	Cache::put('name', 'Taylor', 10);

第一个参数是cache项目的 **key**。 你将使用该key来解析来自cache的项目。 第二个参数是该项目的 **value**。 第三个参数是你想要缓存项目的**minutes**数。

如果你不想要缓存过期， 你还可以将它 "forever" 缓存起来：

	Cache::forever('name', 'Taylor');

> **注意:** 当在缓存里存储对象的时候， 没有必要序列化它们.

<a name="get"></a>
## 解析项目

解析缓存中的项目比存储它们更加简单。 使用**get**方法即可。 只需要提到你想解析的项目的key即可：

	$name = Cache::get('name');

默认地， 如果缓存项目已过期或不存在会返回 NULL。 然而， 你可以传递给该方法另一个默认值作为第二个参数：

	$name = Cache::get('name', 'Fred');

现在， 如果 "name" 缓存项目已过期或不存在就会返回 "Fred"。 

如果一个缓存不存在时， 你需要来自数据库的值该怎么办呢？ 解决方法很简单。 你可以给  **get** 方法传递一个闭包作为默认值。 该闭包只有在缓存项目不存在时才会执行。 


	$users = Cache::get('count', function() {return DB::table('users')->count();});

让我们看一个更深的例子。 想象你想要为应用程序解析已注册的用户数量；然而， 如果值没有缓存起来， 你想要使用 **remember** 来存储缓存中的默认值：

	$users = Cache::remember('count', function() {return DB::table('users')->count();}, 5);

让我们来过一遍这个例子。 如果缓存中存在 **count** 项目， 它会被返回。 如果它不存在， 那么闭包中的结果会被存储在缓存中5分钟，**and** 由该方法返回。 很牛比，对不？

Laravel甚至给你提供了简单的方法来判断是否缓存项目存在， 请使用 **has** 方法：

	if (Cache::has('name'))
	{
	     $name = Cache::get('name');
	}

<a name="forget"></a>
## 删除项目

需要除掉一个项目吗？ 没问题。 只需提及该项目的名称即可， 使用 **forget** 方法： 

	Cache::forget('name');