<!DOCTYPE html>
<html>
<head>
<?php// phpinfo(); ?>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/page.css" rel="stylesheet" />
    <link href="css/super-panel.css" rel="stylesheet" />
    <script src="js/super-panel.js"></script>
    <style>ul li {padding:10px 0;}</style>
</head>
<body>
    <header>
        <span data-panel="panel1" class="panel-button"></span>
        <a class="logo" href="index.php">TheBucketList</a>
        <span id="top-nav">
          <!--  <a href="demo1.html" class="active">DEMO 1</a> -->
        </span>
    </header>        
    <div style="width:600px;margin:0 auto;padding:80px;background:white;">
		<?php
			$u_name='';
			$password='';
			$vout='';
			if(isset($_POST['login']))
			{
				$u_name=$_POST['username'];
				$password=$_POST['password'];
				if($u_name=='THL'&&$password=='behappydamnit')
				{
					header("Location: admin.php");
				}
				else
				{
					$vout='Invalid Credentials';
				}
			}
		?>
        <form action="admin_login.php" method="post">
			<label>
				User Name: <input type="text" name="username">
			</label>
			</br>
			<label>
				Password:&nbsp&nbsp&nbsp <input type="password" name="password">
			</label>
		<input type="submit" name="login" value="login">
		</form>
		<label>
				<p><?=$vout?></p>
		</label>
   </div>
	<div id="panel1">
		</br></br>
        <!--<div style="text-align:center;margin:20px 0 10px;">
            <img src="src/socials.png" />
        </div>-->
        <div id="vertical-nav">
            <a href="DC">TheHurtLocker</a>
            <!--<a href="http://172.22.30.182:81/Shared">Linus</a>-->
            <a href="grid.php">Movies</a>
			<a href="movie_req.php">Movie Request</a>
			<a href="chat_bot.php">Chat Bot</a>
			<a href="admin_login.php">Admin</a>
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
</body>
</html>
