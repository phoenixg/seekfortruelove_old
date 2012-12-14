@layout('layouts.default')

@section('content')
<div class="container">
	@if(Session::has('msg_verify_error'))
	<div class="hero-unit">
		<h2>糟糕！</h2>
		<p>这是无效的激活链接</p>
	</div>
	@endif

	@if(Session::has('msg_verify_pass'))
	<div class="hero-unit">
		<h2>祝贺！</h2>
		<p>
			您的账号激活成功！现在可以直接
			<a href="{{ HTML::link_to_route('login') }}" class="btn btn-primary">登陆</a>
		</p>
	</div>
	@endif

</div>
@endsection