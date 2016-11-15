<?php
$name=$_POST['name'];
$m = new MongoClient();
$db = $m->bucket;
$collection =$db->videos;
$regex=new MongoRegex("/.*".$name.".*/");
$cur=$collection->find(array('v_name' => $regex));
$result="";
$found=0;
//echo $cur->count();
foreach($cur as $doc)
{
	$found=1;
	//if($res1=="")
		//$res1='video-page.php?v_link='.$doc["v_link"].'&v_name='.$doc["v_name"].'&v_image='.$doc["v_image"];
	//echo $doc["v_name"];
	$result.='<li class="s_res" style="padding-top:10px;"><strong><i><a href="video-page.php?v_link='.$doc["v_link"].'&v_name='.$doc["v_name"].'&v_image='.$doc["v_image"].'">'.$doc["v_name"].'</a></i></strong></li>';
}
if($found==0)
{
	$result="<p><i><strong>No results Found!</strong></i></p>";
	//$result='<li class="s_res" style="padding-top:10px;"><strong>No Results Found!</i></strong></li>'
}
echo $result;
$m->close();
?>