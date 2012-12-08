# 验证

## 内容

- [基础](#the-basics)
- [验证规则](#validation-rules)
- [解析错误消息](#retrieving-error-messages)
- [验证攻略](#validation-walkthrough)
- [自定义错误消息](#custom-error-messages)
- [自定义验证规则](#custom-validation-rules)

<a name="the-basics"></a>
## 基础

几乎所有网页交互的应用程序都用到数据验证。 比如， 注册表单要求密码确认。 也许e-mail地址必须是唯一的。 验证数据可以变得麻烦。 但在Laravel里面， 验证器（Validator）类提供了极好的验证辅助函数数组来帮助你的验证数据变得简单。 我们看看例子：

#### 获取一个你想要验证的数据数组:

	$input = Input::all();

#### 定义数据的验证规则:

	$rules = array(
		'name'  => 'required|max:50',
		'email' => 'required|email|unique:users',
	);

#### 创建一个Validator实例，验证数据:

	$validation = Validator::make($input, $rules);

	if ($validation->fails())
	{
		return $validation->errors;
	}

使用*errors* 属性，你可以访问一个简单的消息接收器类使你的错误消息变得简单。 当然，默认的错误消息被全部验证规则所设置。 默认的消息存储在 **language/en/validation.php** 。 


现在你已经熟悉了Validator类的基本使用方法。 你可以进一步学习你如何验证数据的规则了！


<a name="validation-rules"></a>
## 验证规则

- [Required](#rule-required)
- [Alpha, Alpha Numeric, & Alpha Dash](#rule-alpha)
- [Size](#rule-size)
- [Numeric](#rule-numeric)
- [Inclusion & Exclusion](#rule-in)
- [Confirmation](#rule-confirmation)
- [Acceptance](#rule-acceptance)
- [Same & Different](#same-and-different)
- [Regular Expression Match](#regex-match)
- [Uniqueness & Existence](#rule-unique)
- [Dates](#dates)
- [E-Mail Addresses](#rule-email)
- [URLs](#rule-url)
- [Uploads](#rule-uploads)

<a name="rule-required"></a>
### Required

#### 验证必须要有该属性，并且不能是空字符串:

	'name' => 'required'

<a name="rule-alpha"></a>
### Alpha, Alpha Numeric, & Alpha Dash

#### 验证属性单由字母组成:

	'name' => 'alpha'

#### 验证属性由字母和数字组成:

	'username' => 'alpha_num'

#### 验证属性单由字母、数字、横杠或下划线组成:

	'username' => 'alpha_dash'

<a name="rule-size"></a>
### Size

#### 验证属性是一个给定的长度，或者当属性是数字时，就是一个给定值:

	'name' => 'size:10'

#### 验证属性长度在给定的范围里:

	'payment' => 'between:10,50'

> **注意:** 所有最小和最大的检查值都是同样包括进内的.

#### 验证属性最少是一个给定的大小:

	'payment' => 'min:10'

#### 验证属性不大于给定的大小:

	'payment' => 'max:50'

<a name="rule-numeric"></a>
### Numeric

#### 验证属性是数字:

	'payment' => 'numeric'

#### 验证属性是整型:

	'payment' => 'integer'

<a name="rule-in"></a>
### Inclusion & Exclusion

#### 验证属性包括一系列的值:

	'size' => 'in:small,medium,large'

#### 验证属性不包括一些列的值:

	'language' => 'not_in:cobol,assembler'

<a name="rule-confirmation"></a>
### Confirmation

*confirmed* 规则验证给定的属性， 一个匹配的 *attribute_confirmation* 属性存在.

#### 验证属性是否confirmed:

	'password' => 'confirmed'

这个例子，Validator会确保*password* 属性在验证的数组里匹配 *password_confirmation* 属性。

<a name="rule-acceptance"></a>
### Acceptance

*accepted* 规则验证属性相等于*yes* 或 *1*. 这条规则对于验证checkbox表单字段，比如"terms of service" 非常有用。

#### 验证属性是否 accepted:

	'terms' => 'accepted'

<a name="same-and-different"></a>
## Same & Different

#### 验证属性匹配另一个属性:

	'token1' => 'same:token2'

#### 验证两个属性有不同的值:

	'password' => 'different:old_password',

<a name="regex-match"></a>
### Regular Expression Match

*match* 规则验证属性匹配一个给定的正则表达式.

#### 验证属性匹配一条正则表达式:

	'username' => 'match:/[a-z]+/';

<a name="rule-unique"></a>
### Uniqueness & Existence

#### 验证属性在给定的数据表里是唯一的值:

	'email' => 'unique:users'

在上面的例子中， *email* 属性会被用于检查*users*表的唯一性。 你想验证字段名的唯一性而不是属性名吗？ 没问题：

#### 验证一个自定义的字段名的唯一性规则:

	'email' => 'unique:users,email_address'

很多时候， 当要更新一条记录时， 你会想用到唯一性规则， 与此同时排除被更新的行。 比如， 当更新用户的profile时， 你会允许他们改变e-mail地址，但当*unique* 规则运行时， 你想要跳过给定的用户，因为它们没有改变他们的地址， 这样会引起*unique* 规则失败。很容易做：

#### 强迫唯一性规则忽略一个给定的ID:

	'email' => 'unique:users,email_address,10'

#### 验证属性在给定的数据表里存在:

	'state' => 'exists:states'

#### 为已存在的规则指定一个自定义的字段名称:

	'state' => 'exists:states,abbreviation'

<a name="dates"></a>
### Dates

#### 验证日期属性在一个给定的日期之前:

	'birthdate' => 'before:1986-28-05';

#### 验证日期属性在一个给定的日期之后:

	'birthdate' => 'after:1986-28-05';

> **注意:** **before** 和 **after** 验证规则使用了 **strtotime** PHP 函数来转换你的日期为规则可以理解的形式.

<a name="rule-email"></a>
### E-Mail Addresses

#### 验证属性是一个有效地 e-mail 地址:

	'address' => 'email'

> **注意:** 这条规则使用了PHP内建的 *filter_var* 方法.

<a name="rule-url"></a>
### URLs

#### 验证属性是一个 URL:

	'link' => 'url'

#### 验证属性是一个活跃的 URL:

	'link' => 'active_url'

> **注意:** *active_url* 规则使用了 *checkdnsr* 来验证URL的活跃性.

<a name="rule-uploads"></a>
### Uploads

*mimes* 规则验证了上传的文件的MIME类型。 该条规则使用了PHP Fileinfo扩展来读取文件内容， 判断实际的MIME类型。 任何在*config/mimes.php*文件里定义的扩展都可以当作参数传递给这条规则：


#### 验证一个文件是否属于给定的类型:

	'picture' => 'mimes:jpg,gif'

> **注意:** 当验证文件时， 请务必使用 Input::file() 或 Input::all() 来收集输入信息.

#### 验证文件是否是图片:

	'picture' => 'image'

#### 验证文件是否不大于一个给定的大小（Kb）:

	'picture' => 'image|max:100'

<a name="retrieving-error-messages"></a>
## Retrieving Error Messages

Laravel使用一个简单的错误控制器类来处理你的错误消息。 在调用Validator实例的 *passes* 或 *fails* 方法后， 你可以通过 *errors* 属性来获取到错误。 这个错误收集器有几个简单的函数来解析你的消息：

#### 判断属性是否有一条错误消息:

	if ($validation->errors->has('email'))
	{
		// e-mail 属性有错误...
	}

#### 解析属性的第一个错误消息:

	echo $validation->errors->first('email');

有时候你会需要格式化错误消息，封装进HTML里面。 没关系。 使用:message 占位符， 传递格式作为第二个参数给该方法。

#### 格式化一条错误消息:

	echo $validation->errors->first('email', '<p>:message</p>');

#### 获取全部关于某个给定属性的错误消息:

	$messages = $validation->errors->get('email');

#### 格式化全部某个错误消息:

	$messages = $validation->errors->get('email', '<p>:message</p>');

#### 获取全部属性的全部错误消息:

	$messages = $validation->errors->all();

#### 格式化全部属性的全部错误消息:

	$messages = $validation->errors->all('<p>:message</p>');

<a name="validation-walkthrough"></a>
## Validation Walkthrough

一旦你执行了验证， 你需要将错误返回给视图。 Laravel让这变得无比简单。 我们看看一个典型的场景。 我们会定义两条路由：

	Route::get('register', function()
	{
		return View::make('user.register');
	});

	Route::post('register', function()
	{
		$rules = array(...);

		$validation = Validator::make(Input::all(), $rules);

		if ($validation->fails())
		{
			return Redirect::to('register')->with_errors($validation);
		}
	});

棒极了！ 所以， 我们有两条简单的注册路由。 一条路由用来处理表单的显示， 一条路由则用来处理表单的提交。 在POST路由里， 我们运行一些输入验证。 如果验证失败， 我们就重定向回注册表单，并flash验证错误至session里， 以便它们可以显示出来。 


**但是， 请注意我们没有在GET路由里明确绑定错误给视图**。 然而， 错误变量还是能在视图里被访问。 Laravel智能地判断了session里是否存在错误消息， 如果存在， 就为你绑定到视图里。 如果session里没有错误， 那么仍旧会绑定一个空的消息容器给视图。 在你的视图里， 这允许你总是假设你拥有一个消息容器，以访问错误变量。 我们就喜欢让你的生活变得容易。


<a name="custom-error-messages"></a>
## Custom Error Messages

想要使用一个错误消息而不是默认的吗？ 也许你甚至想要根据给定的属性和验证规则自定义错误消息。 不管是哪种方式， Validator 类会让这变得简单。 

#### 为Validator创建一个自定义的消息数组:

	$messages = array(
		'required' => ' :attribute 字段是必填项目',
	);

	$validation = Validator::make(Input::get(), $rules, $messages);

太棒了！ 现在我们的自定义消息会在任何required验证检查失败时运行。 但是， **:attribute** 这玩意儿是什么？ 为了让你变得轻松， Validator类会替换**:attribute** 这个占位符为实际的属性名称！ 它甚至还会帮你移除属性名称的下划线。 

你还可以使用**:other**, **:size**, **:min**, **:max**, 和 **:values** 这些占位符来建构你的错误消息：

#### 其他的验证消息占位符:

	$messages = array(
		'same'    => ' :attribute 和 :other 不匹配.',
		'size'    => ' :attribute 必须是这个大小一致 :size.',
		'between' => ' :attribute 必须是介于 :min 和 :max 之间的值.',
		'in'      => ' :attribute 必须是以下类型之一: :values',
	);

所以， 如果你需要仅仅为email属性指定一个自定义的required消息该怎么办呢？ 没问题。 只需要使用一个 **attribute_rule** 命名约定指定该消息即可：

#### 为给定的属性指定一个自定义的错误消息:

	$messages = array(
		'email_required' => '我们需要知道你的 e-mail 地址!',
	);

在上面的例子里， 自定义的required消息会为你的email属性使用， 而其他属性则仍旧会使用默认的消息。 


然而， 如果你正在使用许多自定义的错误消息， 内联指定这些消息会变得很麻烦和凌乱。 因此， 你可以在**custom** 数组里面指定这些自定义消息， 在验证语言文件里：

#### 在验证语言文件里添加自定义的错误消息:

	'custom' => array(
		'email_required' => 我们需要知道你的 e-mail 地址!',
	)

<a name="custom-validation-rules"></a>
## Custom Validation Rules

Laravel提供了强大的验证规则数量。 然而， 很有可能你需要创建一些自己的验证规则。 有两种简单的方法来创建验证规则。 两种都很好， 你可以随意选择来满足你的项目需要。 

#### 注册一个自定义的验证规则:

	Validator::register('awesome', function($attribute, $value, $parameters)
	{
	    return $value == 'awesome';
	});

在这个例子里， 我们用validator注册了一个新的验证规则。 这条规则接收三个参数。 第一个参数是要被验证的属性名称， 第二个参数是要被验证的属性值， 第三个参数是我们为这条规则指定的参数数组。 

下面显示了你如何调用你的自定义验证规则：

	$rules = array(
    	'username' => 'required|awesome',
	);

当然， 你需要为你的新规则创建一条错误消息。 你可以通过 ad-hoc 消息数组来完成：

	$messages = array(
    	'awesome' => '这个属性值必须 awesome!',
	);

	$validator = Validator::make(Input::get(), $rules, $messages);

或者通过在**language/en/validation.php**里为你的规则添加一个条目来完成：

	'awesome' => '这个属性值必须 awesome!',

正如之前提及的， 你可能甚至会在你自定义的规则里指定和接收一系列的参数：

	// 当建立你的规则数组时...

	$rules = array(
	    'username' => 'required|awesome:yes',
	);

	// 在你的自定义规则里...

	Validator::register('awesome', function($attribute, $value, $parameters)
	{
	    return $value == $parameters[0];
	}

在这个例子里， 验证规则的参数会接收一个包含一个元素"yes"的数组

其他用来创建和存储自定义验证规则的方法是扩展Validator类本身。 通过扩展该类， 你就创建了一个新版本的validator， 拥有全部预先存在的功能，还有你自定义的功能。 你甚至可以选择替换一些默认的方法。 我们看看例子：

首先， 创建一个类类继承  **Laravel\Validator** 并且存储在 **application/libraries** 目录：

#### 定义一个自定义的validator类:

	<?php

	class Validator extends Laravel\Validator {}

下一步， 在**config/application.php**里移除掉Validator别名。 这么做很有必要， 你就不用使用两个都叫 "Validator" 的类了， 那样会引起冲突。 

下一步， 我们就拿我们的  "awesome"  规则， 将它定义在我们新的类里：

#### 添加一个自定义的验证规则:

	<?php

	class Validator extends Laravel\Validator {

	    public function validate_awesome($attribute, $value, $parameters)
	    {
	        return $value == 'awesome';
	    }

	}

注意， 该方法使用了 **validate_rule** 的命名共识。 该规则命名成 "awesome" ， 因此方法要叫做 "validate_awesome"。 这是注册你自定义的规则并扩展Validator类的不同方式。 Validator类简单地返回true或false。 就这么简单！

请留心记住， 你仍然需要为任何你创建了的验证规则创建一个自定义的消息。 方法依然一样， 不管你是如何定义你的规则的！