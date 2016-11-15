<!DOCTYPE html>
<?php
session_start();
$m = new MongoClient();
$db = $m->bucket;
$collection = $db->user;
$collection2 =$db->videos;
$collection3 =$db->albums;
$collection4=$db->pull_request;
include('upload.php');
if(!isset($_SESSION['u_name']))
{
  header("Location: login.php");
}
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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.bootstrap.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.responsive.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.tableTools.min.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/colReorder.dataTables.min.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/buttons.dataTables.min.css'>
<style type="text/css">
table {
  border-spacing: 20px 10px;
}



body { padding-bottom: 0px;
     }
body { padding-top: 70px; background:white }  
.navigation li a {
    padding: 20px 100px;
    float: left;
}   
</style>
    </head>
    <body>
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <?php
      if(isset($_POST['Update']))
      {
        $dob = $_POST['dob'];
        $Gender = $_POST['Gender'];
        $Address = $_POST['Address'];
        $email = $_POST['email'];
        $p_no1 = $_POST['p_no1'];
        $p_no2 = $_POST['p_no2'];
        $collection->update(array("u_name"=>$_SESSION['u_name']),array('$set'=>array('email' => $email,'dob'=>$dob,'gender'=>$Gender,'address'=>$Address,'p_no1'=>$p_no1,'p_no2'=>$p_no2)));
      } 
    
        $name='';
        $user=$collection->findOne(array("u_name" => $_SESSION['u_name']));
        $name=($user['f_name'])." ".($user['l_name']);
    ?>
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <form action="profile.php" method="POST" id="update_info"> 
        <div class="modal-body">
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
                      <div class="col-md-3 col-lg-3 " align="center"> 
                        <img alt="User Pic" src="images/head-33638_640.png" class="img-circle img-responsive"> 
                      </div>
                      <div class=" col-md-9 col-lg-9 ">  
                      <table class="table table-user-information">
                        <tbody>
                        <tr>
                          <td>Date of Birth</td>
                          <td><input class="form-control" type="date" name="dob" placeholder="01/24/1988" required></td>
                        </tr> 
                        <tr>
                          <td>Gender</td>
                          <td><label class="radio-inline">
                                <input type="radio" name="Gender" value="Female">Female
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="Gender" value="Male" checked>Male
                              </label>
                          </td>
                        </tr>
                        <tr>
                          <td>Home Address</td>
                          <td>
                            <textarea name="Address" class="form-control" rows="2" placeholder="Metro Manila,Philippines" required></textarea>
                          </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><input class="form-control" type="email" name="email" placeholder="<?=$user['email']?>" required></td>
                        </tr>
                        <tr>
                          <td>Phone Number</td>
                          <td><input type="number" min="0000000"   name="p_no1" class="form-control" placeholder="123-4567-890" required>
                              <br>
                              <input type="number" min="000000000" max="9999999999" name="p_no2" class="form-control" placeholder="555-4567-890">
                              </td>   
                        </tr>
                        </tbody>

                      </table>
                      </div>
                    </div>
                  </div> 
                </div>
               </div>
              </div>
            </div>
            
          <!--  -->
        </div>
        <div class="modal-footer">
          <input  type="submit" class="btn btn-success" name="Update" value="Update">
        </div>
        </form> 
      </div>
       
    </div>
  </div>

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
                <img src="images/User-Default.jpg" alt="<?=$name?>" title="<?=$name?>" class="img-circle">
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3><?=$name?></h3>
                    <span class="help-block">Chandigarh, IN</span>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <!-- <span class="glyphicon glyphicon-user"></span> -->
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#settings">
                            <!-- <span class="glyphicon glyphicon-cog"></span> -->
                            <span>Videos</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#email">
                            <!-- <span class="glyphicon glyphicon-envelope"></span> -->
                            <span>Albums</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#events">
                            <!-- <span class="glyphicon glyphicon-calendar"></span> -->
                            <span>Upload</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#requests">
                            <!-- <span class="glyphicon glyphicon-envelope"></span> -->
                            <span>Pull Requests</span><span class="badge"><?=$collection4->find(array("to_u_name"=>$_SESSION['u_name']))->count()?></span>
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
                        <td>Date of Birth</td>
                        <td><?=$user['dob']?></td>
                      </tr>
                        <td>Gender</td>
                        <td><?=$user['gender']?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?=$user['address']?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:.<?=$user['email']?>"><?=$user['email']?></a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td><?=$user['p_no1']?>(Landline)<br><br><?=$user['p_no2']?>(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer" style="padding: 40px 15px;">
               <a href="#" data-toggle="modal" type="button" class="btn btn-sm btn-warning" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i></a> 
            </div>
          </div>
        </div>
      </div>
    </div>
                            <!--  -->
                        </div>
                        <?php
                        if(isset($_POST['delete']))
                        {
                          ?>
                          <script>
                            alert("Video Deleted :"+"<?=$_POST['del_name']?>");
                          </script>
                          <?php
                          $collection2->remove(array("v_name"=>$_POST['del_name']));
                          $collection4->remove(array("v_name"=>$_POST['del_name']));
                          unlink($_POST['del_link']);

                        }
                        ?>
                        <div id="settings" class="tab-pane">
                            <h4>Uploaded Videos</h4>
              <?php
              $cursor=$collection2->find(array("u_name" => $_SESSION['u_name']));
              foreach ($cursor as $document)
              {
                ?>
                <div class="row">
                <div class="col-lg-4">
                <a href="video-page.php?v_link=<?=$document['v_link']?>&v_name=<?=$document['v_name']?>&v_image=<?=$document['v_image']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$document['v_name']?></p></a>
                </div>
                <div class="col-lg-2">
                <a href="video-page.php?v_link=<?=$document['v_link']?>&v_name=<?=$document['v_name']?>&v_image=<?=$document['v_image']?>#disqus_thread">Comments</a>
                </div>
                <div class="col-lg-3">
                <?php
                if($document['approval']==1)
                {
                ?>
                <span class="label label-warning" style="float:right;font-size: 75%;">Pending Approval</span>
                <?php
                }
                ?>
                </div>
                <div class="col-lg-3">
                  <form method="POST" action="profile.php">
                  <input type="hidden" name="del_link" value="<?=$document['v_link']?>"></input>
                  <input type="hidden" name="del_name" value="<?=$document['v_name']?>"></input>
                  <input type="submit" value="Delete" name="delete"></input>
                  </form>
                </div>
                </div>
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
                    $msg2="Album ".$album_name." has been created successfully";
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
                  ?>
                  <script>
                  alert("<?=$msg2?>");
                  </script>
                  <?php
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
           <br><br><br>       
      <?php
              if(isset($_POST['a_delete']))
              {
                ?>
                <script>alert("Album Deleted: "+"<?=$_POST['del_a_name']?>");</script>
                <?php
                $collection2->update(array("album_name"=>$_POST['del_a_name']),array('$set'=>array('album_name' => "null")));
                $collection3->remove(array("album_name"=>$_POST['del_a_name']));
                $collection4->remove(array("album_name"=>$_POST['del_a_name']));
              }
              $cursor=$collection3->find();
              foreach ($cursor as $document)
              {
                if($document['u_name']==$_SESSION['u_name'])
                {
                ?>
                <div class="col-lg-8">
                <a href="album-page.php?album_name=<?=$document['album_name']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$document['album_name']?></p></a>
                </div>
                <div class="col-lg-4">
                  <form method="POST" action="profile.php">
                  <input type="hidden" name="del_a_name" value="<?=$document['album_name']?>"></input>
                  <input type="submit" value="Delete" name="a_delete"></input>
                  </form>
                </div>
                <?php
                }
              }
              ?>
                        </div>
                        <div id="requests" class="tab-pane">
                        <div class="wrapper wrapper-content animated fadeInRight">
                            <div class="row">
                              <div class="tabs-container">
                                  <div class="tab-content">
                                  <div id="tab-1" class="tab-pane active">
                                      <div class="panel-body">
                                        <div class="col-lg-12">
                                            <div class="ibox float-e-margins">
                                                <div class="ibox-content">

                                                    <table class="table table-striped table-bordered table-hover" id="footable1">
                                                        <thead>
                                                        <tr>
                                                            <th ><i>User Name</i></th>
                                                            <th >Video Name</th>  
                                                            <th >Album Name</th>
                                                            <th>PR Message</th>             
                                                            <th ></th>
                                                            <th ></th>                                                                                                
                                                        </tr>
                                                        </thead>
                                                        <tbody>      
                                                    <?php
                                                    $pull_cur=$collection4->find(array("to_u_name"=>$_SESSION['u_name'],"pull_request_status"=>1));
                                                      $counter=1;
                                                      foreach($pull_cur as $doc)
                                                      {
                                                            echo '<tr >';
                                                            echo '<td id="'.$counter.'p">'.$doc['pull_u_name'].'</td>';
                                                            echo '<td id="'.$counter.'v">'.$doc['v_name'].'</td>';
                                                            echo '<td id="'.$counter.'a">'.$doc['album_name'].'</td>';
                                                            echo '<td id="'.$counter.'a">'.$doc['pull_msg'].'</td>';
                                                            echo '<td ><input id="'.$counter.'" type="button" class="btn btn-success accept '.$counter.'accept" value="Accept"></td>';
                                                            echo '<td ><input id="'.$counter.'" type="button" class="btn btn-danger remove '.$counter.'remove" value="Decline"></td>';
                                                            echo ' </tr>';
                                                            $counter++;
                                                        }
                                                        //}
                                                      //}
                                                      
                                                    ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                                  </div>
                              </div>            
                            </div>
                          </div>                            
                        </div> 


                        <div id="events" class="tab-pane">
                            <h4>Upload</h4>
              <center>
              <?php
              if($msg!='')
              {
              ?>
                  <script>alert("<?=$msg?>");</script>
              <?php
              }
              if(isset($_SESSION['u_name']))
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

  <script src="js/super-panel.js"></script>
  <script src="js/profile.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
  <script src="js/plugins/dataTables/jquery.dataTables.min.js"></script>
  <script src="js/plugins/dataTables/dataTables.buttons.min.js"></script>
  <script src="js/plugins/dataTables/buttons.colVis.min.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
  <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
  <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
  <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>
  
  <script>
$(document).ready(function() {

    var table  = $('#footable1').DataTable( {
     
      "bDestroy":true,
      "bFilter": true,
      'dom': 'lfrtip',
      'columnDefs': [{
         'targets': 0,
         'searchable':true,
         'orderable':true,
         'className': 'dt-body-center'
      }],
      "buttons": [
            'colvis',
        ]
    });
  });

</script>
  <script>
  $(document).ready(function(){ 
  $(document).on('change','#select',function(){
    if($(this).val()=='private')
    { $('#select_album').val('null');
      $('#select_album').prop('disabled',true);
    } 
    else
      $('#select_album').prop('disabled',false);  
        
  });

  $(document).on('click','.accept',function(){
    var id = this.id; 
      var text = $("#"+id+"p").text();
      var text1 = $("#"+id+"v").text();
      var text2 = $("#"+id+"a").text();
      /*'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'*/
      $.ajax({
        "url":"merge_handler.php",
        "type":"post",
        "dataType":"html",
        "data":{pull_u_name:text,v_name:text1,album_name:text2,flag:2},
        success:function(res){
            //alert(res);
        }
      });
      $(this).val("Accepted");
      $(this).prop('disabled',true);    
      $('.'+id+'remove').prop('disabled',true);           
  });

  $(document).on('click','.remove',function(){
    var id = this.id; 
      var text = $("#"+id+"p").text();
      var text1 = $("#"+id+"v").text();
      var text2 = $("#"+id+"a").text();
      /*'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'*/
      $.ajax({
        "url":"merge_handler.php",
        "type":"post",
        "dataType":"html",
        "data":{pull_u_name:text,v_name:text1,album_name:text2,flag:1},
        success:function(res){
            //alert(res);
        }
      });
      $(this).val("Declined");
      $(this).prop('disabled',true);      
      $('.'+id+'accept').prop('disabled',true);
  });

  });
  </script>
 <!--  <script type="text/javascript">
  function form_submit() {
    document.getElementById("update_info").submit();
   }    
  </script> -->
  <?php
  $m->close();
  ?>
  <script id="dsq-count-scr" src="//thebucketlist-1.disqus.com/count.js" async></script>
</body>
</html>
