@layout('layouts.default')

@section('content')
<div class="container">
	@if(Session::has('email'))
	<div class="hero-unit">
		<h2>很好</h2>
		<p>{{ Session::get('email') }}</p>
	</div>
	@endif
</div>
@endsection