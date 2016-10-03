<!DOCTYPE html>
<html>
	<?php
			$m = new MongoClient();
			$db = $m->bucket;
			$collection = $db->movies;
			$m_name='';
			$m_link='';
			$m_image='';
			$arr_m_name=array();
			$arr_m_link=array();
			$arr_m_image=array();
			$doc_size;
			$cursor = $collection->find();
			foreach ($cursor as $document) {
				 array_push($arr_m_name,$document["m_name"]);
				 array_push($arr_m_link,$document["m_link"]);
				 array_push($arr_m_image,$document["m_image"]);
			}
			$doc_size=count($arr_m_name);
			
	?>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<div class="div1"><head>Movies</head></div>
	<body>
		<ul id="rig">
	<?php
	for($i=0;$i<$doc_size;$i++)
	{
	?>
    <li>
        <a class="rig-cell" href="movie-page.php?m_link=<?=$arr_m_link[$i]?>&m_name=<?=$arr_m_name[$i]?>">
            <img class="rig-img" src="<?=$arr_m_image[$i]?>">
            <span class="rig-overlay"></span>
            <span class="rig-text"><?=$arr_m_name[$i]?></span>
        </a>
    </li>
	<?php
	}
	?>
</ul>
	</body>
</html>