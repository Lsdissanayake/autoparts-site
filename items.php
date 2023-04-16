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
                            
                            
                                <h4 class="card-title">Available Items</h4>
                                <h6 class="card-subtitle">Details on Items available</h6>
                                <div id="btn-add">
                                <a href="item-add.php" class="btn btn-success">
                                    Add
                                </a>
                                </div>
                                <hr>
                                <div class="row d-flex justify-content-center">

            <div class="col-md-10">

                <div class="card p-3  py-4">

                    <h5>Find items using Search</h5>

                    <div class="row g-3 mt-2">

                        <div class="col-md-2">

                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                Any
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <li><a class="dropdown-item" id="lbl-all" href="#">All</a></li>
                                <li><a class="dropdown-item" id="lbl-name" href="#">By Name</a></li>
                              </ul>
                            </div>
                            
                        </div>

                        <div class="col-md-2">
                            <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-expanded="false">
                                All items
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" id="x-all" href="#">All items</a></li>
                                <li><a class="dropdown-item" id="lbl-pro" href="#">Only Products</a></li>
                                <li><a class="dropdown-item" id="lbl-too" href="#">Only Tools</a></li>
                              </ul>
                            </div>
                        </div>

                        <div class="col-md-5">

                            <input type="text" class="form-control" placeholder="Enter Name e.g. Madolduwa, A" id="search-term">
                            
                        </div>

                        <div class="col-md-3">

                            <button class="btn btn-secondary btn-block" id="btn-init-search">Search</button>
                            
                        </div>
                        
                    </div>


                    <div class="mt-3">
                        
                        <!-- <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="advanced">
                            Advance Search With Filters <i class="fa fa-angle-down"></i>
                        </a> -->
                        

                            <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                
                                <div class="row">

                                    <div class="col-md-4">

                                        <input type="text" placeholder="Property ID" class="form-control">
                                        
                                    </div>


                                    <div class="col-md-4">

                                        <input type="text" class="form-control" placeholder="Search by MAP">
                                        
                                    </div>
                                    

                                    <div class="col-md-4">

                                        <input type="text" class="form-control" placeholder="Search by Country">
                                        
                                    </div>
                                    
                                </div>

                            </div>
                            </div>


                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                              
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Preview</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>user</th>
                                                <th>Price</th>
                                                <th>Availability</th>
                                                <th>Options</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb-books">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
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
        var role ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Role'];} ?>";
        var term = '';
        var type = '';
        var sub = 'all';
        var btn_search = document.getElementById('dropdownMenuButton');
        var btn_search2 = document.getElementById('dropdownMenuButton2');
        var txt_search = document.getElementById('search-term');
        var btn_initSearch = document.getElementById('btn-init-search');
        var lbl_name = document.getElementById('lbl-name');
        var lbl_all = document.getElementById('lbl-all');

        var lbl_pro = document.getElementById('lbl-pro');
        var lbl_che = document.getElementById('lbl-che');
        var lbl_fer = document.getElementById('lbl-fer');
        var lbl_too = document.getElementById('lbl-too');
        var lbl_see = document.getElementById('lbl-see');

        var b_all = document.getElementById('x-all');


        var btn_add = document.getElementById('btn-add');
        btn_add.style.display = "block";
        if(role=="Customer"||role=="Technician"||role=="Other") {
            btn_add.style.display = "none";
        }


        lbl_all.addEventListener('click', () => {
            btn_search.innerText = lbl_all.innerText;
            type = "all";
        });
        lbl_name.addEventListener('click', () => {
            btn_search.innerText = lbl_name.innerText;
            type = "name";
        });

        b_all.addEventListener('click', () => {
            btn_search2.innerText = b_all.innerText;
            sub = "all";
        });


        lbl_pro.addEventListener('click', () => {
            btn_search2.innerText = lbl_pro.innerText;
            sub = "Products";
        })
        lbl_che.addEventListener('click', () => {
            btn_search2.innerText = lbl_che.innerText;
            sub = "Chemicals";
        })
        lbl_fer.addEventListener('click', () => {
            btn_search2.innerText = lbl_fer.innerText;
            sub = "Fertilizer";
        })
        lbl_see.addEventListener('click', () => {
            btn_search2.innerText = lbl_see.innerText;
            sub = "Seeds";
        })
        lbl_too.addEventListener('click', () => {
            btn_search2.innerText = lbl_too.innerText;
            sub = "Tools";
        })

        btn_initSearch.addEventListener('click', () => {
            term = txt_search.value;
            getItemsTableBySearches(type, term.toLowerCase(), mode, role, sub);
        })


        getItemsTable(mode, role);
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
    </script>

</body>

</html>