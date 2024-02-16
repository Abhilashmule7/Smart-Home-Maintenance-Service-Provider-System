<?php 
$target_dir = "../uploads/";
$newfilename= date('dmyhis').str_replace(" ", "", basename($_FILES["fileToUpload"]["name"]));
$target_file = $target_dir . $newfilename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$res="";
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //$res= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $res=$res."Uploaded file in not an image<br>";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $res=$res."Sorry, file already exists.<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $res=$res."Sorry, your file should be less than 500Kb.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    $res=$res."Sorry, only JPG, JPEG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $res=$res."Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    //move_uploaded_file($_FILES["file"]["tmp_name"], "../img/imageDirectory/" . $newfilename);    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $res=$res."The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $_SESSION['imgName']=$newfilename;        
    } else {
        $res=$res."Sorry, there was an error uploading your file.";
    }
}
	$insQuery="UPDATE `listingmaster` SET photoName='".$newfilename."' where id='".($_POST['lid'])."'";	

	if($conn->query($insQuery))
	{
		$_SESSION['imsg']=$res;		
	}
	else
	{
		$_SESSION['imsg']=$res.". Cannot upload the data to server.";
	}
?>