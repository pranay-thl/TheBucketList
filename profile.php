<!DOCTYPE html>
<?php
session_start();
$m = new MongoClient();
$db = $m->bucket;
$collection = $db->user;
$collection2 =$db->videos;
$collection3 =$db->albums;
include('upload.php');
?>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
 <html lang="en" class="no-js"> <!--<![endif]-->
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
        <link href="css/profile1.css" rel="stylesheet" />
        <link href="css/profile2.css" rel="stylesheet" />
    </head>
<style type="text/css">
body { padding-bottom: 0px;
     }
body { padding-top: 70px; background:white }  
.navigation li a {
    padding: 20px 100px;
    float: left;
}   
</style>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
    <header>
        <span style="float:left;"><a href="index.php"><i class="fa fa-arrow-left" style="font-size: 20px;margin-top: 18px;"></i></a></span>
        <a class="logo" style="margin-left: 0px;" href="index.php">TheBucketList</a>
        <span id="top-nav">
            <a href="index.php?logout=true">  <i class="fa fa-sign-out" style="font-size:36px;margin-top:5px;"></i></a>
        </span>    
    </header>
    </nav>
<div class="container" style="width:100%;">
	<div class="row">
		<div class="col-sm-12 col-md-12 user-details">
            <div class="user-image">
                <img src="images/User-Default.jpg" alt="Karan Singh Sisodia" title="Karan Singh Sisodia" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
					<?php
						$name='';
						$user=$collection->findOne(array("u_name" => $_SESSION['u_name']));
						$name=($user['f_name'])." ".($user['l_name']);
					?>
                    <h3><?=$name?></h3>
                    <span class="help-block">Chandigarh, IN</span>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <!-- <span class="glyphicon glyphicon-user"></span> -->
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <!-- <span class="glyphicon glyphicon-cog"></span> -->
                            <span>My Videos</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email">
                            <!-- <span class="glyphicon glyphicon-envelope"></span> -->
                            <span>My Albums</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#events">
                            <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                            <span>Upload</span>
                        </a>
                    </li>
                </ul>
                <div class="user-body" style="padding:0;width:100%;">
                    <div class="tab-content">
                        <div id="information" class="tab-pane active">
                            
                            <!--  -->
    <div class="container" style="width:100%;">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12" style="padding:0px;" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$name?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/head-33638_640.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Department:</td>
                        <td>Programming</td>
                      </tr>
                      <tr>
                        <td>Hire date:</td>
                        <td>06/23/2013</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>Male</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Metro Manila,Philippines</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:.<?=$user['email']?>"><?=$user['email']?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer" style="padding: 40px 15px;">
                            <a href="#" data-original-title="Edit" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
                            <!--  -->

                        </div>
                        <div id="settings" class="tab-pane">
                            <h4>Uploaded Videos</h4>
							<?php
							$cursor=$collection2->find(array("u_name" => $_SESSION['u_name']));
							foreach ($cursor as $document)
							{
								?>
								<a href="video-page.php?v_link=<?=$document['v_link']?>&v_name=<?=$document['v_name']?>&v_image=<?=$document['v_image']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$document['v_name']?></p></a>
								<?php
							}
							?>
                        </div>
                        <div id="email" class="tab-pane">
                            <h4>Albums</h4>
			    <div class="row">	
				<span style=" font-family: 'Courier New', Georgia;"><p style="font-size:18px;text-align:center">Create New Album</p></span>
				<div class="container">
					<div class="col-lg-offset-4"></div>
						<?php
							$msg2='';
							if(isset($_POST['album_create']))
							{
								if(!empty($_POST['album_name']))
								{
								$already = $collection3->findOne(array("album_name" => $_POST['album_name']));
									if($already)
									{
										$msg2="Album already exists, please choose a diffrent name";
									}
									else
									{
										$u_name=$_SESSION['u_name'];
										$album_name=$_POST['album_name'];
										$document = array( 
										"u_name" =>$u_name, 
										"album_name" =>$album_name
										);
										$collection3->insert($document);
									}
								}
								else
								{
									$msg2="Please Enter an album name";	
								}
							}
						?>
						<div class="col-lg-8>">
							<form action="#email" method="POST">
							<div class="col-lg-4">
							</br>
							   <label>Album Name :<label>							
							</div>
							<div class="col-lg-4">
								<?php
								if($msg2!='')
								{
									echo $msg2;
								}
								?>
								</br>
								<input type="text" name="album_name" />
							</div>
							<div class="col-lg-4">
								</br>
								<input type="submit" value ="Create" name="album_create" class="btn btn-default"></input>
							</div>
							</form>
						</div>
						<div class="col-lg-4"></div>
				</div>
			     </div>					
			<?php
							$cursor=$collection3->find();
							foreach ($cursor as $document)
							{
								if($document['u_name']==$_SESSION['u_name'])
								{
								?>
								<a href="album-page.php?album_name=<?=$document['album_name']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$document['album_name']?></p></a>
								<?php
								}
							}
							?>
                        </div>
                        <div id="events" class="tab-pane">
                            <h4>Upload</h4>
							<center>
							<?php
							if($msg!='')
							{
							?>
									<p><?=$msg?></p>
							<?php
							}
							if($_SESSION['u_name']=='THL' || $_SESSION['u_name']=='rahul_2608')
							{
							?>
							</center>
							<hr/>
							<form action="#events" method="post" enctype="multipart/form-data">
							<div class="row">
							<div class="col-lg-4" style="padding-left: 50px;">
								<input type="file" name="fileToUpload"/> 
							</div>
							<div class="col-lg-4">
							<select id="select_album" name="album_select_name">
							<option value="null">Empty</option>
							<?php
							$cur=$collection3->find(array("u_name"=>$_SESSION["u_name"]));
							foreach($cur as $doc)
							{
							?>	
							  <option value="<?=$doc['album_name']?>"><?=$doc['album_name']?></option>
							<?php
							}
							?>
							</select>
							</div>
							<div class="col-lg-4">
							<select id="select" name="is_private">
							  <option value="public">Public</option>
							  <option value="private">Private</option>
				
							</select>
							</div>
							<div class="clearfix"></div>
						
							<div class="col-lg-12" style="margin-top:50px;">	 
								 <input type="submit" name="Upload" src="/images/very-basic-upload-icon.png" height="30" width ="30"></input>	
							</div>
							</div>
							</form>
							<?php
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="container">
          </div>
        </nav>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/super-panel.js"></script>
      <script src="js/profile.js"></script>
	<script>
	$(document).ready(function(){	
	$(document).on('change','#select',function(){
		if($(this).val()=='private')
		{	$('#select_album').val('null');
			$('#select_album').prop('disabled',true);
		}	
		else
			$('#select_album').prop('disabled',false);	
				
	});
	});
	</script>
</body>
</html>
