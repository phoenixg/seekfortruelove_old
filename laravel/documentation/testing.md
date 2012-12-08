# 单元测试

## 内容

- [基础](#the-basics)
- [创建测试类](#creating-test-classes)
- [运行测试](#running-tests)
- [在测试里调用控制器](#calling-controllers-from-tests)

<a name="the-basics"></a>
## 基础

单元测试允许你测试代码，验证它们是否正常工作。 实际上， 许多人主张你应该先写测试再写代码！ Laravel提供了漂亮的对流行的[PHPUnit](http://www.phpunit.de/manual/current/en/) 测试类库的整合， 这让你写测试变得非常方便。 实际上， Laravel框架本身就有几百个单元测试！


<a name="creating-test-classes"></a>
## 创建测试类

你应用程序的全部测试都位于**application/tests**目录。 在这个目录里， 你会发现一个基础的**example.test.php**文件。 打开它， 看看它包含了：  

	<?php

	class TestExample extends PHPUnit_Framework_TestCase {

		/**
		 * Test that a given condition is met.
		 *
		 * @return void
		 */
		public function testSomethingIsTrue()
		{
			$this->assertTrue(true);
		}

	}

尤其注意**.test.php**后缀。 这会告诉Laravel它应该将这个类作为测试case包括进来。 任何在test目录下的文件，如果不以该后缀命名， 那么不会被当做一个测试case。 


如果你在为bundle写一个测试， 只需要把他们放在bundle底下的**tests** 目录中。 Laravel会搞定剩下的一切！ 

更多关于创建测试cases的信息， 看看 [PHPUnit 文档](http://www.phpunit.de/manual/current/en/).

<a name="running-tests"></a>
## 运行测试

要运行测试， 你应该使用Laravel的Artisan命令行套件：

#### 通过Artisan CLI运行应用程序测试:

	php artisan test

#### 为bundle运行单元测试:

	php artisan test bundle-name

<a name="#calling-controllers-from-tests"></a>
## 在测试里调用控制器

下面是你如何在测试里调用控制器的例子：

#### 在测试里调用控制器:

	$response = Controller::call('home@index', $parameters);

#### 在测试里化解一个控制器实例:

	$controller = Controller::resolve('application', 'home@index');

> **注意:** 当使用 Controller::call 来执行控制器actions的时候， 控制器的 action 过滤器仍旧会运行。