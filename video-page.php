<!DOCTYPE html>
<html>
<head>
    <title><?=$_GET['v_name']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
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
    <div style="width:800px;margin:0 auto;padding:20px;background:white;">
    	<blockquote class="blockquote blockquote-reverse" style="padding: 5%;text-align:left;">
		  	<p class="mb-0" style="margin: 0 0 2px;font-size:28px;"><i><?=$_GET['v_name']?></i>
		  		<span id="request_status">
		  		<button style="float:right;" class="btn btn-success" id="create_request">Create Pull Request</button>
		  		<!-- <span class="label label-warning" style="float:right;font-size: 75%;">Pending Request</span> -->
		  		</span>
		  	</p>
  		 	<footer style="margin-left:30%;" class="blockquote-footer">By<cite title="Source Title">Shubham Sharma</cite></footer>
		</blockquote>
		<hr>


		<div id="request" style="display:none;">
			 <div class="row">
			 	<div class="container">
			 		<div class="col-lg-12">
			 			<div class="col-lg-3-offset"></div>
			 			<div class="col-lg-3">
			 				  <div class="form-group">
      							<label for="sel1">Album List (<i>select one</i>):</label>
      								<select class="form-control" id="">
								        <option>1</option>
								        <option>2</option>
								        <option>3</option>
								        <option>4</option>
      								</select>
      						  </div> 		
			 			</div>

			 			<div class="col-lg-3">
			 				<div class="form-group">
				 				<label for="msg">Any Msg:</label>
	  							<input type="text" class="form-control" id="msg">
			 				</div>
			 			</div>
			 			
			 			<div class="col-lg-3" style="margin-top: 4px;padding-left:50px;">
			 				<br>
			 				<button style="background-color: rgba(0, 0, 0, 0.69);" class="btn btn-success" id="submit_request">CREATE</button>			
			 			</div>
			 		</div>
			 	</div>
			 </div>
		</div>

		<div style="padding:5%">
			<!--poster="MY_VIDEO_POSTER.jpg"   include this below-->
			<video poster="<?=substr($_GET['v_image'],0,strlen($_GET['v_image'])-4)."2".substr($_GET['v_image'],strlen($_GET['v_image'])-4)?>" id="my-video" class="video-js" controls preload="auto" width="720" height="364" data-setup="{}">
			<source src="<?=$_GET['v_link']?>" type='video/mp4'>
			<source src="<?=$_GET['v_link']?>" type='video/wem'>
			<!--<source src="MY_VIDEO.webm" type='video/webm'>-->
			<p class="vjs-no-js">
			To view this video please enable JavaScript, and consider upgrading to a web browser that supports HTML5 video</a>
			</p>
			</video>
			<script src="js/video.js"></script>
		</div>
		<div id="disqus_thread"></div>
			<script>

			/**
			*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
			*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
			/*
			var disqus_config = function () {
			this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
			this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
			};
			*/
			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = '//thebucketlist-1.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		</div>
	
	
	<div id="panel1">
		</br></br>
        <!--<div style="text-align:center;margin:20px 0 10px;">
            <img src="src/socials.png" />
        </div>-->
        <div id="vertical-nav">
            <a href="video.php">Videos</a>
			<a href="album.php">Albums</a>
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).on('click','#create_request',function(){
		$('#request').toggle(1000);
	});
	$(document).on('click','#submit_request',function(){
		$('#request_status').html('<span class="label label-warning" style="float:right;font-size: 75%;">Pending Request</span>');
		$('#request').hide();
	});
	

</script>
</html>
