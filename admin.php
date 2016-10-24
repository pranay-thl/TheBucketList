<!DOCTYPE html>
<html>
<?php
$m=new mongoClient();
$db=$m->bucket;
$collection1=$db->user;
$collection2=$db->videos;
?>

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
    <div style="width:900px;margin:0 auto;:padding:80px;background:white;">
    	<h1 style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;">List Of Users</h1>
	        <?php
		$cur=$collection1->find();
		foreach($cur as $doc)
		{
		?>
		<label>
				<p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$doc['f_name']." ".$doc['l_name']?></p>
		</label>
		<?php
		}
		?>
		</br>
		<h1 style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;">List Of Videos</h1>
		<?php
		$cur2=$collection2->find();
		foreach($cur2 as $doc)
		{
		?>
		<label>
			<a href="video-page.php?v_link=<?=$doc['v_link']?>&v_name=<?=$doc['v_name']?>&v_image=<?=$doc['v_image']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$doc['v_name']?></p></a>
		</label>
		<?php
		}
		?>
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
