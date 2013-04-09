@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/jquery.slider.min.css') }}
	{{ HTML::style('css/search.css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/jquery.slider.min.js') }}
	{{ HTML::script('js/jquery.scrollTo-min.js') }}
@endsection
@section('page_scripts_footer')
	{{ HTML::script('js/search.js') }}
@endsection
@section('content')
<div id="modal" class="modal hide fade in">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3></h3>
	</div>
	<div class="modal-footer">
		<a data-dismiss="modal" class="btn" href="#">更改条件再搜一次</a>
	</div>
</div>
<div class="container">
	<h1>搜索</h1>

	<div class="alert alert-info">
		只有经过验证并上传了照片的用户才能被搜索到哦！
	</div>

	<div class="row">
		<div class="span12">
			<table class="search_filter">
				<tbody>
					<tr>
						<td class="span2">性别</td>
						<td class="span10">
							<div id="sex" class="btn-group">
								<button id="sex-male" class="btn btn-primary">男</button>
								<button id="sex-female" class="btn">女</button>
							</div>
						</td>
					</tr>

					<tr>
						<td class="span2">身高</td>
						<td class="span10"><div id="height"><input type="slider" value="160;180" name="height" id="sliderHeight"></div></td>
					</tr>

					<tr>
						<td class="span2">年龄</td>
						<td class="span10"><div id="age"><input type="slider" value="25;35" name="age" id="sliderAge"></div></td>
					</tr>

					<tr>
						<td class="span2">税前月薪</td>
						<td class="span10"><div id="salary"><input type="slider" value="3000;8000" name="salary" id="sliderSalary"></div></td>
					</tr>

					<tr>
						<td class="span2">最高学历</td>
						<td class="span10"><div id="academic"><input type="slider" value="4;6" name="academic" id="sliderAcademic"></div></td>
					</tr>

					<tr>
						<td class="span2">籍贯</td>
						<td class="span10">
							<div id="nationality">
								<span class="label label-success" data-oid="1">上海</span>
								<span class="label label-success" data-oid="2">北京</span>
								<span class="label label-success" data-oid="3">天津</span>
								<span class="label label-success" data-oid="4">重庆</span>
								<span class="label label-success" data-oid="5">河北</span>
								<span class="label label-success" data-oid="6">山西</span>
								<span class="label label-success" data-oid="7">内蒙古</span>
								<span class="label label-success" data-oid="8">福建</span>
								<span class="label label-success" data-oid="9">吉林</span>
								<span class="label label-success" data-oid="10">黑龙江</span>
								<span class="label label-success" data-oid="11">江苏</span>
								<span class="label label-success" data-oid="12">浙江</span>
								<span class="label label-success" data-oid="13">安徽</span>
								<span class="label label-success" data-oid="14">辽宁</span>
								<span class="label label-success" data-oid="15">江西</span>
								<span class="label label-success" data-oid="16">山东</span>
								<span class="label label-success" data-oid="17">河南</span>
								<span class="label label-success" data-oid="18">湖北</span>
								<span class="label label-success" data-oid="19">湖南</span>
								<span class="label label-success" data-oid="20">广东</span>
								<span class="label label-success" data-oid="21">广西</span>
								<span class="label label-success" data-oid="22">海南</span>
								<span class="label label-success" data-oid="23">四川</span>
								<span class="label label-success" data-oid="24">贵州</span>
								<span class="label label-success" data-oid="25">云南</span>
								<span class="label label-success" data-oid="26">西藏</span>
								<span class="label label-success" data-oid="27">陕西</span>
								<span class="label label-success" data-oid="28">甘肃</span>
								<span class="label label-success" data-oid="29">宁夏</span>
								<span class="label label-success" data-oid="30">青海</span>
								<span class="label label-success" data-oid="31">新疆</span>
								<span class="label" data-oid="32">香港</span>
								<span class="label" data-oid="33">澳门</span>
								<span class="label" data-oid="34">台湾</span>
								<span class="label" data-oid="35">国外</span>
							</div>
						</td>
					</tr>


					<tr>
						<td class="span2">常住区域</td>
						<td class="span10">
							<div id="district">
								<span class="label label-success" data-oid="1">黄浦</span>
								<span class="label label-success" data-oid="2">闸北</span>
								<span class="label label-success" data-oid="3">虹口</span>
								<span class="label label-success" data-oid="4">杨浦</span>
								<span class="label label-success" data-oid="5">静安</span>
								<span class="label label-success" data-oid="6">宝山</span>
								<span class="label label-success" data-oid="7">普陀</span>
								<span class="label label-success" data-oid="8">卢湾</span>
								<span class="label label-success" data-oid="9">长宁</span>
								<span class="label label-success" data-oid="10">徐汇</span>
								<span class="label label-success" data-oid="11">闵行</span>
								<span class="label label-success" data-oid="12">嘉定</span>
								<span class="label label-success" data-oid="13">浦东</span>
								<span class="label label-success" data-oid="14">松江</span>
								<span class="label" data-oid="15">青浦</span>
								<span class="label" data-oid="16">奉贤</span>
								<span class="label" data-oid="17">南汇</span>	
								<span class="label" data-oid="18">金山</span>	
								<span class="label" data-oid="19">崇明</span>			
							</div>
						</td>
					</tr>


				</tbody>
			</table>

			<div class="search_button"><button id="search" class="btn btn-large btn-primary">搜索</button></div>	
		</div>


		<div class="span12">
			<h1 id="search_result_title" class="search_result_title">符合搜索条件的结果</h1>
			<ul id="thumbnails" class="thumbnails">
				<!-- ajax result -->
			</ul>
		</div>


		
	</div>


	<div style="height:600px;"></div>
</div>

<div id="toTop">TOP</div>
@endsection