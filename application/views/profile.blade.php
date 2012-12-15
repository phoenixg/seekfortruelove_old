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
		<div class="span12">

			

			<table class="table table-condensed">
			        <tbody>
			          <tr>
			            <td>昵称</td>
			            <td>phx</td>
			            
			            <td>学历</td>
			            <td>本科</td>
			          </tr>
			          <tr>
			            <td>民族</td>
			            <td>汉</td>
			            
			            <td>专业</td>
			            <td>计算机</td>
			          </tr>
			          <tr>
			            <td>工资</td>
			            <td>2000-3000</td>
			            
			            <td>出生</td>
			            <td>1928</td>
			          </tr>
			        </tbody>
			</table>



			<br />

			<ul id="thumbnails" class="thumbnails">
				<li>
					<a href="" class="fancybox" rel="external">
					<span class="imghover_gallery"></span>
					<img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" />
					</a>
				</li>
			</ul>

		</div>
	</div>
</div>
@endsection

