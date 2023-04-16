<?php session_start();  ?>
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
    <!-- chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row" id="sect-danger">
					
                </div>
                <div id="options-sect-1">
                <div class="row" id="cat-sect">
                
                </div>
                </div>
                <div id="chart-set-1">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title text-center">

                                </div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title text-center">

                                </div>
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-title text-center">

                                </div>
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-12">
						<div class="row">
                        <div class="col-lg-6">
							<div class="card">
								<div class="card-title text-center">
									<h4>Auto Parts </h4>
                                    <br>
                                    <i class="fa fa-archive f-s-100" style="font-size: 120px"></i>
                                    <br>
                                    <small>Access Collections of Genuine parts provided by Different Companies.</small>
                                    <hr>
                                    <a href="items-catelog.php?item=Products" class="btn btn-primary">Visit</a>
								</div>
								
							</div>
							<!-- /# card -->
						</div>
						<div class="col-lg-6">
							<div class="card">
								<div class="card-title text-center">
									<h4>Auto Part Suppliers</h4>
                                    <br>
                                    <i class="fa fa-user f-s-100" style="font-size: 120px"></i>
                                    <br>
                                    <small>Access Collections of supplies provided by suppliers.</small>
                                    <hr>
                                    <a href="items-catelog.php?item=Supplies" class="btn btn-primary">Visit</a>
								</div>
								
							</div>
							<!-- /# card -->
						</div>
						<!-- /# column -->
						

                        <!-- <div class="col-lg-6">
							<div class="card">
								<div class="card-title text-center">
									<h4>Books </h4>
                                    <br>
                                    <i class="fa fa-tachometer" style="font-size: 120px"></i>
                                    <br>
                                    <small>Access Collections of books in different subjects</small>
                                    <hr>
                                    <a href="#" class="btn btn-primary">Visit</a>
								</div>
								
							</div>
						</div> -->

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
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var contact ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Contact'];} ?>";
        var role ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Role'];} ?>";
        getBookReservesCatelog(user, contact);
        getUserPaymemntsAsNotification(user);
        var counts = []; 
        var areas = [];

        var charSet =  document.getElementById('chart-set-1');
        var charSet2 =  document.getElementById('chart-set-2');

        charSet.style.display = "none";

        if(role=="Technician"){
            charSet.style.display = "block";
        }

        refUsers.get().then((docs) => {
            docs.forEach((doc) => {
                refUsers.doc(doc.id).get().then((snap) => {
                    // console.log(snap.data());
                    if(snap.data().accepted&&snap.data().designation=="Technician"&&snap.data().area){
                        
                        if(areas.indexOf(snap.data().area)<0){
                            console.log("DF -2");
                            areas.push(snap.data().area);
                            counts.push(1);
                            console.log(counts);
                        } else {
                            console.log("DF -3");
                            counts[areas.indexOf(doc.data().area)] = counts[areas.indexOf(doc.data().area)] + 1;
                        }
                    }
                    console.log(counts);
                    // console.log(areas);
                    
                });
                
            })
        });
        function chartLaunch()  {
            // Chahrt JS Confiurations
            const labels = areas;
            const colrs = ['Red', 'Orange', 'Yellow', 'Green', 'Blue'];

            const data = {
                labels: labels,
                datasets: [{
                label: 'Technicians Population by District',
                backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                borderColor: 'rgb(0, 0, 0)',
                data: counts,
                }]
            };

            const config = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Technicians Population by District'
                        }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

            let j = 0;
            for(let i = 0; i<counts.length; i++){
                j = j + counts[i];
            }
            
        }

        setTimeout(chartLaunch, 6000);

        var counts2 = []; 
        var areas2 = [];

        refArea.get().then((docs) => {
            docs.forEach((doc) => {
                refUsers.where("username", "==", doc.data().user).get().then((snaps) => {
                    snaps.forEach((snap) => {
                        if(counts2.indexOf(snap.data().area)<0){
                            areas2.push(doc.data().area);
                            counts2.push(snap.data().area);
                        } else {
                            areas2[counts2.indexOf(snap.data().area)] = areas2[counts2.indexOf(snap.data().area)]+doc.data().area;
                        }
                    })
                })
                
                
            })
        })

        function chart2Launch()  {
            // Chahrt JS Confiurations
            const labels = counts2;
            const colrs = ['Red', 'Orange', 'Yellow', 'Green', 'Blue'];

            const data = {
                labels: labels,
                datasets: [{
                label: 'Cultivated Area by District',
                backgroundColor: ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
                borderColor: 'rgb(0, 0, 0)',
                data: areas2,
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Cultivated Area (Hectare) by District'
                    }
                    }
                },
            };

            const myChart = new Chart(
                document.getElementById('myChart2'),
                config
            );
        }

        setTimeout(chart2Launch, 7000);

        function getKeyByValue(object, value) {
            return Object.keys(object).find(key => object[key] === value);
        }

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
        refOrders.where("approved", "==", true).orderBy("date", "desc").get().then((snaps) => {
            snaps.forEach((snap) => {
                if(snap.data().category&&snap.data().category!="Products") return;
                if(lbls.indexOf(snap.data().date.toDate().getMonth()+1)<0){
                    lbls.push(snap.data().date.toDate().getMonth()+1);
                    takenMonths.push(getKeyByValue(months, snap.data().date.toDate().getMonth()+1))
                    dta.push(snap.data().total*snap.data().qty);
                } else {
                    dta[lbls.indexOf(snap.data().date.toDate().getMonth()+1)] = dta[lbls.indexOf(snap.data().date.toDate().getMonth()+1)] + snap.data().total*snap.data().qty;
                }
            })
        }).then(() => {
            // Chahrt JS Confiurations
            const labels = takenMonths.reverse();

            const data = {
                labels: labels,
                datasets: [{
                label: 'Annual Sales of Agricuture Products (Rs.)',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: dta.reverse(),
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {}
            };

            const myChart = new Chart(
                document.getElementById('myChart3'),
                config
            );
        })
        
    </script>

</body>

</html>