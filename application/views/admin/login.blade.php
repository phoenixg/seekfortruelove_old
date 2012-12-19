@layout('layouts.default')

@section('content')
<div class="container">
	<h1>管理员登录</h1>
	<p></p>
	<div class="row">
		<div class="span12">
			{{ Form::open(URL::to_route('admin_login'), 'POST', array('class' => 'form-horizontal')) }}
				<input type="password" name="password" placeholder="密码" class="span3">
				&nbsp;
				{{ Form::submit('登录', array('class' => 'btn btn-primary')) }}
				{{ Form::token() }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection