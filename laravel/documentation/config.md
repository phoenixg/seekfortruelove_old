# Runtime 配置

## 内容

- [基础](#the-basics)
- [解析选项](#retrieving-options)
- [设置选项](#setting-options)

<a name="the-basics"></a>
## 基础

有时候你想要在运行时获取和设置配置选项。 你可以使用 **Config** 类， 它利用了Laravel的"dot"语法来访问配置文件和项目。

<a name="retrieving-options"></a>
##  解析选项

#### 解析一个配置选项:

	$value = Config::get('application.url');

#### 如果选项不存在，返回一个默认值:

	$value = Config::get('application.timezone', 'UTC');

#### 解析一个完整的配置数组:

	$options = Config::get('database');

<a name="setting-options"></a>
## 设置选项

#### 设置一个配置选项:

	Config::set('cache.driver', 'apc');