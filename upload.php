<<<<<<< HEAD
<?php
$msg='';
if (!empty($_FILES)) {
  // =============  File Upload Code  ===========================================
    
    $ds          = DIRECTORY_SEPARATOR;  //1
    $storeFolder = 'data/videos';
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
    $target_file = $targetPath. $_FILES['fileToUpload']['name'];
    
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        $msg= "Sorry, file already exists.";
        $uploadOk = 0;
    }

     // Check file size -- Kept for 500Mb
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        $msg= "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4") {
       $msg= "Sorry, only wmv, mp4 & avi files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
   	if($uploadOk!=0){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$user=$_SESSION['u_name'];
			$v_name=substr($_FILES["fileToUpload"]["name"],0,strlen($_FILES["fileToUpload"]["name"])-4);
			$v_link="data/videos/".$_FILES["fileToUpload"]["name"];
			$v_image="data/videos/default.jpg";
			$document = array( 
					"u_name" =>$user,
					"v_name" =>$v_name, 
					"v_link" =>$v_link, 
					"v_image" =>$v_image
					);
					$collection2->insert($document);
        } else {
            $msg= "Sorry, there was an error uploading your file.";
        }
    }


  }

?>
=======
<?php
$msg='';
if(isset($_POST['Upload'])){
    // =============  File Upload Code d  ===========================================
    $target_dir = "/var/www/html/data/videos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if file already exists
    if (file_exists($target_file)) {
        $msg= "Sorry, file already exists.";
        $uploadOk = 0;
    }
     // Check file size -- Kept for 500Mb
    if ($_FILES["fileToUpload"]["size"] > 800000000) {
        $msg= "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4") {
       $msg= "Sorry, only wmv, mp4 & avi files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
     if($uploadOk!=0) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $msg= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $user=$_SESSION['u_name'];
            $v_name=substr($_FILES["fileToUpload"]["name"],0,strlen($_FILES["fileToUpload"]["name"])-4);
            $v_link="data/videos/".$_FILES["fileToUpload"]["name"];
            $v_image="data/videos/default.jpg";
            $document = array( 
                    "u_name" =>$user,
                    "v_name" =>$v_name, 
                    "v_link" =>$v_link, 
                    "v_image" =>$v_image,
                    "album_name"=>$_POST['album_select_name'],
                    "is_private"=>$_POST['is_private']
                    );
                    $collection2->insert($document);
        } else {
            $msg= "Sorry, there was an error uploading your file.";
        }
    }
    }
>>>>>>> d01d82a50575ea5dc4111e2e72457fadcce8cbfb
