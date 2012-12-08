# 生成 URLs

## 内容

- [基础](#the-basics)
- [URLs 至路由](#urls-to-routes)
- [URLs 至控制器actions](#urls-to-controller-actions)
- [URLs 至 Assets](#urls-to-assets)
- [URL 辅助函数](#url-helpers)

<a name="the-basics"></a>
## 基础

#### 解析应用程序的 base URL:

	$url = URL::base();

#### 生成一个相对于base URL的URL:

	$url = URL::to('user/profile');

#### 生成一个 HTTPS URL:

	$url = URL::to_secure('user/login');

#### 解析当前 URL:

	$url = URL::current();

#### 解析当前 URL，包括查询字符串:

	$url = URL::full();

<a name="urls-to-routes"></a>
## URLs 至路由

#### 生成一个 URL 至命名路由:

	$url = URL::to_route('profile');

有时候你会想生成一个URL至一个命名路由， 但还想指定值而非路由URI的通配符。 要用合适的值替换掉这个通配符很简单：

#### 生成一个带有通配符值的 URL 至命名路由:

	$url = URL::to_route('profile', array($username));

*更多阅读:*

- [命名路由](/docs/routing#named-routes)

<a name="urls-to-controller-actions"></a>
## URLs 至控制器actions

#### 生成一个 URL 至控制器action:

	$url = URL::to_action('user@profile');

#### 生成一个带有通配符值的 URL 至一个action:

	$url = URL::to_action('user@profile', array($username));

<a name="urls-to-assets"></a>
## URLs 至 Assets

为assets生成的URLs不会包括 "application.index" 配置选项。

#### 生成一个 URL 至一个 asset:

	$url = URL::to_asset('js/jquery.js');

<a name="url-helpers"></a>
## URL 辅助函数

有一些用于生成URLs的全局函数被设计成让你的代码更加简单和干净：

#### 生成一个相对于 base URL 的URL:

	$url = url('user/profile');

#### 生成一个 URL 至一个 asset:

	$url = asset('js/jquery.js');

#### 生成一个 URL 至一个命名路由:

	$url = route('profile');

#### 生成一个带有通配符值的 URL 至一个命名路由:

	$url = route('profile', array($username));

#### 生成一个 URL 至一个控制器action:

	$url = action('user@profile');

#### 生成一个带有通配符值的 URL 至一个 action:

	$url = action('user@profile', array($username));