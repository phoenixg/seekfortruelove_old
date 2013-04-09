@layout('layouts.default')

@section('content')
<div class="container">
	<h1>用户登录</h1>

	<div class="row">
		<div class="span12">
			{{ Form::open(URL::to_route('login'), 'POST', array('class' => 'form-horizontal')) }}
				<fieldset>	
					<legend></legend>				
					<div class="control-group">
						{{ Form::label('email', '电子邮件', array('class' => 'control-label')) }}
						<div class="controls">
							<input type="text" name="email" placeholder="eg. user@domain.com" class="span3">
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('password', '登录密码', array('class' => 'control-label')) }}
						<div class="controls">
							<input type="password" name="password" placeholder="" class="span3">
						</div>
					</div>

					<div class="control-group">
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