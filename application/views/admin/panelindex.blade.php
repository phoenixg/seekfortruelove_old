@layout('admin.panel')
@section('page_styles_header')
	{{ HTML::style('css/...css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/...js') }}
@endsection
@section('page_scripts_footer')
	{{ HTML::script('js/...js') }}
@endsection
@section('main')

	panelindex

@endsection