# 任务

## 内容

- [基础](#the-basics)
- [创建 & 执行任务](#creating-tasks)
- [Bundle 任务](#bundle-tasks)
- [CLI 选项](#cli-options)

<a name="the-basics"></a>
## 基础

Laravel的命令行工具叫Artisan。 Artisan可以用来执行 "tasks"，比如移植（migrations），cronjobs， 单元测试或任何其他的事。 

<a name="creating-tasks"></a>
## 创建 & 执行任务

要创建一个任务，就在你的 **application/tasks** 目录下创建一个新类。 类名称应该以"_Task"作为后缀， 并且应该至少有一个"run"方法， 像这样：

#### 创建一个task类:

	class Notify_Task {

		public function run($arguments)
		{
			// 做些牛比的事...
		}

	}

现在你可以通过命令行调用task的"run"方法了。 你甚至可以传递参数：

#### 从命令行调用task:

	php artisan notify

#### 调用task，并传递参数:

	php artisan notify taylor

记住， 你可以在task上调用指定的方法， 因此，让我们添加一个 "urgent" 方法给这个notify task：

#### 为task添加一个方法:

	class Notify_Task {

		public function run($arguments)
		{
			// 做些牛比的事...
		}

		public function urgent($arguments)
		{
			// 这个很紧急!
		}

	}

现在我们可以调用我们的"urgent"方法了：

#### 在task上调用一个指定的方法:

	php artisan notify:urgent

<a name="bundle-tasks"></a>
## Bundle 任务

要为你的bundle创建一个task，只需把bundle名称前缀为你的task名称。 因此， 如果你的bundle叫做"admin"，那么一个task就应该像这样：

#### 创建一个属于bundle的task类:

	class Admin_Generate_Task {

		public function run($arguments)
		{
			// 创建admin!
		}

	}

要执行你的task，只需使用Laravel的双引号语法来指明bundle：

#### 执行一个属于bundle的task:

	php artisan admin::generate

#### 执行一个属于bundle的task的指定方法:

	php artisan admin::generate:list

<a name="cli-options"></a>
## CLI 选项

#### 设置Laravel环境:

	php artisan foo --env=local

#### 设置默认的数据库连接:

	php artisan foo --database=sqlite