<!DOCTYPE html>
<?php
$m = new MongoClient();
$db = $m->bucket;
$collection =$db->videos;
$collection2 =$db->pull_request;
//echo $_GET['v_name'];
$cur=$collection->findOne(array("v_name"=>$_GET['v_name']));
$cur2=$db->albums->find();
session_start();
$username='';	
if(isset($_SESSION['u_name']))
{
  $username=$_SESSION['u_name'];
}
?>
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
		  	<p id="vid" class="mb-0" style="margin: 0 0 2px;font-size:20px;font-family: 'memphis_lt_stdlight';"><i><?=$_GET['v_name']?></i></p>
		  		<span id="request_status">
		  		<?php
		  		$cur3=$collection2->findOne(array("pull_u_name"=>$username,"v_name"=>$cur['v_name']));
		  		//var_dump($cur3);
				//echo $username." ".$cur['v_name'];
		  		$flag=0;
		  		if($cur3)
		  		{
		  			if($cur3['pull_request_status']==0)
		  				$flag=1;
		  			else if($cur3['pull_request_status']==1)
		  				$flag=2;
		  		}
		  		if($cur['album_name']=="null" && $cur['u_name']==$username)
		  		{

		  			if($flag!=2)
		  			{
		  		?>
		  		<button style="float:right;" class="btn btn-success" id="create_request">Create Pull Request</button>
		  		<?php
		  		}
		  		else
		  		{
		  		?>
		  		<span class="label label-warning" style="float:right;font-size: 75%;">Pending Request</span>
		  		<?php
		  		}
		  		}
		  		else if($cur['album_name']!='null')
		  		{
		  		?>
		  		<p class="mb-0" style="float:right;font-size:18px;font-family: 'Courier New', Georgia;"><i><?=$cur['album_name']?></i></p>
		  		<?php
		  		}
		  		else
		  		{
		  		?>
		  		<p class="mb-0" style="float:right;font-size:18px;font-family: 'Courier New', Georgia;"><i>Not in an album</i></p>
		  		<?php
		 	 	}
		 	 	?>
		  		<!-- <span class="label label-warning" style="float:right;font-size: 75%;">Pending Request</span> -->
		  		</span>
		  	
  		 	<footer style="margin-left:30%;" class="blockquote-footer">By<cite title="Source Title"><?=$cur['u_name']?></cite></footer>
		</blockquote>
		<hr>


		<div id="request" style="display:none;">
			 <div class="row">
			 	<div class="container">
			 		<div class="col-lg-12">
			 		<form id="pull_form" action="">
			 			<div class="col-lg-3-offset"></div>
			 			<div class="col-lg-3">
			 				  <div class="form-group">
      							<label for="sel1">Album List (<i>select one</i>):</label>
      								<select class="form-control" id="select_album">
      									<?php
      									foreach($cur2 as $doc)
      									{
      									if($doc['u_name']!=$username)
      									{
      									?>
								        <option><?=$doc['album_name']?></option>
								        <?php
								    	}
								    	}
								    	?>
      								</select>
      						  </div> 		
			 			</div>

			 			<div class="col-lg-3">
			 				<div class="form-group">
				 				<label for="msg">Msg for pull request:</label>
	  							<input type="text" class="form-control" id="msg" required>
			 				</div>
			 			</div>
			 			
			 			<div class="col-lg-3" style="margin-top: 4px;padding-left:50px;">
			 				<br>
			 				<button type="submit" style="background-color: rgba(0, 0, 0, 0.69);" class="btn btn-success" id="submit_request">CREATE</button>			
			 			</div>
			 			</form>
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
		$('#request').toggle(500);
	});
	 $('#pull_form').submit(function(event){
		if($("#msg").val()!='')
		{
			var ms=$("#msg").val();
			var al=$("#select_album").val();
			var vi='<?=$cur["v_name"]?>';
			var us='<?=$username?>';
			$.ajax({
				"url":"pull_request_handler.php",
				"type":"post",
				"dataType":"html",
				"data":{u_name:us,v_name:vi,album_name:al,pull_msg:ms},
				success:function(res){
						//alert(res);
				}
			});
			$('#request_status').html('<span class="label label-warning" style="float:right;font-size: 75%;">Pending Request</span>');
			$('#request').hide();

		}
		event.preventDefault();

	});
	
<?php
$m->close();
?>
</script>
</html>
