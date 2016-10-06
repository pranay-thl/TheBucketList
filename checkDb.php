<!DOCTYPE html>
<html>
<body>
<?php
$MONGODB_URL="mongodb://admin:ZGXWEDVVLBXOPZNQ@sl-us-dal-9-portal.3.dblayer.com:15536/admin?ssl=true";
$m = new MongoClient($MONGODB_URL);
echo "connected";
$db = $m->admin;
echo "databse selected";
$m->close();
?>
</body>
</html>