<!DOCTYPE html>
<html>
<body>
<?php
$m = new MongoClient();
echo "connected";
$db = $m->bucket;
echo "databse selected";
$m->close();
?>
</body>
</html>