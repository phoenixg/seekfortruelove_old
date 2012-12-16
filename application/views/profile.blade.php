@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/profile.css') }}
	<?php /* search.css 头像需要 */?>
	{{ HTML::style('css/search.css') }}
	{{ HTML::style('css/jquery....css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/jquery....js') }}
	{{ HTML::script('js/profile.js') }}
@endsection
@section('page_scripts_footer')

@endsection

<?php /*
			{{ $user->nickname }} 
			<br>
			{{ $user->sex }}
			<br>
			{{ $user->ethnic }}
			<br>
			{{ $user->nationality }}
			<br>
			{{ $user->height }}
			<br>
			{{ $user->weight }}
			<br>
			{{ $user->born }}
			<br>
			{{ $user->district }}
			<br>
			{{ $user->marriage }}
			<br>
			{{ $user->living }}
			<br>
			{{ $user->academic }}
			<br>
			{{ $user->school }}
			<br>
			{{ $user->major }}
			<br>
			{{ $user->industry }}
			<br>
			{{ $user->profession }}
			<br>
			{{ $user->companytype }}
			<br>
			{{ $user->salary }}
			<br>
			{{ $user->blog }}
			<br>

*/?>

@section('content')

<?php var_dump($user);
var_dump(gettype($user));
?>


<div class="container">
	<div class="row">
		<div class="span2">
			<ul id="thumbnails" class="thumbnails">
				<li>
					<img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" />
				</li>
			</ul>
		</div>

		<div class="span10" id="profile-info">
		    <div class="row">
			    <div class="span4"><strong>昵称:&nbsp;</strong>phx</div>
			    <div class="span2"><strong>性别:&nbsp;</strong>男</div>
			    <div class="span2"><strong>民族:&nbsp;</strong>汉</div>
			    <div class="span2"><strong>籍贯:&nbsp;</strong>广东</div>
		    </div>
		    <div class="row">
			    <div class="span2"><strong>身高/体重:&nbsp;</strong>188/69</div>
			    <div class="span2"><strong>出生年份/年龄:&nbsp;</strong>1988/25</div>
			    <div class="span2"><strong>婚姻状况:&nbsp;</strong>未婚</div>
			 	<div class="span2"><strong>常住区域:&nbsp;</strong>黄浦</div>
			    <div class="span2"><strong>住房情况:&nbsp;</strong>住自己家</div>
		    </div>

		    <div class="row">
			    <div class="span2"><strong>最高学历:&nbsp;</strong>本科</div>
			    <div class="span2"><strong>毕业院校:&nbsp;</strong>中山大学</div>
			    <div class="span2"><strong>专业:&nbsp;</strong>计算机</div>
		    </div>
		    <div class="row">
			    <div class="span2"><strong>行业:&nbsp;</strong>教会/神学</div>
			    <div class="span2"><strong>职业:&nbsp;</strong>牧师</div>
			    <div class="span2"><strong>公司类型:&nbsp;</strong>外企</div>
			    <div class="span2"><strong>税前月薪:&nbsp;</strong>4000k</div>
		    </div>
		    <div class="row">
			    <div class="span10"><strong>个人博客:&nbsp;</strong>http://www.domain.com</div>
		    </div> 
		</div>
	</div>


</div>
@endsection

