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

    <!-- chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <h3 class="text-primary">User Orders</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#"+user>Profile</a></li>
                        <li class="breadcrumb-item active">User Orders</li>
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
                                <h4 class="card-title">My Orders</h4>
                                <h6 class="card-subtitle">Details on orders already made by You</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Seller</th>
                                                <th>Approved</th>
                                                <th>Payment</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb-items">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <!-- End PAge Content -->
                <div class="row" id="tb-orders">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Orders made by Customers</h4>
                                <h6 class="card-subtitle">Orders have made by customers.</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Buyer</th>
                                                <th>Paid by Customer</th>
                                                <th>Accept</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb-sold">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales History</h4>
                                <h6 class="card-subtitle">History of Orders have made by customers.</h6>
                                
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div> -->
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
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var role ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Role'];} ?>";

        var orderTable = document.getElementById('tb-orders');
        getOrdersMade(user);
        getOrdersSold(user);
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });

        function getKeyByValue(object, value) {
            return Object.keys(object).find(key => object[key] === value);
        }

        if(role=="Customer"||role=="Technician"){
            orderTable.style.display="none";
        }

        // Chart Data
        const lbls = [];
        const dta = [];
        var months = {
            Jan: 1,
            Feb: 2,
            Mar: 3,
            Apr: 4,
            May: 5,
            Jun: 6,
            Jul: 7,
            Aug: 8,
            Sep: 9,
            Oct: 10,
            Nov: 11,
            Dec: 12,
        };
        const takenMonths = [];
        refOrders.where("user", "==", user).orderBy("date", "desc").get().then((snaps) => {
            snaps.forEach((snap) => {
                if(lbls.indexOf(snap.data().date.toDate().getMonth()+1)<0){
                    lbls.push(snap.data().date.toDate().getMonth()+1);
                    takenMonths.push(getKeyByValue(months, snap.data().date.toDate().getMonth()+1))
                    dta.push(1);
                } else {
                    dta[lbls.indexOf(snap.data().date.toDate().getMonth()+1)] = dta[lbls.indexOf(snap.data().date.toDate().getMonth()+1)] + 1;
                }
            })
        }).then(() => {
            // Chahrt JS Confiurations
            // takenMonths = takenMonths.reverse();
            // dta = dta.reverse();
            // const labels = takenMonths;

            // const data = {
            //     labels: labels,
            //     datasets: [{
            //     label: 'My First dataset',
            //     backgroundColor: 'rgb(255, 99, 132)',
            //     borderColor: 'rgb(255, 99, 132)',
            //     data: dta,
            //     }]
            // };

            // const config = {
            //     type: 'line',
            //     data: data,
            //     options: {}
            // };

            // const myChart = new Chart(
            //     document.getElementById('myChart'),
            //     config
            // );
        })

        

    </script>

</body>

</html>