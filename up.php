<?php
include('upload.php');
?>
<html>
<head>
<title>UPload Video</title>
</head>
<body>
<center>
<script type="text/javascript">
    google_ad_client = "ca-pub-6338063578832547";
    google_ad_slot = "5073283314";
    google_ad_width = 600;
    google_ad_height = 90;
</script>
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center>
<hr/>
<form method="post" enctype="multipart/form-data">
<table bgcolor="#F9F9F9" border="0" style="padding:10px" align="center">
<tr>
	<td colspan="2"></td>
</tr>
<tr>
      <td height="50">Choose Video</td>
      <td> <input type="file" name="fileToUpload"/> </td>
</tr>
<tr>
     <td height="50" colspan="2" align="center">
     <input type="submit" value="Upload Video" name="Upload"/>
     <input type="submit" value="Display Video" name="Display"/> </td>
</tr>
</table>
</form>
</body>
</html>