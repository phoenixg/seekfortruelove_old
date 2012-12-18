@layout('layouts.default')
@section('page_scripts_header')
	{{ HTML::script('js/register.js') }}
@endsection
@section('content')
<div class="container">
	<h1>用户注册</h1>
	@if($errors->has())
	<div class="alert alert-block alert-error fade in">
		<a href="javascript: void(0)" data-dismiss="alert" class="close">×</a>
		<h4 class="alert-heading">呀，发生了以下错误哦！</h4>
		<p>
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</p>
		<p>
			<a href="javascript: void(0)" class="btn btn-danger">好嘛我改</a>
		</p>
	</div>
	@endif

	<div class="row">
		<div class="span8">

		<!-- ['class'=>'sample']
			个人微博：腾讯、新浪
			照片：（仅请求时同意可见，互换照片）
		-->
			{{ Form::open(URL::to_route('create'), 'POST', array('class' => 'form-horizontal')) }}
				<fieldset>
					<legend></legend>
					<h3>登录信息</h3>
					<hr />
					
					<div class="control-group">
						{{ Form::label('email', '电子邮件', array('class' => 'control-label')) }}
						<div class="controls">
							{{ Form::text('email', Input::old('email'), array('class' => 'span3', 'placeholder' => 'eg. user@domain.com')) }}
							<span class="label label-info">将作为你的登录用户名，一经注册，无法修改</span>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('password', '登录密码', array('class' => 'control-label')) }}
						<div class="controls">
							<input type="password" name="password" placeholder="" class="span2">
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('password_confirmation', '重复密码', array('class' => 'control-label')) }}
						<div class="controls">
							<input type="password" name="password_confirmation" placeholder="" class="span2">
						</div>
					</div>

					<h3>基本信息</h3>
					<hr />
					<div class="control-group">
						{{ Form::label('nickname', '显示昵称', array('class' => 'control-label')) }}
						<div class="controls">
							{{ Form::text('nickname', Input::old('nickname'), array('class' => 'span2')) }}
						</div>
					</div>


					<div class="control-group">
						{{ Form::label('sex', '性别', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span1" name="sex">
								<option value="男">男</option>
								<option value="女">女</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('ethnic', '民族', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="ethnic">
								@foreach ($static_ethnics as $ethnics)
								<option value="{{$ethnics->id}}">{{$ethnics->name}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('nationality', '籍贯', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="nationality">
								@foreach ($static_nationalities as $nationality)
								<option value="{{$nationality->id}}">{{$nationality->nationality}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('height', '身高', array('class' => 'control-label')) }}
						<div class="controls">
							<div class="input-append">
								{{ Form::text('height', Input::old('height'), array('class' => 'span1', 'size' => 10)) }}
								<span class="add-on">CM</span>
							</div>
						</div>
					</div>


					<div class="control-group">
						{{ Form::label('weight', '体重', array('class' => 'control-label')) }}
						<div class="controls">
							<div class="input-append">
								{{ Form::text('weight', Input::old('weight'), array('class' => 'span1', 'size' => 10)) }}
								<span class="add-on">KG</span>
							</div>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('born', '出生年份', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span1" name="born" id="born"></select>
						</div>
					</div>


					<div class="control-group">
						{{ Form::label('district', '常住区域', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="district">
								@foreach ($static_districts as $district)
								<option value="{{$district->id}}">{{$district->district}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('marriage', '婚姻状况', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="marriage">
								@foreach ($static_marriages as $marriage)
								<option value="{{$marriage->id}}">{{$marriage->status}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('living', '住房情况', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="living">
								@foreach ($static_livings as $living)
								<option value="{{$living->id}}">{{$living->status}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<h3>教育信息</h3>
					<hr />

					<div class="control-group">
						{{ Form::label('academic', '最高学历', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="academic">
								@foreach ($static_academics as $academic)
								<option value="{{$academic->id}}">{{$academic->academic}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('school', '毕业院校', array('class' => 'control-label')) }}
						<div class="controls">
							{{ Form::text('school', Input::old('school'), array('class' => 'span2')) }}
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('major', '专业', array('class' => 'control-label')) }}
						<div class="controls">
							{{ Form::text('major', Input::old('major'), array('class' => 'span2')) }}
							<span class="label label-info">可选</span>
						</div>
					</div>

					<h3>工作信息</h3>
					<hr />

					<div class="control-group">
						{{ Form::label('industry', '行业', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="industry">
								@foreach ($static_industries as $industry)
								<option value="{{$industry->id}}">{{$industry->type}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('profession', '职业', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="profession">
								@foreach ($static_professions as $profession)
								<option value="{{$profession->id}}">{{$profession->profession}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('companytype', '公司类型', array('class' => 'control-label')) }}
						<div class="controls">
							<select class="span2" name="companytype">
								@foreach ($static_companytypes as $companytype)
								<option value="{{$companytype->id}}">{{$companytype->type}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="control-group">
						{{ Form::label('salary', '税前月薪', array('class' => 'control-label')) }}
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">￥</span>
								<select class="span2" name="salary">
									@foreach ($static_salaries as $salary)
									<option value="{{$salary->id}}">{{$salary->range}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<h3>其他信息</h3>
					<hr />

					<div class="control-group">
						{{ Form::label('blog', '个人博客', array('class' => 'control-label')) }}
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">http://</span>
								{{ Form::text('blog', Input::old('blog'), array('class' => 'span4', 'size' => 100, 'placeholder' => 'eg. blog.domain.com')) }}
							</div>
							<span class="label label-info">可选</span>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<label class="checkbox">
							<input type="checkbox" value="1" name="terms">
							勾选此项表示接受{{ HTML::link_to_route('home', '使用条款') }}和{{ HTML::link_to_route('home', '隐私声明') }}
							</label>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							{{ Form::submit('提交', array('class' => 'btn btn-primary')) }}
						</div>
					</div>
				
				</fieldset>

				{{ Form::token() }}

			{{ Form::close() }}







			
		</div>
		<div class="span4">
			information box
		</div>
	</div>
</div>


@endsection