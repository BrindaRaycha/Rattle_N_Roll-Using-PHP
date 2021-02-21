<?php 
ob_start();
include 'connection.php'; 
session_start();
if($_SESSION['vendorsessionid']=="")
{
	header('location:vendor_login.php');
}
$sessionid = $_SESSION['vendorsessionid'];
$sql = $link->rawQuery("select * from vendor_reg where vendor_id = $sessionid and is_active = 0");
if($link->count > 0)
{ ?>
<script>
	alert("You are no more longer available on this page");
	window.location = 'vendor_login.php';
</script>

<?php
}

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Rattle n Roll | Product Detail</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/icon.jpeg" >

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	
	<script>
	function myfunction(smallImg) {
		var fullImg = document.getElementById("imageBox");
		fullImg.src = smallImg.src;
	}
</script>
	
    </head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <?php include'include/header.php';?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php include'include/side-bar.php';?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Reviews</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Reviews</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
										<div class="col-xl-12">
                                            
											<table class="table mb-0 table-bordered">
											<tr>
												<th>User Name</th>
												<th>Review Title</th>
												<th>Review</th>
												<th>Product</th>
											</tr>
											<?php
											$sql = $link->rawQuery("select * from reviewtb r,producttb p where p.product_id = r.product_id and r.vendor_id = $sessionid");
											if($link->count > 0)
											{
												foreach($sql as $s){
											?>
											<tr>
												<td><?php echo $s['user_name']; ?></td>
												<td><?php echo $s['review_title']; ?></td>
												<td><?php echo $s['review']; ?></td>
												<td><a href="vendor_product_details.php?prodid=<?php echo $s['product_id']; ?>"><img class="avatar-md img-thumbnail" src="<?php echo $s["image"]; ?>"></a></td>
											</tr>
											<?php
												}
											}
											else
											{ ?>
												<tr><td colspan = 3>There are No reviews for You</td></tr>
									<?php	}
											
											?>
											</table>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    
                                    <!-- end Specifications -->

                                   <!-- <div class="mt-5">
                                        <h5 class="mb-4">Reviews :</h5>

                                        <div class="media border-bottom">
                                            <img src="assets/images/users/avatar-2.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 font-size-15">Brian</h5>
                                                <p class="text-muted">If several languages coalesce, the grammar of the resulting language.</p>
                                                <ul class="list-inline float-sm-right">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                    </li>
                                                </ul>
                                                <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 5 hrs ago</div>
                                            </div>
                                        </div>
                                        <div class="media mt-3 border-bottom">
                                            <img src="assets/images/users/avatar-4.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                            <div class="media-body">
                                                <h5 class="mt-0 font-size-15 mb-1">Denver</h5>
                                                <p class="text-muted">To an English person, it will seem like simplified English, as a skeptical Cambridge</p>
                                                <ul class="list-inline float-sm-right">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                    </li>
                                                </ul>
                                                <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 07 Oct, 2019</div>
                                                <div class="media mt-4">
                                                    <img src="assets/images/users/avatar-5.jpg" class="avatar-xs mr-3 rounded-circle" alt="img" />
                                                    <div class="media-body">
                                                        <h5 class="mt-0 mb-1 font-size-15">Henry</h5>
                                                        <p class="text-muted">Their separate existence is a myth. For science, music, sport, etc.</p>
                                                        <ul class="list-inline float-sm-right">
                                                            <li class="list-inline-item">
                                                                <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                            </li>
                                                        </ul>
                                                        <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 08 Oct, 2019</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media mt-3 border-bottom">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title bg-soft-primary text-primary rounded-circle font-size-16">
                                                    N
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1 font-size-15">Neal</h5>
                                                <p class="text-muted">Everyone realizes why a new common language would be desirable.</p>
                                                <ul class="list-inline float-sm-right">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="far fa-comment-dots mr-1"></i> Comment</a>
                                                    </li>
                                                </ul>
                                                <div class="text-muted font-size-12"><i class="far fa-calendar-alt text-primary mr-1"></i> 05 Oct, 2019</div>
                                            </div>
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end row -->

                        
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                <?php include'include/footer.php';?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>
		<script>
	function myfunction(smallImg) {
		var fullImg = document.getElementById("imageBox");
		fullImg.src = smallImg.src;
	}
</script>
    </body>
</html>
