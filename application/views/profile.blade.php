@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/profile.css') }}
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
*/
?>

@section('content')
<div class="container">
	<div class="row">
		<div class="span2">
			<ul id="thumbnails" class="thumbnails">
				<li>
					<a href="" class="fancybox" rel="external">
					<span class="imghover_gallery"></span>
					<img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" />
					</a>
				</li>
			</ul>
		</div>

		<div class="span10">
			<table class="table table-condensed">
		        <tbody>
		          <tr>
		            <td>昵称</td>
		            <td>phx</td>
		            
		            <td>性别</td>
		            <td>男</td>

		            <td>民族</td>
		            <td>汉</td>
		            
		            <td>籍贯</td>
		            <td>广东</td>

		            <td>身高</td>
		            <td>188</td>
		            
		            <td>体重</td>
		            <td>69</td>

		            <td>出生年份</td>
		            <td>1988</td>

					<td>常住区域</td>
		            <td>黄浦</td>

					<td>婚姻状况</td>
		            <td>未婚</td>

		           	<td>住房情况</td>
		            <td>住自己家</td> 

		          </tr>
		        
		        </tbody>
			</table>
		</div>
	</div>


</div>
@endsection

