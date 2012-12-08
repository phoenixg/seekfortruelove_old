# Fluent 查询构建器

## 内容

- [基础](#the-basics)
- [解析记录](#get)
- [建立where语句](#where)
- [嵌套Where语句](#nested-where)
- [动态Where语句](#dynamic)
- [数据表Joins](#joins)
- [排序结果](#ordering)
- [Skip & Take](#limit)
- [聚合](#aggregates)
- [Expressions](#expressions)
- [插入记录](#insert)
- [更新记录](#update)
- [删除记录](#delete)

## 基础

Fluent查询构建器是Laravel的强大的fluent接口， 用于构建SQL语句， 处理数据库。 所有查询都用prepared语句处理过， 以防止SQL注入。 

你可以使用DB类的**table** 方法开始一个fluent查询。 只需要提到你要查询的数据表名称即可：

	$query = DB::table('users');

现在你已经拥有了"users"数据表的fluent查询构建器， 用这个查询构建器， 你可以解析、插入、更新或删除该数据表的记录。 

<a name="get"></a>
## 解析记录

#### 从数据库中解析一个记录数组:

	$users = DB::table('users')->get();

> **注释:** **get** 方法返回带有跟数据表字段关联的含属性的对象数组.

#### 从数据库中解析一个单条记录:

	$user = DB::table('users')->first();
	
#### 根据主键解析一个单条记录:

	$user = DB::table('users')->find($id);

> **注释:** 如果没有找到结果， **first** 方法会返回 NULL。 **get** 方法会返回空数组。

#### 从数据库中解析单个字段的值:

	$email = DB::table('users')->where('id', '=', 1)->only('email');

#### 只查出数据库中特定的字段:

	$user = DB::table('users')->get(array('id', 'email as user_email'));

#### 从数据库中查出不重复的结果:

	$user = DB::table('users')->distinct()->get();

<a name="where"></a>
## 建立where语句

### where 和 or\_where

建立where语句的时候，我们提供了几种方法来帮助你。 最基本的方法是 **where** 和 **or_where**。 这样使用：

	return DB::table('users')
		->where('id', '=', 1)
		->or_where('email', '=', 'example@gmail.com')
		->first();

当然， 简单检查相等性远远不够。 你还需要使用 **greater-than**, **less-than**, **not-equal**, 和 **like**:

	return DB::table('users')
		->where('id', '>', 1)
		->or_where('name', 'LIKE', '%Taylor%')
		->first();

正如你可能假设的，  **where** 方法会使用AND条件添加查询， 而 **or_where** 方法则会使用OR条件。 

### where\_in, where\_not\_in, or\_where\_in, 和 or\_where\_not\_in

这一套 **where_in** 方法允许你简单构建查询数组的查询：

	DB::table('users')->where_in('id', array(1, 2, 3))->get();

	DB::table('users')->where_not_in('id', array(1, 2, 3))->get();

	DB::table('users')
		->where('email', '=', 'example@gmail.com')
		->or_where_in('id', array(1, 2, 3))
		->get();

	DB::table('users')
		->where('email', '=', 'example@gmail.com')
		->or_where_not_in('id', array(1, 2, 3))
		->get();

### where\_null, where\_not\_null, or\_where\_null, 和 or\_where\_not\_null

这一套**where_null** 方法使得NULL检查变得小菜一碟：

	return DB::table('users')->where_null('updated_at')->get();

	return DB::table('users')->where_not_null('updated_at')->get();

	return DB::table('users')
		->where('email', '=', 'example@gmail.com')
		->or_where_null('updated_at')
		->get();

	return DB::table('users')
		->where('email', '=', 'example@gmail.com')
		->or_where_not_null('updated_at')
		->get();

<a name="nested-where"></a>
## 嵌套Where语句

你可能发现了组合查询的需要。 只需要把一个闭包作为参数传递给**where** 或 **or_where** 方法即可：

	$users = DB::table('users')
		->where('id', '=', 1)
		->or_where(function($query)
		{
			$query->where('age', '>', 25);
			$query->where('votes' '>', 100);
		})
		->get();

这个例子会生成像这样的查询语句：

	SELECT * FROM "users" WHERE "id" = ? OR ("age" > ? AND "votes" > ?)

<a name="dynamic"></a>
## 动态Where查询

动态where查询是增强代码可读性的极好的方法。 下面是一些例子：

	$user = DB::table('users')->where_email('example@gmail.com')->first();

	$user = DB::table('users')->where_email_and_password('example@gmail.com', 'secret');

	$user = DB::table('users')->where_id_or_name(1, 'Fred');


<a name="joins"></a>
## 数据表Joins

需要join其他数据表吗？ 试试 **join** 和 **left\_join** 方法吧：

	DB::table('users')
		->join('phone', 'users.id', '=', 'phone.user_id')
		->get(array('users.email', 'phone.number'));

你想要join的 **table** 被作为第一个参数传递。 剩下的三个参数被用作构建join的 **ON** 语句。 

一旦你知道如何使用join方法， 你就知道了如何使用 **left_join**。 该方法使用方法一样：

	DB::table('users')
		->left_join('phone', 'users.id', '=', 'phone.user_id')
		->get(array('users.email', 'phone.number'));

你还可以为一条**ON**语句指定多个条件， 只要传递一个闭包给join的第二个参数：

	DB::table('users')
		->join('phone', function($join)
		{
			$join->on('users.id', '=', 'phone.user_id');
			$join->or_on('users.id', '=', 'phone.contact_id');
		})
		->get(array('users.email', 'phone.numer'));

<a name="ordering"></a>
## 排序结果

你可以使用**order_by**方法轻松排序你的查询结果。 只需要简单提到排序字段和排序方向（desc或asc）即可：

	return DB::table('users')->order_by('email', 'desc')->get();

当然， 你可能想要排序多个字段：

	return DB::table('users')
		->order_by('email', 'desc')
		->order_by('name', 'asc')
		->get();

<a name="limit"></a>
## Skip & Take

如果你想要 **LIMIT** 返回的结果集， 你可以使用  **take** 方法：

	return DB::table('users')->take(10)->get();

要设置查询的 **OFFSET**， 使用 **skip** 方法：

	return DB::table('users')->skip(10)->get();

<a name="aggregates"></a>
## 聚合

需要获取一个 **MIN**, **MAX**, **AVG**, **SUM**, 或 **COUNT**值吗？ 只需要传递给查询该字段即可：

	$min = DB::table('users')->min('age');

	$max = DB::table('users')->max('weight');

	$avg = DB::table('users')->avg('salary');

	$sum = DB::table('users')->sum('votes');

	$count = DB::table('users')->count();

当然， 你会想要使用一条WHERE语句先来限制一下查询：

	$count = DB::table('users')->where('id', '>', 10)->count();

<a name="expressions"></a>
## 表达式

有时候你会希望设置字段的值为一个SQL函数， 比如 **NOW()**。 通常一个对于now()的引用会自动被quoted 和 escaped。 为了避免这个发生， 请使用 **DB**类的 **raw** 方法。 这么做：

	DB::table('users')->update(array('updated_at' => DB::raw('NOW()')));

**raw**方法告诉查询来注入表达式内容， 将其当做字符串而非捆绑的参数。 比如， 你可以使用表达式来增加字段值：

	DB::table('users')->update(array('votes' => DB::raw('votes + 1')));

当然， 便利的方法也提供给了 **increment** 和 **decrement**：

	DB::table('users')->increment('votes');

	DB::table('users')->decrement('votes');

<a name="insert"></a>
## 插入记录

插入方法期待一个用来插入的数组。 该插入方法会返回true或false， 指明查询是否成功：

	DB::table('users')->insert(array('email' => 'example@gmail.com'));

想插入一条拥有自增量ID的记录吗？ 你可以使用  **insert\_get\_id** 方法来插入一条记录，并解析该ID：

	$id = DB::table('users')->insert_get_id(array('email' => 'example@gmail.com'));

> **注意:** **insert\_get\_id** 方法会检查自增量的字段是不是叫做 "id".

<a name="update"></a>
## 更新记录

要更新记录， 只需要传递给 **update** 方法一个数组：

	$affected = DB::table('users')->update(array('email' => 'new_email@gmail.com'));

当然， 当你只想要更新一些记录时， 你应该在调用update方法之前添加一个WHERE语句：

	$affected = DB::table('users')
		->where('id', '=', 1)
		->update(array('email' => 'new_email@gmail.com'));

<a name="delete"></a>
## 删除记录

当你想要删除数据库中的记录时， 简单调用 **delete** 方法：

	$affected = DB::table('users')->where('id', '=', 1)->delete();

想要快速地通过ID删除一条记录吗？ 没问题。 只需要给delete方法传递该ID即可：

	$affected = DB::table('users')->delete(1);