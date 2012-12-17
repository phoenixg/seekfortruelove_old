@layout('layouts.default')

@section('content')
<div class="container">
	@if(Session::has('email'))
	<div class="hero-unit">
		<h2>太好了！</h2>
		<p>一封邮件已经发送至您的注册邮箱，以便验证您所填写的邮箱（{{ Session::get('email') }}）的正确性</p>
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
		<p>您的账号激活成功！</p>
		<p>{{ HTML::link_to_route('login', '登陆', null, array('class'=>'btn btn-primary')) }}</p>
	</div>
	@endif

</div>
@endsection