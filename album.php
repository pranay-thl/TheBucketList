<!DOCTYPE html>
<html>
	<?php
			$m = new MongoClient();
			$db = $m->bucket;
			$collection = $db->albums;
			$u_name='';
			$album_name='';
			$arr_u_name=array();
			$arr_album_name=array();
			$doc_size;
			$cursor = $collection->find();
			foreach ($cursor as $document) {
				 array_push($arr_u_name,$document["u_name"]);
				 array_push($arr_album_name,$document["album_name"]);
			}
			$doc_size=count($arr_u_name);
			
	?>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	
	<div class="div1"><head><span style="float:left;"><a href="index.php"><i class="fa fa-arrow-left" style="font-size: 40px;color:#FFF;margin-left: 30px;"></i></a></span>Albums</head></div>
	<body>
		<ul id="rig">
	<?php
	for($i=0;$i<$doc_size;$i++)
	{
	?>
    <li>
        <a class="rig-cell" href="album-page.php?album_name=<?=$arr_album_name[$i]?>">
            <img class="rig-img" src="images/video_album_image.png">
            <span class="rig-overlay"></span>
            <span class="rig-text"><?=$arr_album_name[$i]?></span>
        </a>
    </li>
	<?php
	}
	$m->close();
	?>
</ul>
	</body>
</html>