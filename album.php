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
				 array_push($arr_v_name,$document["v_name"]);
				 array_push($arr_v_link,$document["v_link"]);
				 array_push($arr_v_image,$document["v_image"]);
			}
			$doc_size=count($arr_v_name);
			
	?>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<div class="div1"><head>Albums</head></div>
	<body>
		<ul id="rig">
	<?php
	for($i=0;$i<$doc_size;$i++)
	{
	?>
    <li>
        <a class="rig-cell" href="video-page.php?v_link=<?=$arr_v_link[$i]?>&v_name=<?=$arr_v_name[$i]?>">
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