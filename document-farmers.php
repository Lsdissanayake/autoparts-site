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
    <!-- chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <h3 class="text-primary">Technicians Population by District</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="profile.php?user="+user>Profile</a></li>
                        <li class="breadcrumb-item active">Technicians Population by District</li>
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
                                <h4 class="card-title" id="title">Technicians' Populaltion</h4>
                                <h6 class="card-subtitle" id="user-issue">Download Technician's Stats</h6>
                                <hr>
                                <!-- File: <span id="file"></span> || Issued Date: <span id="issued"></span> -->
                                <div class="row">
                                    <div class="col">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    <div class="col text-center">
                                        <h4>Technicians Population by District</h4>
                                        <p>DIsplays registered population of Technicians in given areas.</p>
                                        <br>
                                        <button class="btn btn-success" id="btn_gen">Download Technician's Stats Report</button>
                                        <br>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Technicians whole Population</h4>
                                    <h1 class="card-subtitle" id="stat" style="font-size: 80px">00</h1>
                                    
                                    <hr>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Number of Recognized areas</h4>
                                    <h1 class="card-subtitle" id="stat-w" style="font-size: 80px">00</h1>
                                    
                                    <hr>
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

    <!-- JSPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>

    <script src="js/custom.min.js"></script>
    <script>
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var url = new URL(window.location.href);
        var param = url.searchParams.get("id");
        var items = [];
        var total = 0;

        var title = document.getElementById("title");
        title.innerText = param;

        var user_is = document.getElementById("user-issue");
        var file = document.getElementById("file");
        var issued = document.getElementById("issued");
        var btn_pay = document.getElementById('btn-pay');

        var stat = document.getElementById('stat');
        var stat_w = document.getElementById('stat-w');
        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
        var score = 0;
        var score_w = 1;
        

        // Data
        
        // refUsers.get().then((docs) => {
        //     docs.forEach((doc) => {
        //         refUsers.doc(doc.id).get().then((snaps) => {
        //             console.log(snaps);
        //             if(snaps.data().designation=="Technician"&&snaps.data().area){
        //                 if(areas.indexOf(snap.data().area)<0){
        //                     areas.push(snap.data().area);
        //                     counts.push(1);
        //                 } else {
        //                     counts[areas.indexOf(snap.data().area)] = counts[areas.indexOf(snap.data().area)] + 1;
        //                 }
        //             }
                    
        //         })
        //     })
        // });

        // Chart Data
        function getKeyByValue(object, value) {
            return Object.keys(object).find(key => object[key] === value);
        }
        var counts = []; 
        var areas = [];

        refUsers.where("designation", "==", "Technician").get().then((docs) => {
            docs.forEach((doc) => {
                    if(doc.data().accepted==true&&doc.data().area){
                        
                        if(areas.indexOf(doc.data().area)<0){
                            // console.log("DF -2");
                            areas.push(doc.data().area);
                            counts.push(1);
                            console.log(doc.data().area);
                        } else {
                            console.log("DF -3");
                            counts[areas.indexOf(doc.data().area)] = counts[areas.indexOf(doc.data().area)] + 1;
                            // counts.push(counts[areas.indexOf(doc.data().area)] + 1);
                        }
                        // console.log(doc.id);
                        console.log(counts);
                        console.log(areas);
                    }
                
            })
        })
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
                        text: 'Available Districts'
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
            stat.innerText = j;
            stat_w.innerText = areas.length;
        }

        setTimeout(chartLaunch, 6000);


        // Inputs
        var total = 0;
        var list = {};
        // getList(param, list);
        
        window.jsPDF = window.jspdf.jsPDF;

        document.getElementById('btn_gen').addEventListener('click', () => {
            var props = {
                    outputType: jsPDFInvoiceTemplate.OutputType.Save,
                    returnJsPDFDocObject: true,
                    fileName: `User Stats Report Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}`,
                    orientationLandscape: false,
                    compress: true,
                    logo: {
                        src: "icons/logo/logo.png",
                        type: 'PNG', //optional, when src= data:uri (nodejs case)
                        width: 53.33, //aspect ratio = width/height
                        height: 26.66,
                        margin: {
                            top: 0, //negative or positive num, from the current position
                            left: 0 //negative or positive num, from the current position
                        }
                    },
                    stamp: {
                        inAllPages: true, //by default = false, just in the last page
                        src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/qr_code.jpg",
                        type: 'JPG', //optional, when src= data:uri (nodejs case)
                        width: 20, //aspect ratio = width/height
                        height: 20,
                        margin: {
                            top: 0, //negative or positive num, from the current position
                            left: 0 //negative or positive num, from the current position
                        }
                    },
                    business: {
                        name: "Auto Parts",
                        address: "Address, Colombi 02",
                        phone: "(+94) 77 11 11 111",
                        email: "email@example.com",
                        email_1: "info@example.al",
                        website: "www.example.al",
                    },
                    contact: {
                        label: "Report issued for:",
                        name: "Agri. Division",
                        address: "Address, Colombi 02",
                        phone: "(+355) 069 22 22 222",
                        email: "client@website.al",
                        otherInfo: "www.website.al",
                    },
                    invoice: {
                        label: "Technicians per Area Stats Report:",
                        num: 2022,
                        invGenDate: `Report Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}`,
                        headerBorder: false,
                        tableBodyBorder: false,
                        header: [
                        {
                            title: "#", 
                            style: { 
                            width: 10 
                            } 
                        }, 
                        { 
                            title: "District",
                            style: {
                            width: 80
                            } 
                        }, 
                         
                        { title: "Count"}
                        ],
                        table: Array.from(counts, (item, index)=>([
                            '#',
                            areas[index],
                            item
                        ])),
                        additionalRows: [
                        {
                            col1: 'TOTAL:',
                            col2: '20',
                            col3: '%',
                            style: {
                                fontSize: 10 //optional, default 12
                            }
                        }],
                        invDescLabel: `Technicians per Region`,
                        invDesc: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
                        },
                        footer: {
                            text: "The report is created on a computer and is valid without the signature and stamp.",
                        },
                        pageEnable: true,
                        pageLabel: "Page ",
                };
                
                var doc = jsPDFInvoiceTemplate.default(props);
            
            // createInvoice(items, `Invoice Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}.pdf`)
        })
        
    </script>

</body>

</html>