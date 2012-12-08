# Cache 配置

## 内容

- [基础](#the-basics)
- [数据库](#database)
- [Memcached](#memcached)
- [Redis](#redis)
- [Cache 键](#keys)
- [内存中的 Cache](#memory)

<a name="the-basics"></a>
## 基础

想象一下你的应用程序要显示由用户投票出来的最受欢迎的十首歌曲。 难道每个用户访问你站点时，你都要查找一遍这十首歌曲吗？ 如果你能够10分钟存储一次， 或者1小时存储一次结果呢？这样你的应用程序会急剧加速。 Laravel的缓存让这变得简单。

Laravel默认提供了以下五种缓存驱动器：

- 文件系统
- 数据库
- Memcached
- APC
- Redis
- 内存 (数组)

默认地， Laravel使用 **file** 系统作为缓存驱动器。无需配置， 即可使用。 文件系统驱动器会将缓存项目存储为文件， 存储在  **cache** 目录下。 如果你很满意这个驱动器， 就无需其他配置。 你可以开始使用它了。 

> **注意:** 在使用文件系统缓存驱动器之前， 请确保 **storage/cache** 目录可写.

<a name="database"></a>
## 数据库

数据库缓存驱动器使用了一张给定的数据表来作为简单的键-值存储。 为了启用， 首先要设置数据表的名称，在**application/config/cache.php**：

	'database' => array('table' => 'laravel_cache'),

下面， 在数据库里创建该表。 该数据表应该有三个字段：

- key (varchar)
- value (text)
- expiration (integer)

就这么简单。 一旦你的配置和数据表设置好了， 你就可以开始使用缓存了！

<a name="memcached"></a>
## Memcached

[Memcached](http://memcached.org) 是一个超快、开源的分布式内存对象缓存系统，它被Wikipedia和Facebook使用。 在使用Laravel的Memcached驱动器之前， 你应该需要安装和配置Memcached和PHP的Memcached扩展。

一旦你的服务器安装了Memcached， 你必须在 **application/config/cache.php** 文件中设置 **driver**：

	'driver' => 'memcached'

接着， 将Memcached服务器添加进 **servers** 数组：

	'servers' => array(
	     array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),
	)

<a name="redis"></a>
## Redis

[Redis](http://redis.io)是一个开源、先进的键-值存储。 它经常被当做数据结构服务器，因为它可以包括 [strings](http://redis.io/topics/data-types#strings), [hashes](http://redis.io/topics/data-types#hashes), [lists](http://redis.io/topics/data-types#lists), [sets](http://redis.io/topics/data-types#sets), 和 [sorted sets](http://redis.io/topics/data-types#sorted-sets)

在使用Redis缓存驱动器之前， 你必须 [配置Redis 服务器](/docs/database/redis#config)。 现在你可以只在 **application/config/cache.php** 文件里设置  **driver** 即可：

	'driver' => 'redis'

<a name="keys"></a>
### 缓存键

为了避免命名同其他使用APC、Redis或Memcached服务器的应用程序冲突， Laravel用这些驱动器给每一个存储在缓存里的项目添加了一个 **key**。 你可以随意改变这个值：

	'key' => 'laravel'

<a name="memory"></a>
### 内存中的缓存

"memory" 缓存驱动器并不会实际在磁盘上缓存任何东西。 它简单地在当前请求维护一份你的缓存的内部数组。 这使得独立于其他存储机制来为你的应用程序做单元测试变得很完美。 但是千万不要把它用作一个 "real" 缓存驱动器。  