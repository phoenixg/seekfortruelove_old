# Artisan 命令

## 内容

- [应用程序配置](#application-configuration)
- [Sessions](#sessions)
- [移植](#migrations)
- [Bundles](#bundles)
- [Tasks](#tasks)
- [单元测试](#unit-tests)
- [路由](#routing)
- [应用程序keys](#keys)
- [CLI 选项](#cli-options)

<a name="application-configuration"></a>
## 应用程序配置 <small>[(更多信息)](/docs/install#basic-configuration)</small>

Description  | Command
------------- | -------------
Generate a secure application key. An application key will not be generated unless the field in **config/application.php** is empty. | `php artisan key:generate`

<a name="sessions"></a>
## 数据库 Sessions <small>[(更多信息)](/docs/session/config#database)</small>

Description  | Command
------------- | -------------
Create a session table  | `php artisan session:table`

<a name="migrations"></a>
## 移植 <small>[(更多信息)](/docs/database/migrations)</small>

Description  | Command
------------- | -------------
Create the Laravel migration table  | `php artisan migrate:install`
Creating a migration  | `php artisan migrate:make create_users_table`
Creating a migration for a bundle  |  `php artisan migrate:make bundle::tablename`
Running outstanding migrations  |  `php artisan migrate`
Running outstanding migrations in the application |  `php artisan migrate application`
Running all outstanding migrations in a bundle  |  `php artisan migrate bundle`
Rolling back the last migration operation | `php artisan migrate:rollback`
Roll back all migrations that have ever run  |  `php artisan migrate:reset`

<a name="bundles"></a>
## Bundles <small>[(更多信息)](/docs/bundles)</small>

Description  | Command
------------- | -------------
Install a bundle  |  `php artisan bundle:install eloquent`
Upgrade a bundle  |  `php artisan bundle:upgrade eloquent`
Upgrade all bundles | `php artisan bundle:upgrade`
Publish a bundle assets | `php artisan bundle:publish bundle_name`
Publish all bundles assets | `php artisan bundle:publish`

<br>
> **注意:** 安装完毕后你需要 [注册该 bundle](../bundles/#registering-bundles)

<a name="tasks"></a>
## Tasks <small>[(更多信息)](/docs/artisan/tasks)</small>

Description  | Command
------------- | -------------
Calling a task  |  `php artisan notify`
Calling a task and passing arguments  |  `php artisan notify taylor`
Calling a specific method on a task  |  `php artisan notify:urgent`
Running a task on a bundle | `php artisan admin::generate`
Running a specific method on a bundle  |  `php artisan admin::generate:list`

<a name="unit-tests"></a>
## 单元测试 <small>[(更多信息)](/docs/testing)</small>

Description  | Command
------------- | -------------
Running the application tests  |  `php artisan test`
Running the bundle tests  |  `php artisan test bundle-name`

<a name="routing"></a>
## 路由 <small>[(更多信息)](/docs/routing)</small>

Description  | Command
------------- | -------------
Calling a route  |  `php artisan route:call get api/user/1`

<br>
> **注意:** 你可以用post, put, delete, etc取代get

<a name="keys"></a>
## 应用程序Keys

Description  | Command
------------- | -------------
Generate an application key  |  `php artisan key:generate`

<br>
> **注意:** 你可以指定另一个key长度，通过添加一个额外参数即可.

<a name="cli-options"></a>
## CLI 选项

Description  | Command
------------- | -------------
Setting the Laravel environment  |  `php artisan foo --env=local`
Setting the default database connection  |  `php artisan foo --database=sqlitename`
