# IoC 容器

- [定义](/docs/ioc#definition)
- [注册对象](/docs/ioc#register)
- [化解对象](/docs/ioc#resolve)

<a name="definition"></a>
## 定义

一个IoC容器就是管理和创建对象的一种方法。 你可以用它来定义复杂对象的创建， 允许你使用一条代码行来化解全站的这些IoC容器。 你还可以用它来"inject"依赖性进入你的类和控制器。 

IoC容器帮助你的应用程序更加富有弹性和可测试性。 你可能注册了好几个接口， 你可以用 [stubs and mocks](http://martinfowler.com/articles/mocksArentStubs.html) 分离你的测试代码和外部依赖性。 

<a name="register"></a>
## 注册对象

#### 在IoC容器里注册一个resolver：

	IoC::register('mailer', function()
	{
		$transport = Swift_MailTransport::newInstance();

		return Swift_Mailer::newInstance($transport);
	});


太好了！现在我们已经在容器里为SwiftMailer注册了一个resolver。 但是， 如果我们不想在每次需要一个实例时让容器创建一个mailer实例该怎么办？也许我们只想让容器返回上次已经创建好的实例。 那么只需要告诉容器该对象应该是一个单例即可：

#### 在容器里注册一个单例:

	IoC::singleton('mailer', function()
	{
		//
	});

你还可以在容器里注册一个已经存在的对象实例作为一个单例。

#### 在容器里注册一个已经存在的实例:

	IoC::instance('mailer', $instance);

<a name="resolve"></a>
## 化解对象

现在我们已经在容器里注册了SwiftMailer， 我们就可以使用 **IoC** 类的 **resolve**  方法来resolve它了。 

	$mailer = IoC::resolve('mailer');

> **注意:** 你还可以 [在容器里注册控制器](/docs/controllers#dependency-injection).