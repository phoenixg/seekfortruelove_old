<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<!--
	{{ HTML::style('css/profile.css') }} 
	{{ HTML::script('js/jquery.shutter/jquery.shutter.css') }} 
-->
<style type="text/css">
*{
margin:0;
padding:0;
}


#container{
width:640px;
height:400px;
width:240px;
height:240px;


margin:0 auto;
border:5px solid #fff;
overflow:hidden;
-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

#container ul{
list-style:none;
}


.shutterAnimationHolder .film canvas{
display: block;
    margin: 0 auto;
}

.shutterAnimationHolder .film{
position:absolute;
left:50%;
top:0;
}

.shutterAnimationHolder{
position:absolute;
overflow:hidden;
top:0;
left:0;
z-index:1000;
}
</style>

</head>

<body>

<h1>Boy you are in test</h1>

<div id="container">
<ul>
        <li><img src="http://173.230.150.168/gitprojects/seekfortruelove/public/images/profile/icon/2.jpg" width="140" height="300" alt="Landscape" /></li>
        <li><img src="http://cdn.tutorialzine.com/wp-content/uploads/2011/03/shutter-effect-canvas-jquery.jpg" width="640" height="400" alt="Yacht club" /></li>
    </ul>
</div>


{{ HTML::script('js/jquery-1.8.0.min.js') }}

{{ HTML::script('js/jquery.shutter/jquery.shutter.js') }}
{{ HTML::script('js/profile.js') }}
</body>
</html>
