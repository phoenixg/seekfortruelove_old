<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<title>SEEK FOR TRUELOVE - ADMINISTRATION PANEL</title>

	<!-- favicon -->
	<link id="favicon" href="favicon.ico" rel="icon" type="image/x-icon" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{ Asset::styles() }}
	@yield('page_styles_header')

	{{ Asset::scripts() }}
	@yield('page_scripts_header')

	<script type="text/javascript">
		var BASE = "<?php echo URL::base(); ?>";
	</script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				{{ HTML::link_to_route('home', 'Seek For Truelove', array() , array('class' => 'brand')) }}

				<div class="nav-collapse pull-right">
					<ul class="nav">
						<li>{{ HTML::link('admin/logout', '注销') }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	

	<div id="main">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="well">
						<ul class="nav nav-list">
							<li class="nav-header">控制面板</li>
							<li class="@if(isset($menuflg_index))active@endif">
								<a href="{{ URL::to_route('dashboard') }}"><i class="icon-home@if(isset($menuflg_index)) icon-white@endif"></i> 统计</a>
							</li>

							<li class="nav-header">个人信息</li>
							<li class="@if(isset($menuflg_profile))active@endif">
								<a href="{{ URL::to_route('dashboard_profile') }}"><i class="icon-user@if(isset($menuflg_profile)) icon-white@endif"></i> 资料</a>
							</li>
							<li class="@if(isset($menuflg_image))active@endif">
								<a href="{{ URL::to_route('dashboard_image') }}"><i class="icon-picture @if(isset($menuflg_image)) icon-white@endif"></i> 相册</a>
							</li>
													
							<li class="nav-header">高级功能</li>
							<li><a href="#"><i class="icon-pencil"></i> 项目</a></li>
						</ul>
					</div>
				</div>

				<div class="span9">
					@yield('main')
				</div>
			</div>
		</div>
	</div>


	@yield('page_scripts_footer')
</body>
</html>