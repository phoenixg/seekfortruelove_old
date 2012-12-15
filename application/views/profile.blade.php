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
@section('content')
<div class="container">
	<div class="row">
		<div class="span12">
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
			

	<table class="table table-condensed">
		    <thead>
	          <tr>
	            <th>#</th>
	            <th>电视剧</th>
	            <th>类型</th>
	            <th>年代</th>
	          </tr>
	        </thead>
	        <tbody>
	          <tr>
	            <td>1</td>
	            <td>爱情公寓</td>
	            <td>都市爱情喜剧</td>
	            <td>2010</td>
	          </tr>
	          <tr>
	            <td>2</td>
	            <td>邪恶力量</td>
	            <td>悬疑魔幻</td>
	            <td>2005</td>
	          </tr>
	          <tr>
	            <td>3</td>
	            <td>神探伽俐略</td>
	            <td>推理探案</td>
	            <td>2008</td>
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

