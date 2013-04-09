@layout('layouts.dashboard')
@section('page_styles_header')
	{{ HTML::style('css/fileuploader.css') }}
	{{ HTML::style('css/jquery.Jcrop.min.css') }}
	{{ HTML::style('css/fancybox/jquery.fancybox.css?v=2.1.0') }}
	{{ HTML::style('css/dashboard.image.css') }}
@endsection
@section('page_scripts_header')
	{{ HTML::script('js/fileuploader.js') }}
	{{ HTML::script('js/jquery.Jcrop.min.js') }}
	{{ HTML::script('js/jquery.mousewheel-3.0.6.pack.js') }}
	{{ HTML::script('js/fancybox/jquery.fancybox.pack.js?v=2.1.0') }}
@endsection
@section('page_scripts_footer')
	{{ HTML::script('js/dashboard.image.js') }}
@endsection
@section('main')
	<h2>相册</h2>
	<hr />

	<div id="modal" class="modal hide fade in">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3></h3>
		</div>
		<div class="modal-footer">
			<a data-dismiss="modal" class="btn" href="#">确定并刷新</a>
		</div>
	</div>
	
	<div id="image-uploader" rel="tooltip" class="@if($images_num >= 5)hide@endif">		
		<noscript>			
			<p>Please enable JavaScript to use file uploader.</p>
		</noscript>
	</div>
	

	<div id="image-group">
		@forelse ($images as $image)
			<a class="fancybox" href="{{ URL::base() . '/images/profile/large/' . $image->filename }}">
				<img src="{{ URL::base() . '/images/profile/small/' . $image->filename_thumb }}" alt="" />
			</a>
		@empty
			<p>目前暂无照片</p>
		@endforelse
	</div>

	@if($images_num > 0)
		<hr style="clear:both;padding-top:40px;" />
		
		<div id="image-icon">
			<div id="image-icon-nav">
				@if($images_num > 1)<a href="" id="change" class="btn btn-primary">下一张图</a>@endif
				<a href="" id="delete" class="btn btn-primary">删除该图</a>
				<form action="{{ URL::to_route('dashboard_imagecrop') }}" method="post" style="display:inline;">
					<button type="submit" id="cropsubmit" class="btn btn-primary">设置头像</button>
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input type="hidden" id="imgtocrop" name="imgtocrop" value="{{ URL::base() . '/images/profile/large/' . $images['0']->filename }}" />
				</form>
			</div>

			<div id="image-icon-crop">
				<img src="{{ URL::base() . '/images/profile/large/' . $images['0']->filename }}" id="target" alt="" />
			</div>
		</div>
	@endif
@endsection