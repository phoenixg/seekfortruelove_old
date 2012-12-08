# Auth 配置

## 内容

- [基础](#the-basics)
- [Authentication 驱动器](#driver)
- [默认的 "Username"](#username)
- [Authentication 模型](#model)
- [Authentication 数据表](#table)

<a name="the-basics"></a>
## 基础

大多数交互性的应用程序都具备用户登录、注销的能力。 Laravel提供了简单的类来帮助你验证用户的资质， 解析关于当前用户的信息。 

要开始，请看下 **application/config/auth.php** 文件。 authentication配置包含了一些基本的选项来帮助你启用 authentication。

<a name="driver"></a>
## Authentication 驱动器

Laravel 的 atuhentication 是基于驱动器的， 这意味着解析用户的责任交由几个"drivers"来完成。 原生自带了两个驱动器： Eloquent 和 Fluent， 你也可以写自己的驱动器！

**Eloquent** 驱动器使用了 Eloquent ORM 来加载应用程序的用户， 它是默认的authentication驱动器。 **Fluent** 驱动器使用了fluent query 构建器来加载你的用户。

<a name="username"></a>
## 默认的 "Username"

配置文件中的第二个选项判断你的用户们默认的 "username"。 通常这会对应数据库的"users"数据表的字段，通常是"email"或"username"。

<a name="model"></a>
## Authentication 模型

当使用 **Eloquent** authentication 驱动器时， 该选项判断当加载用户时的Eloquent模型。

<a name="table"></a>
## Authentication 数据表

当使用 **Fluent** authentication 驱动器时， 该选项判断用户是在哪个数据表里。 