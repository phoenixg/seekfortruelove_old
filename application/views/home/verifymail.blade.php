@layout('layouts.default')

@section('content')
<div class="container">
	@if(Session::has('email'))
	<div class="hero-unit">
		<h2>感谢您的注册！</h2>
		<p>一封激活邮件已经发送至您的注册邮箱，请登录邮箱以验证您所填写的邮箱（{{ Session::get('email') }}）的正确性</p>
	</div>
	@endif

	@if(Session::has('msg_verify_error_wrong'))
	<div class="hero-unit">
		<h2>糟糕！</h2>
		<p>这是无效的激活链接</p>
	</div>
	@endif

	@if(Session::has('msg_verify_error_forbidden'))
	<div class="hero-unit">
		<h2>遗憾！</h2>
		<p>帐号已被禁用</p>
	</div>
	@endif

	@if(Session::has('msg_verify_error_verified'))
	<div class="hero-unit">
		<h2>哎呀呀！</h2>
		<p>帐号已经激活过了</p>
	</div>
	@endif

	@if(Session::has('msg_verify_pass'))
	<div class="hero-unit">
		<h2>祝贺！</h2>
		<p>您的账号激活成功！您现在可以登录并搜索其他用户。请等待管理员审核您的资料，只有经审核的用户才能被看到和搜索到。这通常需要1-2天时间，审核结果会通过电邮发送至您的邮箱。</p>
		<p>{{ HTML::link_to_route('login', '登陆', null, array('class'=>'btn btn-primary')) }}</p>
	</div>
	@endif

</div>
@endsection