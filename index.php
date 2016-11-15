<!DOCTYPE html>
<?php
session_start();
$m = new MongoClient();
$db = $m->bucket;
$collection =$db->videos;
$username='';
if(isset($_GET['logout']))
{
	unset($_SESSION['u_name']);
}	
if(isset($_SESSION['u_name']))
{
  $username=$_SESSION['u_name'];
}
?>
<?php
		if(isset($_POST['button']))
		{
			$cursor=$collection->findOne(array("v_name"=>$_POST['search']));
			if($cursor)
			{
				header("Location: video-page.php?v_link=".$cursor['v_link']."&v_name=".$cursor['v_name']."&v_image=".$cursor['v_image']);
			}
		}
	?>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	    <link href="css/page.css" rel="stylesheet" />
    	<link href="css/super-panel.css" rel="stylesheet" />
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="css/page.css" rel="stylesheet" />
		<link href="css/super-panel.css" rel="stylesheet" />
		<script src="js/super-panel.js"></script>
    	<style>
    		ul li {padding:10px 0;}
   		 </style>

		 <style>
					#custom-search-input{
				padding: 3px;
				border: solid 1px #E4E4E4;
				border-radius: 6px;
				background-color: #fff;
			}

			#custom-search-input input{
				border: 0;
				box-shadow: none;
			}

			#custom-search-input button{
				margin: 2px 0 0 0;
				background: none;
				box-shadow: none;
				border: 0;
				color: #666666;
				padding: 0 8px 0 10px;
				border-left: solid 1px #ccc;
			}

			#custom-search-input button:hover{
				border: 0;
				box-shadow: none;
				border-left: solid 1px #ccc;
			}

			#custom-search-input .glyphicon-search{
				font-size: 23px;
			}
					
						ul li {padding:10px 0;}
   		 </style>
		 
		 
	<header>
        <span data-panel="panel1" class="panel-button"></span>
        <a class="logo" href="index.php">TheBucketList</a>
		<span id="top-nav">
		  <?php
		  if($username!='')
		  {
		  ?>
			<a href="profile.php" style="border-left:1px solid #ccc; font-size:18px; font-family: 'Courier New', Georgia;"><b>Hi <?php echo $username."</b>";?></a>
			<a href="index.php?logout=true">  <i class="fa fa-sign-out" style="font-size:36px;margin-top:5px;"></i></a>
			<?php
		  }
		  else
		  {
		  ?>
		  <a href="login.php">  <i class="fa fa-sign-in" style="font-size:36px;margin-top:5px;"></i></a>
		  <?php
		  }
		  ?>
          <!--<img margin-right=5px; id="status" src="images/pause.png" alt="Play Button" width="50" height="50"  style="cursor: pointer;" onclick="playSound()" >-->
        </span>
    </header>  




    <title>TheBucketList</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script>
    <link href="css/generic.css" rel="stylesheet" type="text/css" />
	 <link href="css/chatbox.css" rel="stylesheet" type="text/css" />
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	
	</head>
<body>

<!-- <audio src="DC/The_Big_Ship.mp3" autoplay>
<p>If you are reading this, it is because your browser does not support the audio element.     </p>
</audio> -->
</br>

<!--<audio id="sound" src="sound/The_Big_Ship.mp3" autoplay loop></audio>
<script type="text/javascript">
var audio = document.getElementById("sound");
	function playSound()
	{
		if (audio.paused == false){
			document.getElementById('status').src='images/play.png';
			audio.pause();
			}
		else{
			document.getElementById('status').src='images/pause.png';
			audio.play();
		}
	}
