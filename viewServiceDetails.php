<?php 
session_start();
include('include/config.php');
//include('include/checklogin.php');
include('include/enc.php');
//check_login();
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
    <!-- Favicons -->    
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

    <!-- Page Title -->
    <title>Service Listing</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Swipper Slider -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--============================= HEADER =============================-->
   <?php include("include/listingHeader.php");?>   
   
   
   
    <!--//END HEADER -->
    <!--============================= BOOKING =============================-->
    <div>
        <!-- Swiper -->
        <?php 
        if(isset($_GET['iid']))
        {

              $que="select * from listingmaster where id='".$_GET['iid']."'";
              $res=$conn->query($que);
              $rowcount=mysqli_num_rows($res);
              if($rowcount>0)
                {                    
                   $row=$res->fetch_assoc();
                ?>
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <a href="uploads/<?php echo $row['photoName'];?>" class="grid image-link">
                        <img src="uploads/<?php echo $row['photoName'];?>" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
              <!--
                 
               <div class="swiper-slide">
                    <a href="../uploads/Dash.jpeg" class="grid image-link">
                        <img src="../uploads/Dash.jpeg" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="../uploads/Dash.jpeg" class="grid image-link">
                        <img src="../uploads/Dash.jpeg" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="../uploads/Dash.jpeg" class="grid image-link">
                        <img src="../uploads/Dash.jpeg" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="../uploads/Dash.jpeg" class="grid image-link">
                        <img src="../uploads/Dash.jpeg" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="../uploads/Dash.jpeg" class="grid image-link">
                        <img src="../uploads/Dash.jpeg" class="img-fluid" alt="#" style="max-height: 279px; max-width: 500px">
                    </a>
                </div>
              -->
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->    
   <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><?php echo $row['listingName'];?></h5>
                    <p><span>₹₹</span>₹₹₹</p>                    
                </div>
               <!-- <div class="col-md-6">
                    <div class="reserve-seat-block">                        
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">REQUEST SERVICE</a>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">                            
                            <p><?php echo $row['description'];?></p>
                            <hr>
                        </div>
                        <div class="row">
                            <?php echo $row['ammenities'];?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        <img src="images/map.jpg" class="img-fluid" alt="#">
                        <div class="address">
                            <span class="icon-user"></span>
                            <p>
                                <?php echo $row['ownerName'];?>
                            </p>
                        </div>
                        <div class="address">
                            <span class="icon-location-pin"></span>
                            <p>
                                <?php echo $row['address'];?>
                            </p>
                        </div>
                        <div class="address">
                            <span class="icon-screen-smartphone"></span>
                            <a href="tel:<?php echo $row['phoneNumber'];?>"><p>
                                <?php echo $row['phoneNumber'];?>
                            </p></a> 
                        </div>
                         <div class="address">
                            <span class="icon-link"></span>
                            <p>
                               <a href="https://<?php echo $row['websiteLink'];?>"><?php echo $row['websiteLink'];?></a>
                            </p>
                        </div>
                        <div class="address">
                            <span class="ti-email"></span>
                            <p>
                                <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a>
                            </p>
                        </div>
                        <div class="address">
                            <span class="icon-clock"></span>
                            <p>
                                <?php echo $row['workingTime'];?>
                            </p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }
        }
        else
        { ?>
         <h5 style="text-align: center;">No Data</h5>
        <?php }
    ?> 
    <!--//END BOOKING DETAILS -->
    <!--============================= FOOTER =============================-->
   <?php include("include/footer.php");?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Magnific popup JS -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Swipper Slider JS -->
    <script src="js/swiper.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
    </script>
</body>

</html>
