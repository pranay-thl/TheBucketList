<!DOCTYPE html>
<html>
<head>	
    <title>Admin Panel</title>
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
	<?php
			$m = new MongoClient();
			$db = $m->bucket;
			$collection = $db->videos;
			$v_name='';
			$v_link='';
			$v_image='';
			$vout='';
			if(isset($_POST['submit']))
			{
				$v_name=$_POST['v_name'];
				$v_link=$_POST['v_link'];
				$v_image=$_POST['v_image'];
				if($v_name==''||$v_link==''||$v_image=='')
				{
					$vout='Invalid Credentials';
					//echo 'hi';
				}
				else
				{
					//echo $m_name.' '.$m_link.' '.$m_image;
					$document = array( 
					"v_name" =>$v_name, 
					"v_link" =>$v_link, 
					"v_image" =>$v_image
					);
					$collection->insert($document);
					$vout='Succesfully inserted into database';
				}
			}
		?>
    <div style="width:600px;margin:0 auto;padding:80px;background:white;">
        <form action="admin.php" method="post">
				<p>Video Name: <input type="text" name="v_name"></p>
				</br>
				</br>
				<p>Video Link: <input type="text" name="v_link"></p>
				</br>
				</br>
				<p>Video Image: <input type="text" name="v_image"></p>
				</br>
				</br>
		<input type="submit" name="submit" value="submit">
		</form>
		<label>
				<p><?=$vout?></p>
		</label>
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
	<?php
	$m->close();
	?>
</body>
</html>
