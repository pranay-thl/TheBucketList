<!DOCTYPE html>
<html>
<?php
$m=new mongoClient();
$db=$m->bucket;
$collection1=$db->user;
$collection2=$db->videos;
session_start();
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
	unset($_SESSION['admin']);
}
if(!isset($_SESSION['admin']))
{
    header("Location: admin_login.php");
}

?>

<head>	
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
        <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.bootstrap.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.responsive.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/dataTables.tableTools.min.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/colReorder.dataTables.min.css'>
        <link rel="stylesheet" type="text/css" href='css/plugins/dataTables/buttons.dataTables.min.css'>
        <link href="css/page.css" rel="stylesheet" />
        <link href="css/super-panel.css" rel="stylesheet" />
        <link href="css/profile1.css" rel="stylesheet" />
        <link href="css/profile2.css" rel="stylesheet" />
    <style>
    ul li {
    	padding:10px 0;
    	}
.navigation li a {
    padding: 20px 100px;
    float: left;
}   
</style>
</head>
<body>
    <header>
        <span data-panel="panel1" class="panel-button"></span>
        <a class="logo" style="" href="index.php">TheBucketList</a>

        <span id="top-nav">
            <a href="admin.php?logout=true">  <i class="fa fa-sign-out" style="font-size:36px;margin-top:5px;"></i></a>
        </span>    
    </header>
<!--  -->
<div class="container" style="width:80%;margin-top:50px;">
	<div class="row">
		<div class="col-sm-12 col-md-12 user-details">
            <div class="user-info-block" style="top: 0px;padding-top: 0px;">
	<ul class="navigation">
        <li class="active">
            <a data-toggle="tab" href="#approval">
                            <!-- <span class="glyphicon glyphicon-user"></span> -->
            <span><h1 style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;">Approval Requests</h1></span>
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#videos">
                            <!-- <span class="glyphicon glyphicon-cog"></span> -->
            <span><h1 style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;">Videos</h1></span>
            </a>
        </li>
        <li>
            <a data-toggle="tab" href="#albums">
                            <!-- <span class="glyphicon glyphicon-envelope"></span> -->
             <span><h1 style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;">Users</h1></span>
            </a>
        </li>
    </ul>
    <div class="user-body" style="padding:0;width:100%;">
    <div class="tab-content">
	    <div id="approval" class="tab-pane active">
	    	<?php
				
				$cur2=$collection2->find(array("approval" =>1,"is_private"=>"public"));
				/**/
			?>
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
                                                            <th ><i>Video Name</i></th>             
                                                            <th >ACCEPT</th>
                                                            <th >DENY</th>                         
                                                        </tr>
                                                        </thead>
                                                        <tbody>      
                                                    <?php
                                                    
                                                    	foreach($cur2 as $doc)
														{
                              ?>
                                                            <tr >
                                                            <br>                                                           
                                                            <td><a href="video-page.php?v_link='<?=$doc["v_link"]?>&v_name=<?=$doc["v_name"]?>&v_image=<?=$doc["v_image"]?>"><p style="text-align:center; font-size:18px; font-family: "Courier New", Georgia;"><?=$doc['v_name']?></p></a></td>

                                                            <td ><input id="<?=$doc['v_name']?>" type="submit" value="Approve" class="v_approve"></input></td>																	
                                                            <td ><input id="<?=$doc['v_name']?>" type="submit" value="Deny" class="v_deny"></input></td>
                                                            </tr>
                                                          <?php
                                                        }
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

		<div id="videos" class="tab-pane">
			<?php
			$cur2=$collection2->find();
			foreach($cur2 as $doc)
			{
			?>
			<label>
				<a href="video-page.php?v_link=<?=$doc['v_link']?>&v_name=<?=$doc['v_name']?>&v_image=<?=$doc['v_image']?>"><p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$doc['v_name']?></p></a>
			</label>
      <br>
			<?php
			}
			?>
		</div>
		
		<div id="albums" class="tab-pane">
			<?php
				$cur=$collection1->find();
				foreach($cur as $doc)
				{
			?>
				<label>
				<p style="text-align:center; font-size:18px; font-family: 'Courier New', Georgia;"><?=$doc['f_name']." ".$doc['l_name']?></p>
				</label>
        <br>
			<?php
				}
			?>
		</div>	
   </div>
   </div>
  </div>
  </div>
  </div> 
   <!--  -->
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
	<?php
	$m->close();
	?>
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
	<script src="js/super-panel.js"></script>
	<script src="js/plugins/dataTables/jquery.dataTables.min.js"></script>
  <script src="js/plugins/dataTables/dataTables.buttons.min.js"></script>
  <script src="js/plugins/dataTables/buttons.colVis.min.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
  <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
  <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
  <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>
  <script type="text/javascript">
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
   $(document).on('click','.v_approve',function(){
    var id = this.id; 
   // alert(id);
      /*'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'*/
      $.ajax({
        "url":"admin_handler.php",
        "type":"post",
        "dataType":"html",
        "data":{v_name1:id},
        success:function(res){
           // alert(res);
        }
      });
      $(this).val("Approved");
      $(this).prop('disabled',true);    
      $('#'+id).prop('disabled',true);           
  });

  $(document).on('click','.v_deny',function(){
    var id = this.id; 
      /*'<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'*/
      $.ajax({
        "url":"admin_handler.php",
        "type":"post",
        "dataType":"html",
        "data":{v_name2:id},
        success:function(res){
            //alert(res);
        }
      });
      $(this).val("Declined");
      $(this).prop('disabled',true);      
      $('#'+id).prop('disabled',true);
  });
  </script>
</html>