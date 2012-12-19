@layout('layouts.default')

@section('content')
<div class="container">
	<h1>管理员登录</h1>

	<div class="row">
		<div class="span12">
			{{ Form::open(URL::to_route('login'), 'POST', array('class' => 'form-horizontal')) }}
				<fieldset>	
					<div class="control-group">
						{{ Form::label('password', '密码', array('class' => 'control-label')) }}
						<div class="controls">
							<input type="password" name="password" placeholder="密码" class="span3">
						</div>

						<div class="controls">
							{{ Form::submit('登录', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				
				</fieldset>

				{{ Form::token() }}

			{{ Form::close() }}

		</div>
	</div>
</div>
@endsection