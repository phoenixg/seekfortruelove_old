# Raw 查询

## 内容

- [基础](#the-basics)
- [其他查询方法](#other-query-methods)
- [PDO 连接](#pdo-connections)

<a name="the-bascis"></a>
## 基础

**query** 方法用来执行任意的、 raw SQL. 

#### 从数据库中查出记录:

	$users = DB::query('select * from users');

#### 从数据库中查出记录， 使用绑定:

	$users = DB::query('select * from users where name = ?', array('test'));

#### 在数据库中插入一条记录

	$success = DB::query('insert into users values (?, ?)', $bindings);

#### 更新数据表记录， 获取影响的记录行数:

	$affected = DB::query('update users set name = ?', $bindings);

#### 在数据库中删除一条记录， 获取影响的记录行数:

	$affected = DB::query('delete from users where id = ?', array(1));

<a name="other-query-methods"></a>
## 其他查询方法

Laravel提供了一些其他的方法来查询数据库， 下面看看：

#### 运行一个SELECT查询， 返回第一个结果:

	$user = DB::first('select * from users where id = 1');

#### 运行一个SELECT查询， 获取单个字段的值:

	$email = DB::only('select email from users where id = 1');

<a name="pdo-connections"></a>
## PDO 连接

有时候你会想访问Laravel连接对象背后的raw PDO连接。

#### 获取数据库的 raw PDO 连接：

	$pdo = DB::connection('sqlite')->pdo;

> **注意:** 如果没有指定连接名称， 就会返回**default**连接名称。 