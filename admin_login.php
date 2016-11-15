<!DOCTYPE html>
<html>
<head>
<?php
session_start();
if(isset($_SESSION['admin']))
{
        header("Location: admin.php");
}
?>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/page.css" rel="stylesheet" />
    <link href="css/super-panel.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
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
    <div style="width:600px;margin:0 auto;padding:15px;">
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
          $_SESSION['admin']=$u_name;
          header("Location: admin.php");
        }
        else
        {
          $vout='Invalid Credentials';
        }
      }
    ?>
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">ADMIN login to TheBucketList</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-10">
                      <div class="well">
                          <form id="loginForm" method="POST" action="admin_login.php" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>

                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" >
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <?php if($vout!=" "){?>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              <?php } ?>
                              <div class="checkbox">
                              </div>
                              <input type="submit" class="btn btn-success btn-block" name="login" value="Login">
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

   </div>
  <div id="panel1">
    </br></br>
        <!--<div style="text-align:center;margin:20px 0 10px;">
            <img src="src/socials.png" />
        </div>-->
        <div id="vertical-nav">
            <a href="video.php">Videos</a>
      <a href="album.php">Albums</a>
      <a href="about.php">About Us</a>
        </div>
        <br /><br />
        <p style="text-align:center;font-size:smaller;font-style:italic;">
            It was the best of times, It was the worst of times, It was life.<br />
        </p>
    </div>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
  <script src="js/super-panel.js"></script> 
</html>


    