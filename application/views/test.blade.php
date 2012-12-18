<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script> 
	<link href="http://173.230.150.168/gitprojects/seekfortruelove/jquery_news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
	<script src="http://173.230.150.168/gitprojects/seekfortruelove/jquery_news_ticker/includes/jquery.ticker.js" type="text/javascript"></script>

</head>

<body>

<ul id="js-news" class="js-hidden">
    <li class="news-item"><a href="#">This is the 1st latest news item.</a></li>
    <li class="news-item"><a href="#">This is the 2nd latest news item.</a></li>
    <li class="news-item"><a href="#">This is the 3rd latest news item.</a></li>
    <li class="news-item"><a href="#">This is the 4th latest news item.</a></li>
</ul>
<script type="text/javascript">
$(function () {
    $('#js-news').ticker(
        speed: 0.10,           // The speed of the reveal
        ajaxFeed: false,       // Populate jQuery News Ticker via a feed
        feedUrl: false,        // The URL of the feed
                           // MUST BE ON THE SAME DOMAIN AS THE TICKER
        feedType: 'xml',       // Currently only XML
        htmlFeed: true,        // Populate jQuery News Ticker via HTML
        debugMode: true,       // Show some helpful errors in the console or as alerts
                           // SHOULD BE SET TO FALSE FOR PRODUCTION SITES!
        controls: true,        // Whether or not to show the jQuery News Ticker controls
        titleText: 'Latest',   // To remove the title set this to an empty String
        displayType: 'reveal', // Animation type - current options are 'reveal' or 'fade'
        direction: 'ltr'       // Ticker direction - current options are 'ltr' or 'rtl'
        pauseOnItems: 2000,    // The pause on a news item before being replaced
        fadeInSpeed: 600,      // Speed of fade in animation
        fadeOutSpeed: 300      // Speed of fade out animation
    );
});         
</script>



<h1>Boy you are in test, what can I do for you?</h1>




</body>
</html>
