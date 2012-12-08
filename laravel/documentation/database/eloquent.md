# Eloquent ORM

## 内容

- [基础](#the-basics)
- [共识](#conventions)
- [解析 Models](#get)
- [聚合](#aggregates)
- [插入 & 更新 Models](#save)
- [关系](#relationships)
- [插入关联的 Models](#inserting-related-models)
- [处理中介数据表](#intermediate-tables)
- [饥渴加载](#eager)
- [约束饥渴加载](#constraining-eager-loads)
- [Setter & Getter 方法](#getter-and-setter-methods)
- [大量赋值](#mass-assignment)
- [将 Models 转成数组](#to-array)

<a name="the-basics"></a>
## 基础

ORM 是一个 [对象-关系的映射](http://en.wikipedia.org/wiki/Object-relational_mapping)， Laravel有一个你会喜欢上的ORM。 它叫做"Eloquent"， 因为它允许你使用动人的、富有表达性的语法来处理你的数据库对象和关系。 总体来讲， 你应该为数据库的每张表定义一个Eloquent model。 要开始， 让我们定义一个简单的model：

	class User extends Eloquent {}

很好！ 请注意我们的model继承了  **Eloquent** 类。 该类会提供你需要用动人方式处理数据库的全部方法。 

> **注意:** 一般来讲， Eloquent models存储在 **application/models** 目录.

<a name="conventions"></a>
## 共识

Eloquent 对你的数据库结果做了几个基本假定：

- 每张表都应该有一个以 **id** 命名的主键
- 每张表名称都应该是其相应model名称的复数形式

有时候你想要使用一个数据表名称， 而不是model的复数形式。 没问题。 只需要在你的model里添加一个static **table** 属性：

	class User extends Eloquent {

	     public static $table = 'my_users';

	}

<a name="get"></a>
## 解析 Models

使用Eloquent来解析model非常容易。 最基本的解析一个Eloquent model的方法是static **find** 方法。 该方法会根据带属性的主键，相应于数据表的每个字段， 返回一个model：

	$user = User::find(1);

	echo $user->email;

该方法会执行像这样的查询语句：

	SELECT * FROM "users" WHERE "id" = 1

需要解析整个数据表吗？ 只需要使用static **all** 方法：

	$users = User::all();

	foreach ($users as $user)
	{
	     echo $user->email;
	}

当然， 解析整个数据表并不是很有帮助。 幸运的是，**fluent 查询构建器里的每个方法在 Eloquent里都可以使用** 。 只需要用一个static调用至 [查询构建器](/docs/database/query) 方法来开始查询你的model即可， 然后使用 **get** 或 **first**方法来执行查询。 get方法会返回models数组， first方法会返回单个model。


	$user = User::where('email', '=', $email)->first();

	$user = User::where_email($email)->first();

	$users = User::where_in('id', array(1, 2, 3))->or_where('email', '=', $email)->get();

	$users = User::order_by('votes', 'desc')->take(10)->get();

> **注意:** 如果没有找到结果， **first** 方法会返回 NULL.  **all** 和 **get** 方法会返回空数组.

<a name="aggregates"></a>
## 聚合

需要获得一个**MIN**, **MAX**, **AVG**, **SUM**, 或 **COUNT**的值吗？  只需要传递给该方法字段即可：

	$min = User::min('id');

	$max = User::max('id');

	$avg = User::avg('id');

	$sum = User::sum('id');

	$count = User::count();

当然， 你还会想使用WHERE短语之前先limit一下：

	$count = User::where('id', '>', 10)->count();

<a name="save"></a>
## 插入 & 更新 Models

插入Eloquent models进入你的数据表非常简单。 首先， 实例化一个新的model。 其次， 设置其属性。 第三， 调用 **save**方法。 

	$user = new User;

	$user->email = 'example@gmail.com';
	$user->password = 'secret';

	$user->save();

此外， 你还可以使用 **create** 方法， 它会将一条新记录插入数据库，并为新插入的记录返回该model实例， 或者如果插入失败就返回 **false**。

	$user = User::create(array('email' => 'example@gmail.com'));

更新modles也非常容易。 与其实例化一个新的model， 不如从数据库中解析一个。 然而， 设置其属性， 然后保存：

	$user = User::find(1);

	$user->email = 'new_email@gmail.com';
	$user->password = 'new_secret';

	$user->save();

需要维护数据库记录上的creation 和 update 时间戳吗？　用Eloquent， 你无需担心它。 只需要在model里添加一个static **timestamps** 属性即可：

	class User extends Eloquent {

	     public static $timestamps = true;

	}

下面， 将  **created_at** 和 **updated_at** 日期字段添加进你的数据表。 现在， 当你save model的时候， creation和update时间戳会被自动地设置。 不用谢。

> **注意:** 你可以在 **application/config/application.php** 文件里改变默认的时区。 

<a name="relationships"></a>
## 关系

除非你做错了， 否则你的数据库表都会合适地关联上另一张表。 比如， 一个订单属于一个用户。 或者， 一个post有多条comment。 Eloquent使得关系和解析关系model变得容易。 Laravel支持三种关系：

- [一对一](#one-to-one)
- [一对多](#one-to-many)
- [多对多](#many-to-many)

要在Eloquent model上定义一个关系， 你只需要简单地创建一个方法， 返回**has\_one**, **has\_many**, **belongs\_to**, 或 **has\_many\_and\_belongs\_to** 方法的结果的任何一个即可。 我们每种都看下详细例子。

<a name="one-to-one"></a>
### 一对一

一对一关系是最基本的关系形式。 比如， 我们假装一个用户只有一个电话。 那么简单地在Eloquent里描述这种关系：

	class User extends Eloquent {

	     public function phone()
	     {
	          return $this->has_one('Phone');
	     }

	}

注意关联的model的名称被传递给了 **has_one** 方法。 你现在可以通过 **phone** 方法解析用户的电话号码：

	$phone = User::find(1)->phone()->first();

我们检查下该语句实际执行的SQL。 会执行两条语句： 一条解析用户， 一条解析用户的电话号码：

	SELECT * FROM "users" WHERE "id" = 1

	SELECT * FROM "phones" WHERE "user_id" = 1

注意， Eloquent假设关系的外键是 **user\_id** 。 大多数外键都遵循 **model\_id** 共识；然而， 要是你想要使用不同的字段名称作为外键， 只需要传递给该方法第二个参数即可：

	return $this->has_one('Phone', 'my_foreign_key');

想要只解析用户的电话号码而不调用first方法吗？没问题。　只需要使用　**dynamic phone property**。　Eloquent会自动加载关系， 它甚至可以知道你是否调用了get(一对多关系)或first(一对一关系)方法：

	$phone = User::find(1)->phone;

要是你想解析一个手机号码对应的用户该怎么办？ 因为外键(**user\_id**)是在phones数据表上， 所以我们应该使用 **belongs\_to** 方法来描述这个关系。 这才有意义， 不是吗？ Phones属于users。 当使用 **belongs\_to** 方法时， 关系方法的名称应该对应于外键（像**\_id**）。 由于外键是**user\_id**， 你的关系方法应该叫做 **user**：

	class Phone extends Eloquent {

	     public function user()
	     {
	          return $this->belongs_to('User');
	     }

	}

太棒了！ 你现在可以通过一个Phone model来访问一个User model了， 不论是使用你的关系方法还是动态属性：

	echo Phone::find(1)->user()->first()->email;

	echo Phone::find(1)->user->email;

<a name="one-to-many"></a>
### 一对多

假设一个博客post有许多个comments。 很容易使用 **has_many** 方法来定义这种关系：

	class Post extends Eloquent {

	     public function comments()
	     {
	          return $this->has_many('Comment');
	     }

	}

现在， 简单的通过关系方法或动态属性来访问post comments：

	$comments = Post::find(1)->comments()->get();

	$comments = Post::find(1)->comments;

这两条语句都会执行以下的SQL：

	SELECT * FROM "posts" WHERE "id" = 1

	SELECT * FROM "comments" WHERE "post_id" = 1

想要join on一个不同的外键吗？没问题。　只需要把它传递为该方法的第二个参数即可：

	return $this->has_many('Comment', 'my_foreign_key');

你也许在想：　_如果动态属性返回了关系，　并且只需更少的按键，　那么为什么我还需要使用关系方法呢？_　实际上，关系方法很强大。　它允许你在解析关系前持续链接查询方法。　看看这个例子：

	echo Post::find(1)->comments()->order_by('votes', 'desc')->take(10)->get();

<a name="many-to-many"></a>
### 多对多

多对多关系是三种关系中最复杂的关系。　但不要担心，不难的。比如，假设一个User有许多Roles， 而一个Role又可以属于许多Users。 因此必须创建三张数据表来表达这样的关系：一张 **users** 表，一张 **roles** 表， 和一张 **role_user** 表。 每张数据表的结构如下：

**Users:**

	id    - INTEGER
	email - VARCHAR

**Roles:**

	id   - INTEGER
	name - VARCHAR

**Roles_Users:**

	user_id - INTEGER
	role_id - INTEGER

现在你已经准备好使用 **has\_many\_and\_belongs\_to** 方法来定义models上的关系了：

	class User extends Eloquent {

	     public function roles()
	     {
	          return $this->has_many_and_belongs_to('Role');
	     }

	}

不错！ 现在是时候解析一个用户的角色了：

	$roles = User::find(1)->roles()->get();

或者，像平常一样， 你可以通过动态的角色属性来解析关系：

	$roles = User::find(1)->roles;

正如你注意到的， 中介数据表的默认名称是两个关联models的独立名称，字母和下划线结合。 然而， 你可以自己指定自己的数据表名称。 简单地传递给**has\_and\_belongs\_to\_many** 方法第二个参数以设置数据表名即可：

	class User extends Eloquent {

	     public function roles()
	     {
	          return $this->has_many_and_belongs_to('Role', 'user_roles');
	     }

	}

<a name="inserting-related-models"></a>
## 插入关联 Models

让我们假设你拥有一个  **Post** model， 有着许多comments。 你经常会像为给定的post插入一条新的comment。 与其手动设置model上的 **post_id** 外键， 你可以从Post model自身里面来插入新comment。 这样子做：

	$comment = new Comment(array('message' => 'A new comment.'));

	$post = Post::find(1);

	$post->comments()->insert($comment);

当通过父model来插入关联models的时候， 外键会自动设置。 因此， 这个例子里， "post_id" 会自动被设置成 "1"。

<a name="has-many-save"></a>
当处理 `has_many` 关系时， 你可以使用 `save` 方法插入/更新关联models：

	$comments = array(
		array('message' => 'A new comment.'),
		array('message' => 'A second comment.'),
	);

	$post = Post::find(1);

	$post->comments()->save($comments);

### 插入关联 Models (多对多)

当处理多对多关系时，这就更加有用了。 比如， 考虑一下一个**User** model有许多roles的情况。 另外， **Role** model也拥有许多个users。 所以， 中介数据表有着 "user_id" 和 "role_id" 字段。 现在， 我们为一个User插入一个新的Role：

	$role = new Role(array('title' => 'Admin'));

	$user = User::find(1);

	$user->roles()->insert($role);

现在， 当Role被插入时， 不仅Role被插入进了"roles" 表，中介表里也同样插入了一条记录。 没有更简单的了！

然而， 你也许经常遇到这样的情况， 只需要往中介表里插入一条记录。 比如， 也许你想要为已存在用户添加一个role。 那么只需要使用attach方法：

	$user->roles()->attach($role_id);

<a name="sync-method"></a>
或者， 你还可以使用 `sync` 方法， 它会接受ID数组来跟中介表"sync"。 在这个操作完成后， 只有数组里的ID才会在中介表里面存在。 

	$user->roles()->sync(array(1, 2, 3));

<a name="intermediate-tables"></a>
## 处理中介表

正如你可能已经知道的， 多对多关系要求中介表的存在。 Eloquent使得维护这个表很简单。 比如， 我们假定拥有一个 **User** model ， 它有很多roles。 然后， **Role** modle也有许多users。 因此中介表有 "user_id" 和 "role_id" 字段。 我们可以访问表的中枢来获取关系， 像这样：


	$user = User::find(1);

	$pivot = $user->roles()->pivot();

一旦我们有了一个中枢表的实例， 我们可以像其他Eloquent model一样使用它：

	foreach ($user->roles()->pivot()->get() as $row)
	{
		//
	}

你还可以用一个给定的记录访问特定的中介表行记录， 比如：

	$user = User::find(1);

	foreach ($user->roles as $role)
	{
		echo $role->pivot->created_at;
	}

注意， 每个有关系的 **Role** model都被自动赋值为一个 **pivot** 属性。 该属性包含了一个代表中介表的model，关联上了那个有关的model。

有时候你想要通过给定的model关系移除中介表的所有记录。 比如， 也许你想要移除全部来自某个用户的角色。 那么这样做：

	$user = User::find(1);

	$user->roles()->delete();

注意， 这不会删除 "roles"表里的内容， 而只会删除来自中介表中有关该给定user的内容。

<a name="eager"></a>
## 饥渴加载

饥渴加载的存在用以减轻N+1查询问题。 有什么问题？ 好吧， 假装每本Book都属于Author。 我们会用这样的关系来描述：

	class Book extends Eloquent {

	     public function author()
	     {
	          return $this->belongs_to('Author');
	     }

	}

现在，检查以下的代码：

	foreach (Book::all() as $book)
	{
	     echo $book->author->name;
	}

会执行多少次查询？ 好吧， 一条查询会执行数据表的全部书。 然而， 其他查询会被为每本书请求其作者。 为了显示25本书的该作者名称， 需要查询 *26 queries**。 如何更快？

幸运的是， 你可以使用author models的饥渴查询， 请使用 **with** 方法。 简单的提到你想要饥渴查询的 **function name** 即可：

	foreach (Book::with('author')->get() as $book)
	{
	     echo $book->author->name;
	}

在这个例子里，  **一共只会执行两条查询**!

	SELECT * FROM "books"

	SELECT * FROM "authors" WHERE "id" IN (1, 2, 3, 4, 5, ...)

很明显， 明智地使用饥渴查询能够急剧地加速你应用程序的效率。 在上面的例子里， 饥渴查询会节省一半的查询时间。 

需要不知一个关系的饥渴查询吗？ 很简单：

	$books = Book::with(array('author', 'publisher'))->get();

> **注意:** 当你使用饥渴查询时， 对于static **with** 方法的调用必须永远在query的前面。 


你甚至可以饥渴加载嵌套关系。 比如， 我们假设**Author** model有一个  "contacts" 关系。 我们也一样可以饥渴加载来自我们的Book model的关系：


	$books = Book::with(array('author', 'author.contacts'))->get();

<a name="constraining-eager-loads"></a>
## 约束饥渴加载

有时候你会希望饥渴加载一个关系， 但是还想指定一个饥渴加载的条件。 很简单， 这样子：

	$users = User::with(array('posts' => function($query)
	{
		$query->where('title', 'like', '%first%');

	}))->get();

这个例子里， 我们为users饥渴加载了posts， 但只有当posts的"title"字段包含"first"一词时才加载。 

<a name="getter-and-setter-methods"></a>
## Getter & Setter 方法

Setters允许你处理用自定义方法的属性赋值。 通过添加"set_" 于属性名称前面来定义一个setter。 

	public function set_password($password)
	{
		$this->set_attribute('hashed_password', Hash::make($password));
	}

将setter方法作为一个变量（不用括号）调用， 使用方法名称，不带"set_"前缀。 

	$this->password = "my new password";

Getters非常简单。 它们可以用来修改返回之前的属性。 要定义一个getter， 就在属性名称前添加一个"get_" 。

	public function get_published_date()
	{
		return date('M j, Y', $this->get_attribute('published_at'));
	}

将getter方法作为一个变量（不用括号）调用， 使用方法名称，不带"get_"前缀。 

	echo $this->published_date;

<a name="mass-assignment"></a>
## 大量赋值

大量赋值是将关联数组传递给model方法的实践， 该方法会用来自该数组的值来填补model的属性。 大量赋值可以通过给model的constructor传递一个数组来实现：

	$user = new User(array(
		'username' => 'first last',
		'password' => 'disgaea'
	));

	$user->save();

或者， 大量赋值可以通过使用**fill**方法来完成。

	$user = new User;

	$user->fill(array(
		'username' => 'first last',
		'password' => 'disgaea'
	));

	$user->save();

默认地， 所有属性键/值对都会在大量赋值时存储。 然而， 有可能创建一个可被设置的白名单。 只有在白名单里才能被大量赋值。 

你可以通过赋值**$accessible** static数组来指定可访问的属性。 每个元素都包含白名单属性的名称。 

	public static $accessible = array('email', 'password', 'name');

或者， 你可以在model里使用**accessible** 方法：

	User::accessible(array('email', 'password', 'name'));

> **注意:** 当使用用户输入大量赋值时， 你必须极为小心. 可能会引起安全侵入危险.

<a name="to-array"></a>
## 将 Models 转成 Arrays

当建立JSON API时， 你会经常需要将model转成数组， 以便他们能够被容易地序列化。 这很简单。 

#### 将 Models 转成一个数组：

	return json_encode($user->to_array());

`to_array`方法会自动抓取你model的全部属性， 以及任何加载的关系。 

有时候你会希望限制在model数组里包括的属性， 比如密码。 为了这么做， 就在model里添加一个 `hidden` 属性定义：

#### 从数组里排除属性:

	class User extends Eloquent {

		public static $hidden = array('password');

	}