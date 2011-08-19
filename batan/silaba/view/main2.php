<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Silaba</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.easing.compatibility.js"></script>
        <script type="text/javascript" src="js/jcarousellite.js"></script>                       


        <script type="text/javascript" src="js/slider.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header"><a href="index.html"><h1>Si<strong>Laba</strong></h1></a></div>
            <div id="nav"><div class="inner">
                    <ul>

                        <li><a href="index.php"<?php if($active_menu=="home") echo " class=\"current\""?>><span class="link">Home</span></a></li>
                        <li>
                            <a href="?l=psjmn"<?php if($active_menu=="psjmn") echo " class=\"current\""?>><span class="link">Sertifikasi</span></a>
                        </li>
                        <li><a href="?l=limbah"<?php if($active_menu=="limbah") echo " class=\"current\""?>><span class="link">Limbah</span></a></li>
                    </ul>

                </div></div>
            <div id="hold">
                
                
                
                <div id="content">
                    <div id="leftcolumn">
                        <?php include $view_content;?>
                    </div>
                    <div id="rightcolumn">                        
                        <?php if($sidebar) require $sidebar; else require "view/sidebar_default.php";?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div id="footer">
<!--                    <div class="box">
                        <h3>latest updates</h3>
                        <ul>

                            <li><a href="">some example link</a></li>
                            <li><a href="">another link</a></li>
                            <li><a href="">guess what this is</a></li>
                            <li><a href="">yep another link</a></li>
                            <li><a href="">you got it in one</a></li>
                        </ul>

                    </div>
                    <div class="box">
                        <h3>latest links</h3>
                        <ul>
                            <li><a href="">some example link</a></li>
                            <li><a href="">another link</a></li>
                            <li><a href="">guess what this is</a></li>

                            <li><a href="">yep another link</a></li>
                            <li><a href="">you got it in one</a></li>
                        </ul>
                    </div>
                    <div class="box2">
                        <h3>quick about</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis mi in tortor volutpat tempus. Maecenas imperdiet, eros facilisis scelerisque fringilla, libero nibh scelerisque nibh, eu semper nibh diam in arcu. Donec consequat mollis sollicitudin. Maecenas ac felis eu libero porttitor interdum. Aliquam erat volutpat.</p>

                    </div>-->
                    <div class="clear"></div>
                </div>
                <div id="copyright"><a href="http://www.freecss.info">Free CSS Templates</a></div>
            </div>
        </div>
    </body>
</html>