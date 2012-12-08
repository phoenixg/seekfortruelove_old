# Authentication 用法

## 内容

- [加盐 & 哈希](#hash)
- [登陆](#login)
- [保护路由](#filter)
- [解析已登陆用户](#user)
- [注销](#logout)
- [编写自定义驱动器](#drivers)

> **注意:** 当使用Auth类时， 你必须 [指定一个session驱动器](/docs/session/config).

<a name="hash"></a>
## 加盐 & 哈希

如果你使用Auth类， 我们强烈鼓励你hash和salt全部密码。 web开发必须是负责任的。 加盐、哈希密码对你密码起到了保护。 

加盐和哈希密码可以使用 **Hash** 类来完成。 Hash 类是使用 **bcrypt** 哈希算法。 看看这个例子：

	$password = Hash::make('secret');

Hash类的 **make** 方法将返回一个60字符的哈希字符串。 

你可以比较一个未哈希的值和一个哈希后的值， 使用 **Hash** 类的 **check** 方法：

	if (Hash::check('secret', $hashed_value))
	{
		return 'The password is valid!';
	}

<a name="login"></a>
## 登陆

使用Auth类的 **attempt** 方法来登陆用户非常简单。 简单地传递给该方法用户的username和password。 资格会包含在一个数组里， 该数组允许跨驱动器的最大灵活性， 一些驱动器会要求其他数量的参数。 如果资格有效， login方法会返回 **true**， 不然， 会返回 **false**：

	$credentials = array('username' => 'example@gmail.com', 'password' => 'secret');

	if (Auth::attempt($credentials))
	{
	     return Redirect::to('user/profile');
	}

如果用户的资格有效， 那么session里会存储一个user ID， 在随后对于应用程序的请求中， 用户会被当做 "logged in"。

要判断你的应用程序的用户是否已经 logged in， 请调用 **check** 方法：

	if (Auth::check())
	{
	     return "You're logged in!";
	}

使用 **login** 方法来登陆一个用户，无需检查其资格， 比如在用户首次注册你的应用程序时。 只需传递用户对象或用户ID即可；


	Auth::login($user);

	Auth::login(15);

<a name="filter"></a>
## 保护路由

经常你需要限制某些路由只给登陆的用户看。 在Laravel里， 可以使用 [auth 过滤器](/docs/routing#filters)完成。 如果用户已登陆， 该请求会正常工作；如果用户没有登陆， 那么他们会被重定向至"login"这个[命名路由](/docs/routing#named-routes).

要保护一个路由，只需简单添加 **auth** 过滤器：

	Route::get('admin', array('before' => 'auth', function() {}));

> **注意:** 你可以随意编辑 **auth** 过滤器来满足你的需要。默认的在 **application/routes.php**.

<a name="user"></a>
## 解析已登陆用户

一旦用户已登陆进你的应用程序， 你就可以使用Auth类的 **user** 方法来访问user模型：

	return Auth::user()->email;

> **注意:** 如果你的用户没有登陆， 那么 **user** 方法会返回 NULL.

<a name="logout"></a>
## 注销

准备好注销该用户了吗？

	Auth::logout();

该方法会删除session里的该user ID， 然后该用户在随后的请求里将不再被视为一个已登陆用户。 