<?php
session_start();
$m = new MongoClient();
echo "connected";
$db = $m->bucket;
echo "databse selected";
?>