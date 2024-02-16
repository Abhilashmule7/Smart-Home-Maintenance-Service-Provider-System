<?php 
session_start();
include('include/config.php');
include('include/enc.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date('d-m-Y h:i:s A');
if(isset($_POST['submit']))
{				
		{
			$sql = "INSERT INTO `listingmaster`(`userID`, `listingName`, `ownerName`, `category`, `address`, `phoneNumber`, `email`, `websiteLink`, `description`, `ammenities`, `workingTime`, `rates`, `registered`) ";
			$vals="VALUES ('".$_SESSION['id']."','".$_POST['companyName']."','".$_POST['ownerName']."','".$_POST['category']."','".$_POST['address']."','".$_POST['phoneNumber']."','".$_POST['email']."','".$_POST['websiteLink']."','".$_POST['description']."','".$_POST['ammenities']."','".$_POST['workingHours']."','".$_POST['rates']."','".$currentTime."')";
			$sql=$sql.$vals;
			if ($conn->query($sql) === TRUE) 
			{	?>			
				<script>
					alert('Your listing has been submited!');
				</script>
			<?php }
			else {				
				?>
			<script>
				alert('<?php echo $conn->error;?>!');
			</script>
			<?php
			}			
		}	
}

if(isset($_GET['del']) && $_GET['del']=="delete" && isset($_GET['id']))
{
	$del="delete from listingmaster where id='".$_GET['id']."'";
	if($conn->query($del) === TRUE)
	{ ?>
		<script>
			window.location.replace("viewService.php");
		</script>

	<?php }
	else
	{
		?>
		<script>
			window.location.replace("viewService.php");			
			alert('<?php echo $conn->error;?>');
		</script>

	<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>My Services | User</title>
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
									<h4 class="card-title">All Categories</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>ID</th>
													<th>Company Name</th>
													<th>Owner Name</th>													
													<th>Category</th>																										
													<th>Phone</th>
													<th>Email</th>
													<th>Registered</th>													
													<th>Action</th>																																																			
												</tr>
											</thead>
										
											<tbody>
												<?php 
													$que="select * from listingmaster where userID='".$_SESSION['id']."'";
													$res=$conn->query($que);
													while($row=$res->fetch_assoc())
													{ ?>
														<tr>
															<td>
																<input type="button" class="btn btn-transparent btn-xs tooltips" name="idButton" value="<?php echo $row['id']?>" onclick="location.href='viewServiceDetails.php?iid=<?php echo $row['id'];?>'">																
																

															</td>
															<td><?php echo $row['listingName'];?></td>
															<td><?php echo $row['ownerName'];?></td>
															<td><?php echo $row['category'];?></td>
															<td><?php echo $row['phoneNumber'];?></td>
															<td><?php echo $row['email'];?></td>															
															<td><?php echo $row['registered'];?></td>																														
															<td>
																<a href="viewService.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white" style="font-size: 18px"></i></a>
																<a href="editService.php?id=<?php echo $row['id']?>" onClick="" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Edit"><i class="fa fa-edit fa fa-white" style="font-size: 15px"></i></a>
																<a href="addEditImage.php?lid=<?php echo $row['id'];?>" onClick="" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Edit"><i class="fa fa-image fa fa-white" style="font-size: 15px"></i></a>																
															</td>															
														</tr>
													<?php }
												?>
											</tbody>
										</table>
									</div>
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
	</script>
</body>
</html>