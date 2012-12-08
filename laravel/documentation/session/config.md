<a name="config"></a>
# Session 配置

## 目录

- [基础](#the-basics)
- [Cookie Sessions](#cookie)
- [文件系统 Sessions](#file)
- [数据库 Sessions](#database)
- [Memcached Sessions](#memcached)
- [Redis Sessions](#redis)
- [内存中 Sessions](#memory)

<a name="the-basics"></a>
## 基础

web是一个无状态环境。 这意味着每次针对你应用程序的请求都被当做跟之前一次请求无关的请求。 然而， **sessions** 允许你来为每位访问者存储任意数据。 这些session数据被存储在你的服务器上， 同时一个包含了一个 **session ID** 的cookie被存储在了访问者的机器上。 该cookie允许你的应用程序"remember" 那个用户的session，并解析跟应用程序请求相关的session数据。 

> **注意:** 在使用session之前，要确保应用程序key在 **application/config/application.php** 文件中已被指定.

原生自带六种session驱动器：

- Cookie
- 文件系统
- 数据库
- Memcached
- Redis
- 内存 (数组)

<a name="cookie"></a>
## Cookie Sessions

基于cookie的session提供了一种轻量、快速的机制来存储session信息。 它们也很安全。 每个cookie都通过强力 AES-256 加密方式来加密。 然而， cookie有着4kb的存储限制， 所以如果你想在session里存储更大的数据的话， 就要使用别的驱动器了。 

要启用cookie sessions， 只需在 **application/config/session.php** 文件里设置驱动器选项：

	'driver' => 'cookie'

<a name="file"></a>
## 文件系统 Sessions

大多数情况下， 你的应用程序会使用文件系统sessions来工作。然而，如果你的应用程序负载很大， 或者共享服务器， 那么请使用数据库或Memcached sessions。

要启用文件系统 sessions， 只需在 **application/config/session.php** 文件里设置驱动器选项：

	'driver' => 'file'

好了.这样就可以了!

> **注意:** 文件系统 sessions存储在  **storage/sessions** 目录，因此请确保其可写.

<a name="database"></a>
## 数据库 Sessions

要启用数据库 sessions， 你要先看看[配置你的数据库连接](/docs/database/config).

下一步， 你会需要创建一张session数据表。 下面是一些SQL语句，用来帮助你开始的。 然而， 你还可以使用Laravel的"Artisan"命令行工具来为你生成数据表！

### Artisan

	php artisan session:table

### SQLite

	CREATE TABLE "sessions" (
	     "id" VARCHAR PRIMARY KEY NOT NULL UNIQUE,
	     "last_activity" INTEGER NOT NULL,
	     "data" TEXT NOT NULL
	);

### MySQL

	CREATE TABLE `sessions` (
	     `id` VARCHAR(40) NOT NULL,
	     `last_activity` INT(10) NOT NULL,
	     `data` TEXT NOT NULL,
	     PRIMARY KEY (`id`)
	);

如果你想使用另外的数据表名称， 只需在 **application/config/session.php** 文件中改变 **table** 选项即可：

	'table' => 'sessions'

你现在所要做的就是只需在 **application/config/session.php** 文件中设置驱动器：

	'driver' => 'database'

<a name="memcached"></a>
## Memcached Sessions

在使用 Memcached sessions之前， 你需要 [配置你的Memcached服务器](/docs/database/config#memcached).

只需在 **application/config/session.php** 文件中设置驱动器：

	'driver' => 'memcached'

<a name="redis"></a>
## Redis Sessions

在使用Redis sessions之前， 你需要 [配置你的Redis服务器](/docs/database/redis#config).

只需在 **application/config/session.php** 文件中设置驱动器：

	'driver' => 'redis'

<a name="memory"></a>
## 内存中 Sessions

"memory" session驱动器只是简单地为当前请求使用了一个数组来存储你的session数据。 该驱动器在单元测试时非常有用， 因为在磁盘里没有写入什么东西。 它不应该被用作一个"real"场景下的session驱动器。