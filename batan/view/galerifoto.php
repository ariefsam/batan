<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <base href='<?php echo $config->base_url ?>' />
	<link href='css/style.css' rel='stylesheet' type="text/css" />
<link href='kategori.css' rel='stylesheet' type="text/css" />
<link href='beritaBatan.css' rel='stylesheet' type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" href="http://serpong6.batan.go.id/favicon.ico" type="image/ico">

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {

	$("ul#topnav li").hover(function() { //Hover over event on list item
		$(this).css({ 'background' : '#1376c9 url(topnav_active.gif) repeat-x'}); //Add background color and image on hovered list item
		$(this).find("span").show(); //Show the subnav
	} , function() { //on hover out...
		$(this).css({ 'background' : 'none'}); //Ditch the background
		$(this).find("span").hide(); //Hide the subnav
	});

});
</script>
<script>var _wau = _wau || []; _wau.push(["tab", "0025j8x5g8r4", "bts", "right-middle"]);(function() { var s=document.createElement("script");
 s.async=true; s.src="http://widgets.amung.us/tab.js";document.getElementsByTagName("head")[0].appendChild(s);})();</script>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>SimpleViewer Gallery</title>
</head>
<body>
	<!--START SIMPLEVIEWER EMBED.-->
	<div class="galerifoto"><a href="portal/home.html">Beranda</a>&nbsp &nbsp |&nbsp &nbsp
	<a href="portal/home/galeri.html">Galeri</a>&nbsp &nbsp |&nbsp &nbsp
	<a href="portal/home/galerivideo.html">Video </a>&nbsp &nbsp </div>

	<script type="text/javascript" src="svcore/js/simpleviewer.js"></script>
	<script type="text/javascript">
	simpleviewer.ready(function () {
		simpleviewer.load('sv-container', '100%', '100%', '222222', true);
	});
	</script>
	<div id="sv-container"></div>
	<!-- END SIMPLEVIEWER EMBED -->


</body>
</html>
