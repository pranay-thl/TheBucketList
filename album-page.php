<!DOCTYPE html>
<html>
	<?php
			$m = new MongoClient();
			$db = $m->bucket;
			$collection = $db->videos;
			$v_name='';
			$v_link='';
			$v_image='';
			$arr_v_name=array();
			$arr_v_link=array();
			$arr_v_image=array();
			$doc_size;
			$cursor = $collection->find();
			foreach ($cursor as $document) {
				if($_GET['album_name']==$document['album_name']&&$document['approval']==2)
				{
				 array_push($arr_v_name,$document["v_name"]);
				 array_push($arr_v_link,$document["v_link"]);
				 array_push($arr_v_image,$document["v_image"]);
				}
			}
			$doc_size=count($arr_v_name);
			
	?>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	
	<div class="div1"><head><span style="float:left;"><a href="album.php"><i class="fa fa-arrow-left" style="font-size: 40px;color:#FFF;margin-left: 30px;"></i></a></span><?=$_GET['album_name']?></head></div>
	<body>
		<ul id="rig">
	<?php
	for($i=0;$i<$doc_size;$i++)
	{
	?>
    <li>
        <a class="rig-cell" href="video-page.php?v_link=<?=$arr_v_link[$i]?>&v_name=<?=$arr_v_name[$i]?>&v_image=<?=$arr_v_image[$i]?>">
            <img class="rig-img" src="<?=$arr_v_image[$i]?>">
            <span class="rig-overlay"></span>
            <span class="rig-text"><?=$arr_v_name[$i]?></span>
        </a>
    </li>
	<?php
	}
	$m->close();
	?>
</ul>
	</body>
</html>
