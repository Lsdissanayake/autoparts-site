<?php
session_start();
 

if (isset($_GET['update'])) {
    approveUser($_GET['update']);
}
if (isset($_GET['remove'])) {
    deleteUser($_GET['remove']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Auto Parts</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-analytics.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include 'layout/nav.php'; ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include 'layout/side-nav.php'; ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="title-main">Profile</h4>
                                <h6 class="card-subtitle" id="user-name">Details on User information</h6>
                                <small id="user-mode"></small>
                                <hr>
                                <span>Name :</span><span id="user-uname"></span><br>
                                <span>Role :</span><span id="user-role"></span><br>
                                <span>Contact :</span><span id="user-contact"></span><br>
                                <span>Email :</span><span id="user-email"></span><br>
                                <span>District :</span><span id="user-area"></span><br>
                                <hr>
                                <a href="payment.php?title=Membership Payment" class="btn btn-info" id="user-member">Membership Payment</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" id="farm-area">
                        <div class="card text-center">
                            <div class="form-group">
                                <label>Mark your Farming area</label>
                                    <input type="range" class="form-control" id="area" min="0" value="1" max="500"  oninput="this.nextElementSibling.value = this.value">
                                <output id="area-val">1</output>
                            </div>
                            <a class="btn btn-success" id="btn-area">Update</a>
                        </div>
                        
                    </div>
                    
                </div>

                <h4 id="opt">Options</h4>
                <hr>
                <div id="options-sect-1">
                <div class="row" >
                    <div class="col-md-3" id="ur">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="profile-requests.php"><h4 class="card-title">User Requests</h4></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" id="it">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="profile-items.php"><h4 class="card-title">My Items</h4></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" id="rs">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="profile-orders.php"><h4 class="card-title">My Orders Management</h4></a>
                            </div>
                        </div>
                    </div>

                    <!-- Technician Options -->
                    
                </div>
                </div>
                <hr>
                <div class="row" id="user-ammount">
                    
                    
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include 'layout/footer.php' ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/firebase/items.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
    <script>
        var own = false;
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var role ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Role'];} ?>";
        var mode ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Mode'];} else echo "Online" ?>";
        var icontact ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Contact'];} ?>";
        var url = new URL(window.location.href);
        var param = url.searchParams.get("user");

        var main = document.getElementById('title-main');
        var mode_t = document.getElementById('user-mode');
        mode_t.innerText = mode;
        var sect2 = document.getElementById('options-sect-1');
        var ur = document.getElementById('ur');
        var re = document.getElementById('rs');
        var suv = document.getElementById('suv');
        var ite = document.getElementById('it');
        var opt = document.getElementById('opt');

        // sect2.style.display = "none";
        ur.style.display = "none";
        re.style.display = "none";
        ite.style.display = "none";

        // Technicians Section
        var line = document.getElementById('area');
        var line_out = document.getElementById('area-val');
        var btn_area = document.getElementById('btn-area'); 
        var farm_area = document.getElementById('farm-area');

        farm_area.style.display = "none";
        
        btn_area.addEventListener('click', () => {
            addArea(user, line.value);
        })

        getUser(param);
        getUserPaymemntsAsNotification(user);
        if(param==user){
            own = true; 
            getUserPaymemnts(param, icontact);
            main.innerText = "Your Profile";
            sect2.style.display = "block";
            if(role=="Admin"||role=="Technician"){
                ur.style.display = "block";
                re.style.display = "block";
            } else if(role=="Supplier"){
                ite.style.display = "block";
                re.style.display = "block";
            } else if(role=="Technician"||role=="Customer"){
                if(role=="Technician"){
                    ite.style.display = "block";
                    farm_area.style.display = "block";
                }
                re.style.display = "block";
                
                refArea.where("user", "==", user).orderBy("date", "desc").limit(1).get().then((docs) => {
                    console.log(docs);
                    docs.forEach((doc) => {
                        line.value = doc.data().area;
                        line_out.innerText =  doc.data().area;
                    })
                })
            } else if(role=="Staff"){
                re.style.display = "block";
            }
        } else {
            opt.style.display = "none";
            sect2.style.display = "block";
        }

        

        

    </script>

</body>

</html>