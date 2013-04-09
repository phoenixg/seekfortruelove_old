@layout('layouts.dashboard')
<<<<<<< HEAD
@section('main')
	<h2>个人资料编辑</h2>
=======
@section('page_styles_header')
	{{ HTML::style('css/dashboard.profile.css') }}
@endsection
@section('main')
	<h2>个人资料编辑</h2>
	<span class="preview">
		[&nbsp;{{ HTML::link_to_route('profile', '预览个人主页', array(Auth::user()->id)) }}&nbsp;]
	</span>
>>>>>>> develop

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

	@if(Session::has('message'))
    <div class="alert alert-success">
    	<a data-dismiss="alert" class="close">×</a>
    	个人资料修改成功！
    </div>
	@endif

	{{ Form::open(URL::to_route('update'), 'PUT', array('class' => 'form-horizontal')) }}
		<fieldset>
			<div class="row">
				<div class="span12">
					<div class="row">
						<!-- 左边一排 -->
						<div class="span4">
							<div class="control-group">
								{{ Form::label('email', '电子邮件', array('class' => 'control-label')) }}
								<div class="controls">
									{{ Form::text('email', Auth::user()->email, array('class' => 'span3', 'placeholder' => 'eg. user@domain.com', 'disabled' => 'disabled')) }}
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('nickname', '显示昵称', array('class' => 'control-label')) }}
								<div class="controls">
									{{ Form::text('nickname', Auth::user()->nickname, array('class' => 'span2')) }}
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('sex', '性别', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span1" name="sex">
										<option value="男" <?php if(Auth::user()->sex == '男') echo 'selected';?>>男</option>
										<option value="女" <?php if(Auth::user()->sex == '女') echo 'selected';?>>女</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('ethnic', '民族', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="ethnic">
										@foreach ($static_ethnics as $ethnics)
										<option value="{{$ethnics->id}}" 
											<?php if(Auth::user()->ethnic == $ethnics->id) echo 'selected';?>>{{$ethnics->name}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('nationality', '籍贯', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="nationality">
										@foreach ($static_nationalities as $nationality)
										<option value="{{$nationality->id}}" 
											<?php if(Auth::user()->nationality == $nationality->id) echo 'selected';?>>{{$nationality->nationality}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('height', '身高', array('class' => 'control-label')) }}
								<div class="controls">
									<div class="input-append">
										{{ Form::text('height', Auth::user()->height, array('class' => 'span1', 'size' => 10)) }}
										<span class="add-on">CM</span>
									</div>
								</div>
							</div>


							<div class="control-group">
								{{ Form::label('weight', '体重', array('class' => 'control-label')) }}
								<div class="controls">
									<div class="input-append">
										{{ Form::text('weight', Auth::user()->weight, array('class' => 'span1', 'size' => 10)) }}
										<span class="add-on">KG</span>
									</div>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('born', '出生年份', array('class' => 'control-label')) }}
								<div class="controls">
									<div class="input-append">
										{{ Form::text('born', Auth::user()->born, array('class' => 'span1', 'size' => 10)) }}
										<span class="add-on">年</span>
									</div>
								</div>
							</div>


							<div class="control-group">
								{{ Form::label('district', '常住区域', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="district">
										@foreach ($static_districts as $district)
										<option value="{{$district->id}}" 
											<?php if(Auth::user()->district == $district->id) echo 'selected';?>>{{$district->district}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('marriage', '婚姻状况', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="marriage">
										@foreach ($static_marriages as $marriage)
										<option value="{{$marriage->id}}" 
											<?php if(Auth::user()->marriage == $marriage->id) echo 'selected';?>>{{$marriage->status}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('living', '住房情况', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="living">
										@foreach ($static_livings as $living)
										<option value="{{$living->id}}" 
											<?php if(Auth::user()->living == $living->id) echo 'selected';?>>{{$living->status}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<!-- 右边一排 -->
						<div class="span5">
							<!-- 头像 -->
							<ul id="thumbnails" class="thumbnails" style="margin-left:130px;">
								<li>
									{{ HTML::image('/images/profile/icon/'.Auth::user()->id.'.jpg', '头像', array('id' => 'icon')) }}
								</li>
							</ul>

							<div class="control-group">
								{{ Form::label('academic', '最高学历', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="academic">
										@foreach ($static_academics as $academic)
										<option value="{{$academic->id}}" 
											<?php if(Auth::user()->academic == $academic->id) echo 'selected';?>>{{$academic->academic}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('school', '毕业院校', array('class' => 'control-label')) }}
								<div class="controls">
									{{ Form::text('school', Auth::user()->school, array('class' => 'span2')) }}
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('major', '专业', array('class' => 'control-label')) }}
								<div class="controls">
									{{ Form::text('major', Auth::user()->major, array('class' => 'span2')) }}
									
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('industry', '行业', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="industry">
										@foreach ($static_industries as $industry)
										<option value="{{$industry->id}}" 
											<?php if(Auth::user()->industry == $industry->id) echo 'selected';?>>{{$industry->type}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('profession', '职业', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="profession">
										@foreach ($static_professions as $profession)
										<option value="{{$profession->id}}" 
											<?php if(Auth::user()->profession == $profession->id) echo 'selected';?>>{{$profession->profession}}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="control-group">
								{{ Form::label('companytype', '公司类型', array('class' => 'control-label')) }}
								<div class="controls">
									<select class="span2" name="companytype">
										@foreach ($static_companytypes as $companytype)
										<option value="{{$companytype->id}}" 
											<?php if(Auth::user()->companytype == $companytype->id) echo 'selected';?>>{{$companytype->type}}</option>
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
											<option value="{{$salary->id}}" 
												<?php if(Auth::user()->salary  == $salary->id) echo 'selected';?>>{{$salary->range}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>

			<div class="control-group">
				{{ Form::label('blog', '个人博客', array('class' => 'control-label')) }}
				<div class="controls">
					<div class="input-prepend">
						<span class="add-on">http://</span>
						{{ Form::text('blog', Auth::user()->blog, array('class' => 'span4', 'size' => 100, 'placeholder' => 'eg. blog.domain.com')) }}
					</div>
				</div>
			</div>

			{{ Form::hidden('id', Auth::user()->id) }}

			<div class="control-group">
				<div class="controls">
					{{ Form::submit('更新', array('class' => 'btn btn-primary')) }}
				</div>
			</div>
		

		</fieldset>
		{{ Form::token() }}
	{{ Form::close() }}

@endsection
