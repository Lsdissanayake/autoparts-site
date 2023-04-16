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
                    <h3 class="text-primary">Document</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="profile.php?user="+user>Profile</a></li>
                        <li class="breadcrumb-item active">Document</li>
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
                                <h4 class="card-title" id="title">Document</h4>
                                <h6 class="card-subtitle">Complete and Download</h6>

                                <div id="sect-quot">
                                    <div class="form-row">
                                        <div class="col-7">
                                        <input type="text" class="form-control" placeholder="Name" id="rname">
                                        </div>
                                        <div class="col">
                                            <label>Price</label>
                                            <input type="range" class="form-range" placeholder="Price" id="price" min="10" value="10" max="10000"  oninput="this.nextElementSibling.value = this.value">
                                            <output>1</output>
                                        </div>
                                        <div class="col">
                                            <label>QTY</label>
                                            <input type="range" class="form-range" placeholder="Qty" id="qty" min="1" value="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                            <output>1</output>
                                        </div>
                                        <div class="col">
                                        <button class="btn btn-info" id="btn_add">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <!-- <th>No.</th> -->
                                                <th>Name</th>
                                                <th>QTY</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb-books">
                                            
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <th>TOTAL</th>
                                                <th></th>
                                                <th></th>
                                                <th id="td-total" class="text-right"></th>
                                            </tr>
                                        </tbody>
                                </table>

                                <button class="btn btn-success" id="btn_gen">Download</button>



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
        var param = url.searchParams.get("name");
        var items = [];

        var title = document.getElementById("title");
        title.innerText = param;

        // Inputs
        var quot_sect = document.getElementById('sect-quot');
        var rname = document.getElementById('rname');
        var price = document.getElementById('price');
        var bqty = document.getElementById('qty');
        var btn_add = document.getElementById('btn_add');
        var tbl_inv = document.getElementById('tb-books');
        var td_total = document.getElementById('td-total');
        var total = 0;
        quot_sect.style.display = 'none';
        btn_add.addEventListener('click', () => {
            if(rname.value==''||(!rname.value)) return;
            items.push({book:rname.value, price:price.value, qty:parseInt(bqty.value)});
            total = total + parseInt(price.value)*parseInt(bqty.value);
            let tr = document.createElement('tr');
            tr.innerHTML = `
            <td>${rname.value}</td>
            <td>${bqty.value}</td>
            <td>${price.value}</td>
            <td>${parseInt(bqty.value)*parseInt(price.value)}</td>
            `;
            td_total.innerText = total;
            tbl_inv.appendChild(tr);
        })

        if(param=="Invoice"||param=="Quotation"){
            quot_sect.style.display = 'block';
        }

        window.jsPDF = window.jspdf.jsPDF;

        document.getElementById('btn_gen').addEventListener('click', () => {
            if(param == "Invoice"){
            var props = {
            outputType: jsPDFInvoiceTemplate.OutputType.Save,
            returnJsPDFDocObject: true,
            fileName: `Quotation Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}`,
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
                label: "Quotation issued for:",
                name: "Agri Management Division",
                address: "Address, Colombi 02",
                phone: "(+355) 069 22 22 222",
                email: "client@website.al",
                otherInfo: "www.website.al",
            },
            invoice: {
                label: "Quotation #: ",
                num: 19,
                invGenDate: `Quotation Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}`,
                headerBorder: false,
                tableBodyBorder: false,
                header: [
                {
                    title: "#", 
                    style: { 
                    width: 50 
                    } 
                }, 
                { 
                    title: "Book Name",
                    style: {
                    width: 20
                    } 
                }, 
                { 
                    title: "QTY",
                    style: {
                    width: 30
                    } 
                }, 
                { title: "Price"},
                { title: "Total"}
                ],
                table: Array.from(items, (item, index)=>([
                    index + 1,
                    item.book,
                    item.qty,
                    item.price,
                    item.qty*item.price
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
                invDescLabel: `Quotation Total  = Rs. ${total}`,
                invDesc: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
                },
                footer: {
                    text: "The Quotation is created on a computer and is valid without the signature and stamp.",
                },
                pageEnable: true,
                pageLabel: "Page ",
            };
            var doc = jsPDFInvoiceTemplate.default(props);
            createInvoice(items, `Quotation Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}.pdf`, user, total);
        } else if(param=="Quotation"){
            var props = {
            outputType: jsPDFInvoiceTemplate.OutputType.Save,
            returnJsPDFDocObject: true,
            fileName: "Quotation -"+new Date().getDate()+"-"+(new Date().getMonth()+1)+"-"+new Date().getFullYear,
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
                label: "Invoice issued for:",
                name: "Sample Client",
                address: "Address, Colombi 02",
                phone: "(+355) 069 22 22 222",
                email: "client@website.al",
                otherInfo: "www.website.al",
            },
            invoice: {
                label: "Invoice #: ",
                num: 19,
                invGenDate: `Quotation Date: ${new Date().getDate()}/${new Date().getMonth()+1}/${new Date().getFullYear()}`,
                headerBorder: false,
                tableBodyBorder: false,
                header: [
                {
                    title: "#", 
                    style: { 
                    width: 50 
                    } 
                }, 
                { 
                    title: "Book Name",
                    style: {
                    width: 20
                    } 
                }, 
                { 
                    title: "QTY",
                    style: {
                    width: 30
                    } 
                }, 
                { title: "Price"},
                { title: "Total"}
                ],
                table: Array.from(items, (item, index)=>([
                    index + 1,
                    item.book,
                    item.qty,
                    item.price,
                    item.qty*item.price
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
                invDescLabel: "Quotation Note",
                invDesc: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
                },
                footer: {
                    text: "The quotation is created on a computer and is valid without the signature and stamp.",
                },
                pageEnable: true,
                pageLabel: "Page ",
            };
            var doc = jsPDFInvoiceTemplate.default(props);
            createList(items);

        } else {
            var doc = new jsPDF();
            doc.text(20, 20, param);
            doc.text(20, 30, 'This is client-side Javascript, pumping out a PDF.');
            doc.addPage();
            doc.text(20, 20, 'Do you like that?');
            doc.output('dataurlnewwindow'); 
        } 
             
        })
        
    </script>

</body>

</html>