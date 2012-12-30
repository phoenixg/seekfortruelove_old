@layout('layouts.default')

@section('content')
<div class="container">
	<h1>网站大事记</h1>
	<p>2012年12月21日 上线</p>

	<p>2012年12月22日 第1位注册用户诞生</p>

	<p>2012年12月26日 在yimaneili和赞美社先后遭到删贴，不得不改成非主内定位</p>

	<a href="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121229.png' }}">screenshot</a>

	<p>2012年12月30日的截图</p>
	<a href="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121230.png' }}">screenshot</a>
</div>
@endsection