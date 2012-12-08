# 移植

## 内容

- [基础](#the-basics)
- [预备数据库](#prepping-your-database)
- [创建 Migrations](#creating-migrations)
- [运行 Migrations](#running-migrations)
- [回滚](#rolling-back)

<a name="the-basics"></a>
## 基础

可以把移植当做数据库的版本控制。 当你在一个团队里开发时， 你在本地有一个数据库。 当Eric对数据库做了一些改变， 添加了一个新字段时。 你拉取了它的代码， 但你的应用程序却崩溃了，因为没个这个新字段。 你该怎么做呢？ 移植就是答案。 让我们来详细看看这东西怎么用！

<a name="prepping-your-database"></a>
## 预备数据库

在你运行移植之前， 我们需要给数据库做些工作。 Laravel使用了一张特殊的数据表来跟踪已运行的移植。 为了创建这张表， 只需要使用Artisan命令行：

**创建Laravel移植表:**

	php artisan migrate:install

<a name="creating-migrations"></a>
## 创建移植

你可以通过Laravel的 "Artisan" CLI来轻松创建移植。 就像这样：

**创建一个移植**

	php artisan migrate:make create_users_table

现在， 请检查 **application/migrations** 文件夹。 你应该看见了崭新的移植！ 请注意， 它包含了一个时间戳。 这允许Laravel以正确的顺序执行你的移植。 

你还可以为一个bundle创建移植。 

**为一个bundle创建一个移植:**

	php artisan migrate:make bundle::create_users_table

*更多阅读:*

- [Schema 构建器](/docs/database/schema)

<a name="running-migrations"></a>
## 运行移植

**在应用程序和bundle里运行全部的移植:**

	php artisan migrate

**在应用程序里运行全部的移植:**

	php artisan migrate application

**在bundle里运行全部的移植:**

	php artisan migrate bundle

<a name="rolling-back"></a>
## 回滚

当你回滚一个移植时， Laravel会回滚整个移植 "operation"。 因此， 如果最近一次移植执行了122条移植， 那么全部122条移植都会被回滚。 

**回滚最近的移植操作:**

	php artisan migrate:rollback

**回滚已运行的全部移植:**

	php artisan migrate:reset