</script>-->
   <!-- <div class="div1"><h2>The Bucket List</h2></br></br>-->
   
   <div class="div2" style="margin-top:5px;margin-bottom:20px;width: 600px;">
	<div class="container">
	  <div class="row">
        <div class="col-md-6">
			<div class="col-lg-2" style="width: 6.76666667%;padding-right: 0px; padding-left: 0px;">
				<a  class="btn btn-primary" style="float:left;"><i class="fa fa-search fa-lg"></i></a>
			</div>
			<div class="col-lg-10" style=" padding-right: 0px; padding-left: 0px;">
			<form id="searchForm" role="search" class="h_search_form navbar-form-custom" action="">
            <div class="form-group" >
                <input type="text" autocomplete="off" placeholder="Start typing..." class="form-control" name="search" id="search" onkeyup="show();">
				<ul id="browse" class="browse list-group" style="display:none;margin-left:0;padding: 10px;"></ul>
            </div>
           	</form>
           	</div>
		</div>
	  </div>
    </div>
   </div>    

   <div>
		
			<div class="div2">
       
    </div>
    <div id="sliderFrame">
	<p style="text-align:center; font-size:28px; font-family: 'Courier New', Georgia;">Trending Videos</p>
        <div id="slider">
		
	<!-- 	Append this section to change the images -->
            <a href="video-page.php?v_link=data/videos/Watchtower of Turkey.mp4&v_name=Watchtower of Turkey&v_image=data/videos/Watchtower.of.Turkey.jpg"><img src="data/videos/Watchtower.of.Turkey3.jpg" alt="Watchtower of Turkey"/></a>
             <a href="video-page.php?v_link=data/videos/Me and Earl and the dying girl.mp4&v_name=Me and Earl and the dying girl&v_image=data/videos/default.jpg"><img src="images/image-slider-2.gif" alt="Me and Earl and The Dying Girl(2015)"/></a>
           <a href="video-page.php?v_link=data/videos/Short Term 12.mp4&v_name=Short Term 12&v_image=data/videos/default.jpg"><img src="images/image-slider-3.jpeg" alt="Short Term 12 (2013)"/></a>
                       <a href="video-page.php?v_link=data/videos/The Perks of being a Wallflower.mp4&v_name=The Perks of being a Wallflower&v_image=data/videos/default.jpg"><img src="images/image-slider-4.gif" alt="The Perks of Being a Wallflower(2012)"/></a>
       
	   </div>
        <div id="htmlcaption" style="display: none;">
            
        </div>
    </div>
	<div class="div2">
       
    </div>
	<!--<div class="div1"><a href="http://172.22.31.147:81/DC"><h2 align="center">Shared-TheHurtLocker</h2></a>
	<div class="div1"><a href="http://172.22.30.182:81/Shared"><h2 align="center">Shared-Linus</h2></a>-->
    <div class="div2">
    </div>
		
   </div>
   
	
	<!--<div class="round hollow text-center">
        <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Open in chat </a>
    </div>-->
	
	
	<div id="panel1">
		</br></br>
        <!--<div style="text-align:center;margin:20px 0 10px;">
            <img src="src/socials.png" />
        </div>-->
        <div id="vertical-nav">
            <a href="video.php">Videos</a>
			<a href="album.php">Albums</a>
			<a href="about.php">About us</a>
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
	<!--
	<div class="popup-box chat-popup" id="qnimate">
    		  <div class="popup-head">
				<div class="popup-head-left pull-left"><img src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" alt="iamgurdeeposahan"> Gurdeep Osahan</div>
					  <div class="popup-head-right pull-right">
						<div class="btn-group">
    								  <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
									   <i class="glyphicon glyphicon-cog"></i> </button>
									  <ul role="menu" class="dropdown-menu pull-right">
										<li><a href="#">Media</a></li>
										<li><a href="#">Block</a></li>
										<li><a href="#">Clear Chat</a></li>
										<li><a href="#">Email Chat</a></li>
									  </ul>
						</div>
						
						<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
                      </div>
			  </div>
			<div class="popup-messages">
    		
			
			
			
			<div class="direct-chat-messages">
                    
					
					<div class="chat-box-single-line">
								<abbr class="timestamp">October 8th, 2015</abbr>
					</div>
					
					
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                      </div>

                      <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img">
                      <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                      </div>
					  <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                      </div>
						<div class="direct-chat-info clearfix">
						<span class="direct-chat-img-reply-small pull-left">
							
						</span>
						<span class="direct-chat-reply-name">Singh</span>
						</div>
                    </div>
                    
					
					<div class="chat-box-single-line">
						<abbr class="timestamp">October 9th, 2015</abbr>
					</div>
			
					
					
				
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                      </div>
                      
                      <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img">
                      <div class="direct-chat-text">
                        Hey bro, how’s everything going ?
                      </div>
					  <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                      </div>
						<div class="direct-chat-info clearfix">
						  <img alt="iamgurdeeposahan" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img big-round">
						<span class="direct-chat-reply-name">Singh</span>
						</div>
                      
                    </div>
                   
					
					
                    

                    

                  </div>
			
			
			
			
			
			
			
			
			
			</div>
			<div class="popup-messages-footer">
			<textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
			<div class="btn-footer">
			<button class="bg_none"><i class="glyphicon glyphicon-film"></i> </button>
			<button class="bg_none"><i class="glyphicon glyphicon-camera"></i> </button>
            <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i> </button>
			<button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i> </button>
			</div>
			</div>
	  </div>
	  

<script>	  
	  $(document).ready(function(){
		$("#addClass").click(function () {
		  $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
		});
</script>
-->	

<script type="text/javascript">        
function show(){
    $('.browse').css('display','block');
    	var name=$('#search').val();
    	if(name=='')
    		$('.browse').css('display','none');
    	$.post(
    		'search_handler.php',
    		{'name':name},
    		function (res){
    
    	  $('.browse').html(res);
     	});
  }

  $('.browse').mouseleave(function(){
    	$('.browse').css('display','none');
  	});

  $('#searchForm').submit(function(event){
    	return false;
        event.preventDefault();
	});
</script>
</body>
</html>
