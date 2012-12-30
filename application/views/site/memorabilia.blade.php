@layout('layouts.default')

@section('content')
<div class="container">
	<h1>网站大事记</h1>
	<p>2012年12月21日 上线</p>

	<p>2012年12月22日 第一位注册用户诞生</p>
	<img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121229.png' }}" alt="" />

	<p>2012年12月26日 在yimaneili和赞美社先后遭到删贴，不得不改成非主内定位</p>
	<img src="{{ URL::base() . '/images/memorabilia/' . 'screenshot20121230.png' }}" alt="" />
</div>
@endsection