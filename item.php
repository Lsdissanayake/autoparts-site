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
    .ct-contact {
      border: 2px solid white;
      padding: 10px;
      margin: 5px;
      transition: .5s;
    }

    .ct-contact:hover {
        background-color: #74b9ff;
        color: white;
    }

    .list-light {
        border: 1px solid black;
        border-radius: 5px;
        color:black;
        transition: .5s;
    }

    .list-light:hover {
        background-color: transparent;
        color:black;

    }
    </style>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-analytics.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>

    <style>
    /* Star Ratings and review */

    .rate-panel {
    position: relative;
    width: 100%;
    
    }

    .star-rating {
            position: absolute;
            top:50%;
            left:50%;
            transform: translate(-50%, -30%) rotateY(180deg);
            display: flex;
        }

    .star-rating input{
        display: none;
    }

    .star-rating label {
        display: block;
        width: 50px;
        cursor: pointer;
        

    }

    .star-rating label:before {
        content: '\f005' ;
        font-family: fontAwesome;
        position: relative;
        display: block;
        font-size: 50px;
        color: #101010;

    }

    .star-rating label:after {
        content: '\f005' ;
        font-family: fontAwesome;
        position: absolute;
        display: block;
        color: #0faf37;
        font-size: 50px;
        top: 0px;
        opacity: 0;
        transition: .5s;
        text-shadow: 0px 2px 5px rgba(0,0,0,0.5);

    }

    .star-rating label:hover:after, .star-rating input:checked ~ label:after{
        opacity: 1;
    }

    .ct-flex-tray {
    display: flex;
    justify-content: center;
    justify-items: center;
    }

    .ct-flex-tray span i {
    font-size: 24px;
    }

    .ct-blink-star {
    color: #0faf37;
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
                                    <div class="col" id="book-sect">

                                    </div>
                                    <div class="col" >
                                        <p>Rate this item.</p>
                                        <center>
                                            <br><br><br>
                                        <span class="ct-value" id="rate">0</span> / voters <span id="voters">0</span>
                                        <div class="rate-panel">
                                        <div class="star-rating">

                                            <input type="radio" name="star" id="star1"><label for="star1"></label>
                                            <input type="radio" name="star" id="star2"><label for="star2"></label>
                                            <input type="radio" name="star" id="star3"><label for="star3"></label>
                                            <input type="radio" name="star" id="star4"><label for="star4"></label>
                                            <input type="radio" name="star" id="star5"><label for="star5"></label>
                                        </div>
                                        <br><br><br><br>
                                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="itemName">Add Your Comment</label>
                                            <input type="text" class="form-control" id="comment" aria-describedby="nameHelp">
                                            <input type="hidden" id="impscore" value="0">
                                            <input type="hidden" id="impvotes" value="0">
                                            <!-- <small id="nameHelp" class="form-text text-muted">Give a name for your product or service</small> -->
                                        </div>
                                        <a class="btn btn-dark" id="btn_rate">RATE</a>
                                        </center>
                                                            
                                    </div>
                                    
                                </div>
                                <a href="#" id="btn-order" class="btn btn-success">Order</a>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="ct-list-container" >
                                        <ul class="ct-contact-list" id="comments">
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Other Suggetions</h4>
                <div class="row" id="cat-sect">
                    
                
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
        var rate = 0;
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var mode ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Mode'];} else echo "Online" ?>";
        var url = new URL(window.location.href);
        var param = url.searchParams.get("id");
        var param2 = url.searchParams.get("cat");
        console.log(param);
        getItemRate(param);
        getItem(param, user);
        getItemsCatelogByCategory(mode, param2)

        getUserPaymemntsAsNotification(user);

        // Rating
        const st1 = document.getElementById('star1');   
        const st2 = document.getElementById('star2'); 
        const st3 = document.getElementById('star3'); 
        const st4 = document.getElementById('star4'); 
        const st5 = document.getElementById('star5'); 
        const comment = document.getElementById('comment'); 
        const btn_rate = document.getElementById('btn_rate'); 
        const btn_order = document.getElementById('btn-order'); 

        st1.addEventListener('click', () => rate = 5);  
        st2.addEventListener('click', () => rate = 4);  
        st3.addEventListener('click', () => rate = 3);  
        st4.addEventListener('click', () => rate = 2);  
        st5.addEventListener('click', () => rate = 1); 

         

        btn_rate.addEventListener('click', () => rateItem(param, user, rate, comment.value));
        btn_order.addEventListener('click', () => {
            const qtyTaken = document.getElementById('qty');
            window.location.href="item-reserve.php?id="+param+"&qty="+qtyTaken.value
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
    </script>

</body>

</html>