<!DOCTYPE html>
<html>
<body>
<?php
$MONGODB_URL="mongodb://admin:ZGXWEDVVLBXOPZNQ@sl-us-dal-9-portal.3.dblayer.com:15536/admin?ssl=true";
$m = new MongoClient($MONGODB_URL);
$url = parse_url($MONGODB_URL);
$db_name = preg_replace('/\/(.*)/', '$1', $url['path']);
echo "connected";
$db = $m->selectDB($db_name);
echo "databse selected";
$m->close();
?>
</body>
</html>