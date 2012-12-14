@layout('layouts.default')

@section('content')
<div class="container">
	@if(Session::has('msg_verify_error'))
	<div class="hero-unit">
		<h2>糟糕！</h2>
		<p>{{ Session::get('msg_verify_error') }}</p>
	</div>
	@endif

	@if(Session::has('msg_verify_pass'))
	<div class="hero-unit">
		<h2>祝贺！</h2>
		<p>{{ Session::get('msg_verify_pass') }}</p>
	</div>
	@endif

</div>
@endsection