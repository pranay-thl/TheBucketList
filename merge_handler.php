<?php
$m2 = new MongoClient();
$db2 = $m2->bucket;
$choose=$_POST['flag'];
//echo $_POST['album_name']." ".$_POST['pull_u_name']." ".$_POST['v_name'];
//die();
$curr4=$db2->pull_request->findOne(array("album_name"=>$_POST['album_name'],"pull_u_name"=>$_POST['pull_u_name'],"v_name"=>$_POST['v_name']));
$curr5=$db2->videos->findOne(array("v_name"=>$curr4['v_name']));
//echo $_POST['u_name']." ".$_POST['v_name']." ".$_POST['album_name']." ".$_POST['pull_msg'];
if($choose==1)
{
	/*$newdata=array( 
	"pull_u_name" =>$curr4['pull_u_name'],
	"to_u_name" =>$curr4['to_u_name'],
	"v_name"=>$curr4['v_name'],
	"album_name"=>$curr4['album_name'],
	"pull_msg"=>$curr4['pull_msg'],
	"pull_request_status"=>0
	);*/
	$db2->pull_request->remove(array("pull_u_name" =>$curr4['pull_u_name'],"to_u_name" =>$curr4['to_u_name'],"v_name"=>$curr4['v_name'],"album_name"=>$curr4['album_name'],"pull_msg"=>$curr4['pull_msg'],"pull_request_status"=>$curr4['pull_request_status']));
	//$db2->pull_request->insert($newdata);
}
else if($choose==2)
{
	/*$newdata=array( 
	"pull_u_name" =>$curr4['pull_u_name'],
	"to_u_name" =>$curr4['to_u_name'],
	"v_name"=>$curr4['v_name'],
	"album_name"=>$curr4['album_name'],
	"pull_msg"=>$curr4['pull_msg'],
	"pull_request_status"=>2
	);*/
	//print_r($newdata);
	//die();
	$db2->pull_request->remove(array("pull_u_name" =>$curr4['pull_u_name'],"to_u_name" =>$curr4['to_u_name'],"v_name"=>$curr4['v_name'],"album_name"=>$curr4['album_name'],"pull_msg"=>$curr4['pull_msg'],"pull_request_status"=>$curr4['pull_request_status']));
	//print_r(array("pull_u_name" =>$curr4['pull_u_name'],"to_u_name" =>$curr4['to_u_name'],"v_name"=>$curr4['v_name'],"album_name"=>$curr4['album_name'],"pull_msg"=>$curr4['pull_msg'],"pull_request_status"=>$curr4['pull_request_status']));
	//die();
	//$db2->pull_request->insert($newdata);
	
	 $newdata2 = array( 
                    "u_name" =>$curr5['u_name'],
                    "v_name" =>$curr5['v_name'], 
                    "v_link" =>$curr5['v_link'], 
                    "v_image" =>$curr5['v_image'],
                    "album_name"=>$curr4['album_name'],
                    "is_private"=>$curr5['is_private']
                    );
	 $db2->videos->remove(array("v_name"=>$curr4['v_name']));
	 $db2->videos->insert($newdata2);


}
$m2->close();
//echo $_POST['flag'];
?>