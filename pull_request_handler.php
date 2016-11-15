<?php
$m2 = new MongoClient();
$db2 = $m2->bucket;
$collection4 =$db2->pull_request;
$curr4=$db2->albums->findOne(array("album_name"=>$_POST['album_name']));
//echo $_POST['u_name']." ".$_POST['v_name']." ".$_POST['album_name']." ".$_POST['pull_msg'];
$document = array( 
"pull_u_name" =>$_POST['u_name'],
"to_u_name" =>$curr4['u_name'],
"v_name"=>$_POST['v_name'],
"album_name"=>$_POST['album_name'],
"pull_msg"=>$_POST['pull_msg'],
"pull_request_status"=>1
);
$collection4->insert($document);
$m2->close();
?>