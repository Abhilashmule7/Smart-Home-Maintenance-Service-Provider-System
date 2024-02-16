<?php
include("include/config.php");
include('include/enc.php');

if(!session_start())
{
	session_start();
}
if(isset($_POST['submit'])) 
{
  $sql = "SELECT * FROM `logindetails` where email='".mysql_real_escape_string($_POST['uname'])."' and password='".mysql_real_escape_string($_POST['psw'])."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row['role']=="ADMIN")
    {
      $extra="admin/dashboard.php";
      $_SESSION['login']=$_POST['uname'];
      $_SESSION['id']=$row['id'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=1;
      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      //echo $_SESSION['login'];
      header("location:http://$host$uri/$extra");
      exit();
    }
    if($row['role']=="USER")
    {
      $extra="user/dashboard.php";
      $_SESSION['ulogin']=$_POST['uname'];
      $_SESSION['id']=$row['id'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=1;
      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      //echo $_SESSION['login'];
      header("location:http://$host$uri/$extra");
      exit();
    }
  }
   else {
    ?>
    <script>alert('Invalid Credentials');</script>
    <?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

    <!-- Page Title -->
    <title>Service Directory</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <script>
    	var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    </script>
   <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

</head>

<body>
    <!--============================= HEADER =============================-->
   <?php include("include/header.php");?> 
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">
        <!-- <img src="images/slider.jpg" class="img-fluid" alt="#"> -->
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h2 style="color: white">Discover great services around you!</h2>
                                    <h5>Let's uncover the best toilers near you.</h5>
                                </div>
                            </div>
                        </div>
                        <!--<div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <form class="form-wrap mt-4">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <input type="text" placeholder="What are your looking for?" class="btn-group1">
                                        <input type="text" placeholder="New york" class="btn-group2">
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                <div class="slider-link">
                                  <a href="#">Recently Added</a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->
    <!--============================= FIND PLACES =============================-->
    
    <!--//END FIND PLACES -->
    <!--============================= FEATURED PLACES =============================-->   
      <section class="main-block light-bg" id="view">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Recently Added</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php 
            if(!isset($_GET['cat']))
            {              
              ?>
              <script type="text/javascript">
                location.href='index.php';
              </script>
              <?php
            }
            $catt=$_GET['cat'];
            $catt=base64_decode($catt);
                $que="select * from listingmaster where status='1' and category like '%$catt%' or category like '$catt%' or category like '%$catt' order by registered DESC";                
                $res=$conn->query($que);
                $rowcount=mysqli_num_rows($res);
                if($rowcount>0)
                  {
                    while($row=$res->fetch_assoc())
                    { ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="viewServiceDetails.php?iid=<?php echo $row['id'];?>">
                            <img src="uploads/<?php echo $row['photoName'];?>" class="img-fluid" alt="#" style="max-height: 200px; max-width: 100%">
                            <span class="featured-rating-green">R</span>
                            <div class="featured-title-box">
                                <h6><?php echo $row['listingName'];?></h6>
                                <p><?php echo $row['category'];?></p> <span>• </span>
                                
                                <p><span>₹₹</span>₹₹₹</p>
                                <ul>
                                    <li><span class="icon-user"></span>
                                        <p><?php echo $row['ownerName'];?></p>
                                    </li>
                                    <li><span class="icon-location-pin"></span>
                                        <p><?php echo $row['address'];?></p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                       <p><?php echo $row['phoneNumber'];?></p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p><?php echo $row['websiteLink'];?></p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="open-now"><?php echo $row['workingTime'];?></div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                    <?php }
                  }
                  else
                  {
                    echo "Listings to be added yet under $catt! We will return shortly";
                  }
              ?>
            </div>
        </div>
    </section>          
    <!--//END FEATURED PLACES -->
    <!--============================= CATEGORIES =============================-->
   <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Browse Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Plumbing");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-wrench" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                         
                            <h6>Plumbing</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Carpentry");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-hammer" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                            <h6>Carpentry</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("House Keeping");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-broom" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                                                 
                            <h6>House Keeping</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Pest Control");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-pastafarianism" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                            
                            <h6>Pest Control</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Paint Service");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-paint-roller" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                           
                            <h6>Paint Service</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Packers & movers");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-people-carry" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                           
                            <h6>Packers &amp; movers</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Electricians");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-toolbox" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                           
                            <h6>Electricians</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 category-responsive">
                    <a href="allListing.php?cat=<?php echo base64_encode("Mechanics");?>#view" class="category-wrap">
                        <div class="category-block">
                         <i class="fa fa-tools" aria-hidden="true" style="font-size: 70px; color: #5543b7;"></i>                                                     
                            
                            <h6>Mechanics</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--//END CATEGORIES -->
    <!--============================= ADD LISTING =============================-->
    <section class="main-block light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-wrap">
                        <h2>Reach millions of People</h2>
                        <p>Add your Business infront of millions and earn 3x profits from our listing</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="featured-btn-wrap">
                        <a href="#" class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'"><span class="ti-plus"></span> ADD LISTING</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--Start Login Form-->

     <div id="id01" class="modal">
  
  <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="submit">Login</button>      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>      
    </div>
  </form>
</div>
<!--End Form-->
    <!--//END ADD LISTING -->
    <!--============================= FOOTER =============================-->
   <?php include("include/footer.php");?>   

    <!--//END FOOTER -->




    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>
</body>

</html>
