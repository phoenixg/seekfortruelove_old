@layout('layouts.default')
@section('page_styles_header')
	{{ HTML::style('css/index.css') }}
@endsection
@section('page_scripts_header')
@endsection
@section('content')
	<div class="container">
		<div class="hero-unit">
			<h2>定位于上海地区，面向所有单身青年男女，以婚恋为目的的免费交友平台</h2>
			
			@if ( !Auth::check() )
			<p><a class="btn btn-primary btn-large" href="register">免费注册</a></p>
			@endif

			<p>
				<!-- twitter share button -->
				<a href="https://twitter.com/share" class="twitter-share-button" data-lang="zh-cn">发推</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</p>
		</div>

		<h2 id="diff"><a href="#difference">想知道本站如何与众不同？</a></h2>

		<div class="row" id="difference">
			<div class="span12">
				<h3><span class="diff_title">1</span> 非营利原则</h3>
				<p><strong>交友应该是完全免费的</strong>，金钱不应成为阻挡。不少营利性交友网站都有“付费看信”、“VIP会员”、“会员等级”等设计，为对抗这些网站的做法导致的机会不平等，本站将采用非营利原则。</p>
				<p>尽管如此，如果愿意，未来您仍可以通过捐赠等方式支持本站。这些资助将被用于服务器维护等开销。如有必要，我将设法确保这些资助是透明、可被追溯的。</p>
			</div>
			<div class="span12">
				<h3 style="text-align:right;"><span class="diff_title">2</span> 无广告原则</h3>
				<p>即便是主内交友网站，也能时常看到无关、甚至色情广告出现在网站上。我无法理解一个倡导基督爱心的网站，左边还是对于虔诚、洁身自好的倡导，右边却是“伟哥”、“性病”、“帮助流产”医院的广告。难道主内的网站不得不依靠出卖对持守的信念才能维持？难道依靠广告获得盈利真的就这么重要，以至于明知这些网站与信仰违背，却故作无关紧要？</p>
				<p>此外，无广告还有利于用户体验，将所有注意力集中在网站本身提供的功能上，而不用被广告分心。</p>
			</div>
			<div class="span12">
				<h3><span class="diff_title">3</span> 无差异原则</h3>
				<p>本站被设计为无差异地对待每一位访问者，不设置特权和级别；无论是普通注册会员还是捐赠用户，所有功能与特性也是完全一致的。</p>
			</div>
			<div class="span12">
				<h3 style="text-align:right;"><span class="diff_title">4</span> 强调文字而非照片</h3>
				<p>仅以照片、头像作为对一个人第一印象的认知途径培养了错误的爱情观，为对抗这一交友网站的普遍做法，本站被设计为强调人与人的内心沟通，而非简单地以貌取人。</p>
				<p>在未经对方授权情况下，您所能看到的所有照片都将以<strong>黑白素描</strong>形式显示。</p>
			</div>
			<div class="span12">
				<h3><span class="diff_title">5</span> 真实性原则</h3>
				<p>本站尽最大可能验证用户信息的真实性，不真实的信息将遭到严格的审核和清除，参看：<a href="#">具体规定</a>和<a href="#">隐私条款</a></p>
			</div>
		</div>

		<br />
		<br />

		<div class="row">
			<div class="span12" style="text-align: center;">
				<i>[ 公测中 ]</i><br>
				<i>更多期待请加QQ群：287539779</i>
			</div>
		</div>


	</div>
@endsection
