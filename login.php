<!DOCTYPE html>
<?php
session_start();
$m = new MongoClient();
$db = $m->bucket;
$collection = $db->user;
if(isset($_SESSION['u_name']))
{
        header("Location: index.php");
}
?>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
    		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link href="css/page.css" rel="stylesheet" />
		<link href="css/super-panel.css" rel="stylesheet" />
		<script src="js/super-panel.js"></script>
      <style>
    </head>
    <style type="text/css">
body { padding-bottom: 40px;
     }
body { padding-top: 70px; }     
.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #ff0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: rgb(80, 157, 200);
  color: #fff;
}
.tab-group .active a {
  background: rgb(61, 157, 179);
  color: #fff;
}
#wrapper a{
    color: #fff;
    text-decoration: none;
}
    </style>
    <body>
    
    <nav class="navbar navbar-default navbar-fixed-top">
    <header>
        <span style="float:left;"><a href="index.php"><i class="fa fa-arrow-left" style="font-size: 20px;margin-top: 18px;"></i></a></span>
        <a class="logo" style="margin-left: 0px;" href="index.php">TheBucketList</a>
    </header>
	</nav>
        <div class="container">
            <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>

                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <ul class="tab-group">
                                <li class="tab active"><a href="#tologin" class="to_register">Login</a></li>
                                <li class="tab "><a href="#toregister" class="to_register">Sign up</a></li>
                            </ul>
							<?php
								$u_name='';
								$password='';
								$vout='';
								$login_status="false";
								if(isset($_POST['login']))
								{
									$u_name=$_POST['username'];
									$password=$_POST['password'];
									$user = $collection->findOne(array("u_name" => $u_name, "password" => $password));
									if($user)
									{
										$_SESSION['u_name']=$u_name;
										header("Location: index.php");
									}
									else
									{
										$vout='Invalid Credentials';
									}
								}
							?>
							<?php
								$f_name='';
								$l_name='';
								$password='';
								$password2='';
								$email='';
								if(isset($_POST['signup']))
								{
									$u_name=$_POST['usernamesignup'];
									$f_name=$_POST['fnamesignup'];
									$l_name=$_POST['lnamesignup'];
									$password=$_POST['passwordsignup'];
									$password2=$_POST['passwordsignup_confirm'];
									$email=$_POST['emailsignup'];
									//echo $u_name." ".$f_names." ".$l_names." ".$password1." ".$email;
									$user1 = $collection->findOne(array("u_name" => $u_name));
									if($password!=$password2)
									{
										/*header("Location: index.php");*/
										$vout="Passwords do not match";
									}
									else if($user1)
									{
										$vout="Username Already exists";
									}
									else
									{
										$document = array( 
										"u_name" =>$u_name, 
										"f_name" =>$f_name, 
										"l_name" =>$l_name, 
										"email" =>$email, 
										"password" =>$password
										);
										$collection->insert($document);
										$_SESSION['u_name']=$u_name;
										header("Location: index.php");
									}
								}
							?>
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <!--<p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>-->
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Login" /> 
								</p>
								<label>
									<p><?=$vout?></p>
								</label>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <ul class="tab-group">
                                <li class="tab"><a href="#tologin" class="to_register">Login</a></li>
                                <li class="tab active"><a href="#toregister" class="to_register">Sign up</a></li>
                            </ul>
                            <form  action="#toregister" autocomplete="on" method="post"> 
                                <h1> Sign up </h1>
								<p> 
                                    <label for="fnamesignup" class="uname" data-icon="u">Your first name</label>
                                    <input id="fnamesignup" name="fnamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
								<p> 
                                    <label for="lnamesignup" class="uname" data-icon="u">Your last name</label>
                                    <input id="lnamesignup" name="lnamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p class="signin button"> 
									<input type="submit" name="signup" value="Sign up"/> 
								</p>
								<label>
									<p><?=$vout?></p>
								</label>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
                    </div>
                </div>  
            </section>
        </div>
        <nav class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="container">
          </div>
        </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/super-panel.js"></script>
	  <?php
	  $m->close();
	  ?>
    </body>
</html>
