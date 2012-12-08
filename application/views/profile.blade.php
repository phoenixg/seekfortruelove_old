@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/profile.css') }}
	{{ HTML::style('css/jquery.shutter.css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/jquery.shutter.js') }}
	{{ HTML::script('js/profile.js') }}
@endsection
@section('page_scripts_footer')

@endsection
@section('content')
<div>
	{{ $user->nickname }}

	<br />

	<div id="container">
		<ul>
	    	<li><img src="http://173.230.150.168/gitprojects/laravel/public/images/profile/icon/20.jpg" width="640" height="400" alt="Landscape" /></li>
	        <li><img src="http://173.230.150.168/gitprojects/laravel/public/images/profile/icon/19.jpg" width="640" height="400" alt="Yacht club" /></li>
	        <li><img src="http://173.230.150.168/gitprojects/laravel/public/images/profile/icon/18.jpg" width="640" height="400" alt="Desert" /></li>
	    </ul>
	</div>

</div>
@endsection