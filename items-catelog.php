<?php
session_start();
 

if (isset($_GET['update'])) {
    approveUser($_GET['update']);
}
if (isset($_GET['remove'])) {
    deleteBook($_GET['remove']);
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

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");
        .advanced{

text-decoration: none;
font-size: 15px;
font-weight: 500;
}


.btn-secondary,
.btn-secondary:focus,
.btn-secondary:active


{
color: #fff;
background-color: #00838f !important;
border-color: #00838f !important;
box-shadow: none;
}


.advanced{

color: #00838f !important;
}

.form-control:focus{
box-shadow: none;
border: 1px solid #00838f;


}

    </style>

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
                    <h3 class="text-primary">Auto Parts Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Auto Parts Items</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <a class="nav-link" href="items-catelog.php"><i class="fa fa-th-large"></i></a>
                                    </div>
                                    <div class="col-lg-1">
                                        <a class="nav-link" href="items.php"><i class="ti-menu"></i></a>
                                    </div>
                                </div>
                                <h4 class="card-title" id="title-main">Items Catelog <span id="txt-cat"></span></h4>
                                <h6 class="card-subtitle" id="user-name">Details on items already available in Site</h6>
                                <hr>
                                <div id="pack-supplies">
                                    <button class="btn btn-info" id="lbl-fe">Products</button>
                                    <button class="btn btn-secondary" id="lbl-to">Tools</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div id="options-sect-1">
                <div class="row" id="cat-sect">
                
                </div>
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
        var mode ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Mode'];} else echo "Online" ?>";
        var term = '';
        var type = '';
        var btn_search = document.getElementById('dropdownMenuButton');
        var url = new URL(window.location.href);
        var param = url.searchParams.get("item");
        var txt_cat = document.getElementById('txt-cat')
        if(!param==null){txt_cat.innerText = `- ${param}`;} else {txt_cat.innerText = ``;}

        var btn_seeds = document.getElementById('lbl-se');
        var btn_che = document.getElementById('lbl-ch');
        var btn_fert = document.getElementById('lbl-fe');
        var btn_too = document.getElementById('lbl-to');
        var pack = document.getElementById('pack-supplies');
        pack.style.display = "none";

        if(param){
            if(param=="Products"){
                getItemProductsCatelog(mode);
            }
            if(param=="Supplies"){
                pack.style.display = "block";
                getItemSuppliesCatelog(mode, 'All');

                btn_fert.addEventListener('click', () => {getItemSuppliesCatelog(mode, 'Products')});
                btn_too.addEventListener('click', () => {getItemSuppliesCatelog(mode, 'Tools')});
            }
            if(param=="Tools"){
                getItemToolsCatelog(mode)
            }

        } else {
            getItemsCatelog(mode);
        }

        
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
    </script>

</body>

</html>