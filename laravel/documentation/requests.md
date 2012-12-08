# 请求检查

## 内容

- [同 URI 打交道](#working-with-the-uri)
- [其他请求辅助函数](#other-request-helpers)

<a name="working-with-the-uri"></a>
## 同 URI 打交道

#### 获得当前请求的URI:

	echo URI::current();

#### 获取URI的一个段:

	echo URI::segment(1);

#### 如果segment不存在，返回一个默认值:

	echo URI::segment(10, 'Foo');

#### 获取完整的请求URI， 包括查询字符串:

	echo URI::full();

有时候你也许想判断当前URI是否是一个给定的字符串， 或者以给定的字符串开头。 下面是如何使用is()方法来完成这个目的的例子：

#### 判断URI是否是 "home":

	if (URI::is('home'))
	{
		// 当前URI是 "home"!
	}

#### 判断当前URI是否以"docs/"开头:

	if URI::is('docs/*'))
	{
		// 当前URI以 "docs/" 开头!
	}

<a name="other-request-helpers"></a>
## 其他请求辅助函数

#### 获取当前请求的方法:

	echo Request::method();

#### 访问 $_SERVER 全局数组:

	echo Request::server('http_referer');

#### 获取请求者的IP地址:

	echo Request::ip();

#### 判断当前请求是否使用HTTPS:

	if (Request::secure())
	{
		// 请求是通过 HTTPS 的!
	}

#### 判断当前请求是否是AJAX:

	if (Request::ajax())
	{
		// 请求使用的是 AJAX!
	}

#### 判断当前请求是否是通过Artisan CLI的:

	if (Request::cli())
	{
		//请求来自CLI!
	}