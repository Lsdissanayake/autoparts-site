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

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <center>
                                 <img src="icons/logo/logo.png" alt="homepage" class="dark-logo" width="300"/>
                                
                                <hr>
                                <h2>REGISTER</h2>
                                </center>
                                <!-- <form method="POST" action="php/register.php"> -->
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Create a new Username" id="uname">
                                        <span></span><small class="text-danger" id="un"> Enter a valid User Name</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Full Name" id="name">
                                        <span></span><small class="text-danger" id="na"> Enter a valid Name</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Contact Number" id="contact">
                                        <span></span><small class="text-danger" id="co"> Enter a valid Contact Number</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" placeholder="Address" id="address">
                                        <span></span><small class="text-danger" id="ad"> Enter a valid Address</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" placeholder="Email Address" id="email">
                                        <span></span><small class="text-danger" id="em"> Enter a valid Email Address</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <select class="form-control" id="designation">
                                        <option value="Technician">Technician</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Supplier">Supplier</option>
                                        </select>
                                        <span></span><small class="text-danger" id="de"> Enter Your Role</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">Your Area</label>
                                        <select class="form-control" id="area">
                                        <option value="Colombo" selected>Colombo</option>
                                        <option value="Kaluatara">Kaluatara</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampahaha">Gampahaha</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Rathnapura">Rathnapura</option>
                                        <option value="Hambanthota">Hambanthota</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password">
                                        <span></span><small class="text-danger" id="pa"> Enter a Password</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="rpassword">
                                        <span></span><small class="text-danger" id="cp"> Confirm Entered Password</small>
                                    </div>
                                    <div class="checkbox">
                                        <label>
										<input type="checkbox"> Agree the terms and policy
									</label>
                                    </div>
                                    <button class="btn btn-primary btn-flat m-b-30 m-t-30" id="btn_register">Register</button>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="page-login.php"> Sign in</a></p>
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script src="js/custom.min.js"></script>

    <script src="js/firebase/users.js"></script>


</body>

</html>