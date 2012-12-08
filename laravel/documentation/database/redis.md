# Redis

## 内容

- [基础](#the-basics)
- [配置](#config)
- [用法](#usage)

<a name="the-basics"></a>
## 基础

[Redis](http://redis.io)是一个开源、先进的键-值存储。 它被经常当做一种数据结构服务器， 因为键可以包含[strings](http://redis.io/topics/data-types#strings), [hashes](http://redis.io/topics/data-types#hashes), [lists](http://redis.io/topics/data-types#lists), [sets](http://redis.io/topics/data-types#sets), 和 [sorted sets](http://redis.io/topics/data-types#sorted-sets)。 

<a name="config"></a>
## 配置

你应用程序的Redis配置存储在 **application/config/database.php** 文件。 在这个文件里， 你会看到一个 **redis** 数组， 它包含你应用程序使用的Redis服务器。 

	'redis' => array(

		'default' => array('host' => '127.0.0.1', 'port' => 6379),

	),

默认的服务器配置应该满足你的开发了。 不过， 你也可以根据你的环境自由修改该数组。 只需要简单地给每个Redis服务器一个名称， 并指定服务器使用的host和port即可。 

<a name="usage"></a>
## 用法

你可以通过调用 **Redis** 类的 **db** 方法来获取一个Redis实例：

	$redis = Redis::db();

这会给你 **default** Redis服务器的实例。 你可以给该**db** 方法传递一个服务器名称来获取一个特定的服务器，正如在你Redis配置里定义的一样：

	$redis = Redis::db('redis_2');

棒！ 现在我们有了两个Redis客户端实例， 我们可以issue任何[Redis 命令](http://redis.io/commands) 给该实例。 Laravel使用魔术方法来传递命令至Redis服务器：

	$redis->set('name', 'Taylor');

	$name = $redis->get('name');

	$values = $redis->lrange('names', 5, 10);

请注意， comment的参数只是被简单传递进了魔术方法里。 当然， 你不用非得使用魔术方法， 你还可以使用 **run** 方法来传递命令至服务器：

	$values = $redis->run('lrange', array(5, 10));

只想要在默认的Redis服务器执行命令吗？ 你可以只使用Redis类的 static 魔术方法：

	Redis::set('name', 'Taylor');

	$name = Redis::get('name');

	$values = Redis::lrange('names', 5, 10);

> **注意:** Redis [cache](/docs/cache/config#redis) 和 [session](/docs/session/config#redis) 启动器在Laravel里都包括了.