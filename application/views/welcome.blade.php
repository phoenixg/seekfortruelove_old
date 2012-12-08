@layout('layouts.default')

@section('content')
<div class="container">
	<!-- 重定向到控制面板 -->
	@if(Session::has('message'))
	<div class="hero-unit">
		<h2>注册成功！现在可以</h2>
		<p>{{ Session::get('message') }}</p>
		<p><a href="dashboard" class="btn btn-primary btn-large">进入控制面板</a></p>
	</div>
	@endif
</div>
@endsection