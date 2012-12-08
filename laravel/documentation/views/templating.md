# 模板

## 内容

- [基础](#the-basics)
- [段落（section）](#sections)
- [Blade 模板引擎](#blade-template-engine)
- [Blade Layouts](#blade-layouts)

<a name="the-basics"></a>
## 基础

你的应用程序很可能使用一个常见的横跨大多数页面的layout。 在每个控制器的action里面手动的创建这个layout会非常痛苦。 因此指定控制器所用到的layout会让你的应用程序更加有趣。 我们来开始：


#### 指定控制器的 "layout" 属性:

	class Base_Controller extends Controller {

		public $layout = 'layouts.common';

	}

#### 访问来自控制器action的layout:

	public function action_profile()
	{
		$this->layout->nest('content', 'user.profile');
	}

> **注意:** 当使用 layouts 的时候, actions 无需return任何东西.

<a name="sections"></a>
## 段落（Sections）

视图section提供了简单的方式在嵌套视图里往layouts注入内容。 比如，也许你想在嵌套视图里注入其需要的JavaScript至layout的header里。我们看：

#### 在视图里创建一个section:

	<?php Section::start('scripts'); ?>
		<script src="jquery.js"></script>
	<?php Section::stop(); ?>

#### 渲染section的内容:

	<head>
		<?php echo Section::yield('scripts'); ?>
	</head>

#### 使用 Blade 捷径方式来操作 sections:

	@section('scripts')
		<script src="jquery.js"></script>
	@endsection

	<head>
		@yield('scripts')
	</head>

<a name="blade-template-engine"></a>
## Blade 模板引擎

Blade让你的视图撰写变得轻松。 要创建blade视图，只要把视图文件命名成".blade.php"。 Blade允许你使用漂亮的、无障碍的语法来撰写PHP控制器结构、打印数据。 比如：

#### 用Blade打印变量:

	Hello, {{$name}}.
	
#### 用Blade打印函数结果:

	{{ Asset::styles() }}

#### 渲染视图:

	<h1>Profile</hi>

	@include('user.profile')

> **注意:** 当使用 **@include** Blade 表达式时，视图会自动继承所有当前视图的数据。

#### 用Blade创建循环:

	<h1>评论</h1>

	@foreach ($comments as $comment)
		评论内容是 {{$comment->body}}.
	@endforeach

#### 其他Blade控制结构:

	@if (count($comments) > 0)
		存在评论!
	@else
		不存在评论!
	@endif

	@for ($i =0; $i < count($comments) - 1; $i++)
		评论内容是 {{$comments[$i]}}
	@endfor

	@while ($something)
		我还在循环!
	@endwhile

#### "for-else" 控制结构:

	@forelse ($posts as $post)
		{{ $post->body }}
	@empty
		数组里没有post!
	@endforelse

<a name="blade-unless"></a>
#### "unless" 控制结构:

	@unless(Auth::check())
		{{ HTML::link_to_route('login', 'Login'); }}
	@endunless

	// 等价于...

	<?php if ( ! Auth::check()): ?>
		...
	<?php endif; ?>

<a name="blade-comments"></a>
#### Blade 注释:
	
	@if ($check)
		{{-- 这是一条注释 --}}
		...
	@endif

> **注意:** Blade 注释, 不像 HTML 注释, 在HTML源代码里是看不见的.

<a name="blade-layouts"></a>
## Blade Layouts

Blade不仅提供了干净、优雅的语法来书写常见的PHP控制结构， 它还给你漂亮的方法来使用视图的layouts。 比如， 也许你的应用程序使用了一个"master"视图用来提供通用的外观。 可能像这样子：

	<html>
		<ul class="navigation">
			@section('navigation')
				<li>导航项目 1</li>
				<li>导航项目 2</li>
			@yield_section
		</ul>

		<div class="content">
			@yield('content')
		</div>
	</html>

注意"content" section被yielded。 我们需要用一些文本来填补这个section， 所以我们创建另一个使用这个layout的视图：

	@layout('master')

	@section('content')
		欢迎来到profile页面!
	@endsection

棒极了! 现在，我们可以在路由里轻松返回"profile"视图:

	return View::make('profile');

profile视图会自动使用"master"模板， 这要归功于Blade的**@layout**表达式。

有时候你会想要在section后面补充而不是重写掉它。 比如，看看我们这个"master" layout的导航列表例子。 我们假设只想添加一个新项目。 我们就这样做：

	@layout('master')

	@section('navigation')
		@parent
		<li>导航项目 3</li>
	@endsection

	@section('content')
		欢迎来到profile页面!
	@endsection

注意到 **@parent** Blade结构了吗？ 它会被layout的navigation section替代， 这为你提供了漂亮和强大的执行layout扩展和继承的能力。