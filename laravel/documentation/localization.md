# 本地化

## 内容

- [基础](#the-basics)
- [获取一个语言行](#get)
- [占位符 & 替换](#replace)

<a name="the-basics"></a>
## 基础

本地化是将你的应用程序翻译成其他语言的过程。 **Lang** 类提供了简单的机制来帮助你组织和解析多语言应用程序的文本。 

所有的语言文件都存放在 **application/language** 目录。 在 **application/language** 目录下， 你应该为每个支持语言创建一个文件夹， 比如如果你的应用程序既要有英语也要有西班牙语，就创建**en** 和 **sp** 目录于 **language** 目录下。 


每个语言目录都包含许多不同语言文件。 每个语言文件都是简单的用该语言写的数组。 实际上， 语言文件的结构和配置文件是一样的。 比如， 在 **application/language/en** 目录里， 你可以创建一个 **marketing.php** 文件， 像这样：


#### 创建一个语言文件:

	return array(

	     'welcome' => 'Welcome to our website!',

	);

下面， 你应该在 **application/language/sp** 下面创建一个相对应的 **marketing.php** 文件。 该文件应该像这样：

	return array(

	     'welcome' => 'Bienvenido a nuestro sitio web!',

	);

非常棒！ 现在你知道如何设置语言文件和目录了。 我们继续本地化！

<a name="get"></a>
## 获取一个语言行

#### 获取一个语言行:

	echo Lang::line('marketing.welcome')->get();

#### 获取一个语言行, 使用 "__" 辅助函数:

	echo __('marketing.welcome');

注意到一个句点被用来分隔"marketing" 和 "welcome"了吗？ 句点之前的文本对应语言文件， 句点之后的文本对应特定该语言文件的字符串。 

你需要解析语言的一行而不是默认的吗？ 没问题。 只需要用到 **get** 方法来提及语言即可。 

#### 用给定的语言获取一个语言行:

	echo Lang::line('marketing.welcome')->get('sp');

<a name="replace"></a>
## 占位符 & 替换

现在， 我们来玩玩欢迎消息。 "Welcome to our website!" 是一个很不错的消息。 可以用来指定你要打招呼的对方的姓名。 但是， 为每个用户创建语言行很费事、夸张。 幸好你无需这么做。 你可以指定语言文件里的占位符。 占位符用冒号来开头：

#### 用占位符创建一个语言行:

	'welcome' => 'Welcome to our website, :name!'

#### 用替换文本来解析一个语言行:

	echo Lang::line('marketing.welcome', array('name' => 'Taylor'))->get();

#### 用替换文本来解析一个语言行，使用 "__":

	echo __('marketing.welcome', array('name' => 'Taylor'));