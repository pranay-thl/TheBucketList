<?php
$m2 = new MongoClient();
$db2 = $m2->bucket;
$collection2 =$db2->videos;
if(isset($_POST['v_name1']))
				{
					echo $_POST['v_name1'];
					$collection2->update(array("v_name"=>$_POST['v_name1']),array('$set'=>array('approval' => 2)));
				}
				else if(isset($_POST['v_name2']))
				{
					$collection2->update(array("v_name"=>$_POST['v_name2']),array('$set'=>array('approval' => 0)));
				}
$m2->close();
?>