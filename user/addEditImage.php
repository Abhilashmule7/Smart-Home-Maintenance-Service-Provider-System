<?php 
session_start();
include('include/config.php');
include('include/enc.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date('d-m-Y h:i:s A');
if(isset($_GET['lid']))
{
	$_SESSION['list']=$_GET['lid'];
}
if(isset($_POST['submit']))
{	
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
        $res=$res."Uploaded file in not an image!";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $res=$res."Sorry, file already exists!";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $res=$res."Sorry, your file should be less than 500Kb.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
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
	$insQuery="UPDATE `listingmaster` SET photoName='".$newfilename."' where id='".mysqli_real_escape_string($connection,$_POST['lid'])."'";	

	if($conn->query($insQuery))
	{		
		?>
		<script>
			alert('<?php echo $res;?>');
			location.replace("addEditImage.php?lid=<?php echo $_SESSION['list'];?>");
		</script>
		<?php
	}
	else
	{ ?>		
		<script>
			alert('Cannot upload image to server. Try after some time');
		</script>
	<?php }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Modify Image | User</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body data-background-color="dark">
	<div class="wrapper">
		<?php include("header.php");?>
		<!-- Sidebar -->
		<?php include("sidebar.php");?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="mt-2 mb-4 text-white">
						<h1>My Listing</h1>						
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Modify your image here</h4>
								</div>
								<div class="card-body">
								<span style="color: red">&nbsp;You can add only one photo</span>
								<p style="color: green">

								</p>									
									<form action="addEditImage.php" method="post" enctype="multipart/form-data">
										 Select image to upload:<br>										 
										 <input type="hidden" name="lid" value="<?php echo $_GET['lid'];?>">
    									<input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
    									<?php 
    										if(isset($_GET['lid']))
    										{
    											$searchImg="select photoName from listingmaster where id='".$_GET['lid']."' and photoName!='NA'";
    											$rr=$conn->query($searchImg);
    											if(mysqli_num_rows($rr)>0)
    											{ $ro=mysqli_fetch_assoc($rr) ;
    												?>
													<img id="blah" src="../uploads/<?php echo $ro['photoName'];?>" alt="your image" style="max-height: 250px; max-width: 250px"/><br><br>										
    											<?php }
    											else
    											{ ?>
													<img id="blah" src="images/img.png" alt="your image" style="max-height: 250px; max-width: 250px"/><br><br>										
    											<?php }
    										}
    									?>
    									<input type="submit" value="Upload Image" name="submit" class="btn btn-o btn-primary">
									</form>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End of main content-->
			<?php include("footer.php");?>			
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<?php include("settings.php");?>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<!--<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>-->

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>	


	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>
	<script>
		$('#lineChart').sparkline([102,109,120,99,110,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart2').sparkline([99,125,122,105,110,124,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});

		$('#lineChart3').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: 'rgba(255, 255, 255, .5)',
			fillColor: 'rgba(255, 255, 255, .15)'
		});
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});

		  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function myFunction()
        {        	
        			var xxmlhttp = new XMLHttpRequest();  												
					xxmlhttp.onreadystatechange = function() {
  					if (this.readyState == 4 && this.status == 200) {					
    				var xmyObj = JSON.parse(this.responseText);    		
    					if(xmyObj)
		    				{
	    						//alert(xmyObj+" from message page");	
		    				}    					 
		    				else
		    				{
		    					//alert("Couldnt send SMS");
		    				}  	
    					}    					
    				};   				
					xxmlhttp.open("GET", encodeURI("include/sendGatePassMessage.php?"+que), true);
					xxmlhttp.send();
        }
	</script>
</body>
</html>