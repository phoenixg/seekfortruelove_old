# Schema 构建器

## 内容

- [基础](#the-basics)
- [创建 & 删除数据表](#creating-dropping-tables)
- [添加字段](#adding-columns)
- [删除字段](#dropping-columns)
- [添加索引](#adding-indexes)
- [删除索引](#dropping-indexes)
- [外键](#foreign-keys)

<a name="the-basics"></a>
## 基础

Schema构建器提供了创建、修改数据表的方法。 使用一种流畅的语法， 你无需使用SQL就可以处理数据表。 

*更多阅读:*

- [移植](/docs/database/migrations)

<a name="creating-dropping-tables"></a>
## 创建 & 删除数据表

**Schema** 类被用做创建和修改数据表。 让我们直接去看个例子：

#### 创建一个简单的数据表:

	Schema::create('users', function($table)
	{
		$table->increments('id');
	});

我们来解释下这个例子。 **create**方法告诉Schema构建器这是一张新表， 所以才能创建。 在第二个参数里， 我们传递了一个闭包， 它接受一个Table的实例。 使用这个Table对象， 我们可以流畅地添加和删除字段、索引。 

#### 删除一张表:

	Schema::drop('users');

#### 根据给定的数据库连接删除一张表:

	Schema::drop('users', 'connection_name');

有时候你会需要指定数据库连接， 好让schema操作特定的数据库。 

#### 指定要在哪里执行操作的连接:

	Schema::create('users', function($table)
	{
		$table->on('connection');
	});

<a name="adding-columns"></a>
## 添加字段

该流畅的数据表构建器的方法允许你不用使用特定的SQL就能添加字段。 我们看看这个方法：

Command  | Description
------------- | -------------
`$table->increments('id');`  |  Incrementing ID to the table
`$table->string('email');`  |  VARCHAR equivalent column
`$table->string('name', 100);`  |  VARCHAR equivalent with a length
`$table->integer('votes');`  |  INTEGER equivalent to the table
`$table->float('amount');`  |  FLOAT equivalent to the table
`$table->boolean('confirmed');`  |  BOOLEAN equivalent to the table
`$table->date('created_at');`  |  DATE equivalent to the table
`$table->timestamp('added_on');`  |  TIMESTAMP equivalent to the table
`$table->timestamps();`  |  Adds **created\_at** and **updated\_at** columns
`$table->text('description');`  |  TEXT equivalent to the table
`$table->blob('data');`  |  BLOB equivalent to the table
`->nullable()`  |  Designate that the column allows NULL values

> **注意:** Laravel 的 "boolean" 类型会映射到全部数据库系统的一个小整型字段.

#### 创建一个数据表并添加一个字段的例子

	Schema::table('users', function($table)
	{
		$table->create();
		$table->increments('id');
		$table->string('username');
		$table->string('email');
		$table->string('phone')->nullable();
		$table->text('about');
		$table->timestamps();
	});

<a name="dropping-columns"></a>
## 删除字段

#### 删除一张数据表里的一个字段:

	$table->drop_column('name');

#### 删除一张数据表里的几个字段:

	$table->drop_column(array('name', 'email'));

<a name="adding-indexes"></a>
## 添加索引

Schema构建器支持几种类型的索引。 有两种方式来添加索引。 每种索引类型都有自身的方法；然而， 你还可以流畅地在一行里定义一个索引为一个字段的addition。 我们看看：

#### 用一个索引流畅地创建一个字符串字段:

	$table->string('email')->unique();

如果你更喜欢在独立的一行上创建索引， 那么可以用这种例子：

Command  | Description
------------- | -------------
`$table->primary('id');`  |  Adding a primary key
`$table->primary(array('fname', 'lname'));`  |  Adding composite keys
`$table->unique('email');`  |  Adding a unique index
`$table->fulltext('description');`  |  Adding a full-text index
`$table->index('state');`  |  Adding a basic index

<a name="dropping-indexes"></a>
## 删除索引

要删除索引， 你必须指明索引名称。 Laravel为所有索引都赋了一个合适的名称。 简单包括了表名称和字段名称， 接着加上索引的类型。 我们看看一些例子：

Command  | Description
------------- | -------------
`$table->drop_primary('users_id_primary');`  |  Dropping a primary key from the "users" table
`$table->drop_unique('users_email_unique');`  |  Dropping a unique index from the "users" table
`$table->drop_fulltext('profile_description_fulltext');`  |  Dropping a full-text index from the "profile" table
`$table->drop_index('geo_state_index');`  |  Dropping a basic index from the "geo" table

<a name="foreign-keys"></a>
## 外键

使用Schema的流畅接口， 你可以简单地添加外键约束至你的数据表。 比如， 我们假设你的 **posts** 表里有一个**user_id**， 它会引用**users**表里的**id** 字段。 下面是如何为该字段添加外键约束的方法：

	$table->foreign('user_id')->references('id')->on('users');

你还可以为"on delete" 和 "on update" 行为指定外键选项：

	$table->foreign('user_id')->references('id')->on('users')->on_delete('restrict');

	$table->foreign('user_id')->references('id')->on('users')->on_update('cascade');

你还可以简单地删除外键约束。 默认的外键名称都遵循 [同样的共识](#dropping-indexes)，Schema构建器都采用该共识来创建其他的索引。 例子：

	$table->drop_foreign('posts_user_id_foreign');