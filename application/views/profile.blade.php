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
<div>
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
	


	<br />

	<ul id="thumbnails" class="thumbnails">
		<li>
			<a href="" class="fancybox" rel="external">
			<span class="imghover_gallery"></span>
			<img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" />
			</a>
		</li>

		<li>
			<a href="" class="fancybox" rel="external">
			<span class="imghover_gallery"></span>
			<img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" />
			</a>
		</li>
	</ul>
</div>
@endsection