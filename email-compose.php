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
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-analytics.js"></script>
    
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
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
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <!-- Left sidebar -->
                                    <?php include 'layout/inbox-side.php'; ?>
                                    <!-- End Left sidebar -->
                                    <div class="inbox-rightbar">

                                        <?php include 'layout/inbox-top.php'; ?>

                                        <div class="mt-4">

                                            
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="To" id="receieve">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Subject" id="subject">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="name" rows="8" cols="80" class="form-control" style="height:300px" id="message"></textarea>
                                                </div>

                                                <div class="form-group m-b-0">
                                                    <div class="text-right">

                                                        <!-- <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button> -->
                                                        <input type="file" class="form-control" id="upload2">
                                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                                        <button class="btn btn-purple waves-effect waves-light" id="btn-send"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            
                                        </div>
                                        <!-- end card-->

                                    </div>
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
    <script src="js/firebase/items.js"></script>
    <script src="js/firebase/upload.js"></script>

    <script src="js/custom.min.js"></script>

    <script>
        var user ="<?php if(isset($_SESSION['Username'])) { echo $_SESSION['Username'];} else echo "NO USER" ?>";
        const receiver = document.getElementById('receieve');
        const title = document.getElementById('subject');
        const message = document.getElementById('message');
        const btn_send = document.getElementById('btn-send');

        btn_send.addEventListener('click', () => {
            console.log("Hhii");
            alert("FII");
            createMail(user, receiver.value, title.value, message.value);
        });

        document.querySelector('#upload2').addEventListener('change', (e) => {
            const endPoint = "js/firebase/upload-attachment.php";
            console.log(e.target.files[0]);
            uploaded = e.target.files[0].name;
            let uploadF = e.target.files[0];
            let formData = new FormData();
            formData.append("inpFile", uploadF);
            fetch(endPoint, {method: "POST", body: formData}).catch(console.error());
            console.log("DONE");
        });
    </script>

</body>

</html>