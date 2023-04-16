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
                    <h3 class="text-primary">AutoPart Items</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">AutoPart Items</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Items</h4>
                                <h6 class="card-subtitle">Enter details of your Item</h6>

                                <!-- <form method="POST" action="php/book-adder.php"> -->
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="name" placeholder="Name of Item">
                                                <input type="hidden" class="form-control" id="user" value="<?php echo $_SESSION['Username']; ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Category</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="category">
                                                        <option value="Products" selected>...</option>
                                                        <option id="pro" value="Products">Products</option>
                                                        <option id="too" value="Tools">Tools</option>
                                                        <option id="che" value="Oils">Oils</option>
                                                        <option id="see" value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Description about Item</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="description" placeholder="Description of Item">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label>Price</label>
                                                <input type="range" class="form-range" placeholder="Price" id="price" min="10" value="10" max="10000"  oninput="this.nextElementSibling.value = this.value">
                                                <output>1</output>
                                            </div>
                                            <div class="form-group row">
                                                <label>QTY</label>
                                                <input type="range" class="form-range" placeholder="Qty" id="qty" min="1" value="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                                <output>1</output>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Upload Item Image</label>
                                                <div class="col-sm-8">
                                                <input type="file" class="form-control" id="upload3" accept="image/png, image/gif, image/jpeg">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-4 col-form-label">Upload Electronic Copy (PDF)</label>
                                                <div class="col-sm-8">
                                                <input type="file" class="form-control" id="upload2" accept="application/pdf">
                                                </div>
                                            </div>
                                            <button id="btn_book" class="btn btn-primary">Add Item</button>
                                        <!-- </form> -->
                                
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
    <script src="js/firebase/upload.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
    <script>
        var url = new URL(window.location.href);
        var param = url.searchParams.get("name");
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        var role ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Role'];} ?>";

        var pro = document.getElementById('pro');
        var fer = document.getElementById('fer');
        var too = document.getElementById('too');
        var che = document.getElementById('che');
        var see = document.getElementById('see');
        
        console.log(param);
        if(param){
            document.getElementById('name').value = param;
        }
        if(role=="Supplier"){

        } else if(role=="Technician"){
            fer.style.display = "none";
            too.style.display = "none";
            che.style.display = "none";
            see.style.display = "none";
        }

        document.querySelector('#upload2').addEventListener('change', (e) => {
            const endPoint = "js/firebase/upload.php";
            console.log(e.target.files[0]);
            uploaded = e.target.files[0].name;
            let uploadF = e.target.files[0];
            let formData = new FormData();
            formData.append("inpFile", uploadF);
            fetch(endPoint, {method: "POST", body: formData}).catch(console.error());
            console.log("DONE");
        });
        document.querySelector('#upload3').addEventListener('change', (e) => {
            const endPoint = "js/firebase/upload.php";
            console.log(e.target.files[0]);
            uploaded2 = e.target.files[0].name;
            let uploadF = e.target.files[0];
            let formData = new FormData();
            formData.append("inpFile", uploadF);
            fetch(endPoint, {method: "POST", body: formData}).catch(console.error());
            console.log("DONE");
        });
    </script>

</body>

</html>