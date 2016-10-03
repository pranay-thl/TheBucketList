<!DOCTYPE html>
<html>
<head>
    <title><?=$_GET['m_name']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/page.css" rel="stylesheet" />
    <link href="css/super-panel.css" rel="stylesheet" />
    <script src="js/super-panel.js"></script>
    <style>ul li {padding:10px 0;}</style>
</head>
<body>
    <header>
        <span data-panel="panel1" class="panel-button"></span>
        <a class="logo" href="index.php">TheBucketList</a>
        <span id="top-nav">
          <!--  <a href="demo1.html" class="active">DEMO 1</a> -->
        </span>
	</header> 
		<link href="css/video-js.css" rel="stylesheet">
		<script src="js/videojs-ie8.min.js"></script>
    <div style="width:800px;margin:0 auto;padding:100px;background:white;">
		<div style="padding-left:5%">
			<!--poster="MY_VIDEO_POSTER.jpg"   include this below-->
			<video id="my-video" class="video-js" controls preload="auto" width="720" height="364" data-setup="{}">
			<source src="<?=$_GET['m_link']?>" type='video/mp4'>
			<source src="<?=$_GET['m_link']?>" type='video/wem'>
			<!--<source src="MY_VIDEO.webm" type='video/webm'>-->
			<p class="vjs-no-js">
			To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video</a>
			</p>
			</video>
			<script src="js/video.js"></script>
		</div>
	</div>
</body>
	
	
	<div id="panel1">
		</br></br>
        <!--<div style="text-align:center;margin:20px 0 10px;">
            <img src="src/socials.png" />
        </div>-->
        <div id="vertical-nav">
            <a href="DC">TheHurtLocker</a>
            <!--<a href="http://172.22.30.182:81/Shared">Linus</a>-->
            <a href="grid.php">Movies</a>
			<a href="movie_req.php">Movie Request</a>
			<a href="chat_bot.php">Chat Bot</a>
			<a href="admin_login.php">Admin</a>
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
</body>
</html>
