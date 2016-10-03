<!DOCTYPE html>
<html>
<head>
    <title>Chat Panel</title>
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
		
		/*while (@ ob_end_flush()); // end all output buffers if any
		$cmd='ping 172.22.31.147';
		$proc = popen($cmd, 'r');
		echo '<pre>';
		while (!feof($proc))
		{
			echo fread($proc, 4096);
			@ flush();
		}
		echo '</pre>';
		*/
		?>
		<?php
			$vout='';
			$vout_arr=[""];
			if(isset($_POST['submit']))
			{
				$vin=$_POST['input_text'];
				$vout=exec('python bot.py '.$vin);
				$vout_arr=explode(" ",$vout);
				if($vout_arr[1]=="redirect")
				{
					header("Location: ".$vout_arr[0]);
					
				}
				else
				{
					$vout='';
					for($i=0;$i<sizeof($vout_arr)-1;$i++)
					{
						$vout.=$vout_arr[$i];
						$vout.=" ";
					}
				}
			}
		?>
        <form method="post">
			<label>
				BotIn: <input type="text" name="input_text">
			</label>
			<input type="submit" name="submit">
		</form>
		</br></br>
		<label>
				<p>Bot: <?=$vout?></p>
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
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
</body>
</html>
