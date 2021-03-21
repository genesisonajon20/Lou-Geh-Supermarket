<!DOCTYPE html>

<head>


    <title>Lougeh Supermarket - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
        
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="TotalSales.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-shopify"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Lougeh <sup>Supermarket</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item ">
                <a class="nav-link" href="supplier.php">
                    <i class="fas fa-truck-loading"></i>
                    <span>SUPPLIER</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="product.php">
                    <i class="fas fa-cube"></i>
                    <span>PRODUCTS</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="customer.php">
                    <i class="fas fa-users"></i>
                    <span>CUSTOMER</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="sales.php">
                    <i class="fas fa-chart-bar"></i>
                    <span>SALES</span></a>
                </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Search -->
                    
                     <!-- Topbar Navbar -->
                     <ul class="navbar-nav ml-auto">
                            <h1>PRODUCT INFO</h1>
                        </ul>
                        
                   

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
              
                <!-- /.container-fluid -->
                <!--for table and viewing data-->

    <div class="container-fluid">
        <div class = "form-group">
            <table class = "table">
        <thead>
            <tr>
                <th>ID</th>
                <th>BARCODE</th>
                <th>Supplier Name</th>
                <th>Product Description</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php
$mysqli = new mysqli('localhost', 'root', '', 'inventorydb') or die (mysqli_error($mysqli));
$result = $mysqli->query("SELECT product_tbl.product_id, product_tbl.Barcode, supplier_tbl.Supp_Company, product_tbl.Prod_Desc, product_tbl.Prod_Qty, product_tbl.Prod_Cost, product_tbl.Prod_Date
 FROM product_tbl INNER JOIN supplier_tbl ON product_tbl.supplier_id = supplier_tbl.Supplier_ID")or die($mysqli->error);
?>
        <?php
            while ($row = $result->fetch_assoc()): 
        ?>
            <tr>
                <td>
                    <?php echo $row ['product_id']?>
                </td>
                <td style = "font-family: 'Libre Barcode 39'; font-size: 30px; text-align: center">
                    <?php echo $row ['Barcode']?>
                </td>
                <td>
                    <?php echo $row ['Supp_Company']?>
                </td>
                <td>
                    <?php echo $row ['Prod_Desc']?>
                </td>
                <td>
                    <?php echo $row ['Prod_Qty']?>
                </td>
                <td>
                    <?php echo $row ['Prod_Cost']?>
                </td>
                <td>
                    <?php echo $row ['Prod_Date']?>
                </td>
                
            </tr>

            <?php endwhile;?>    
        </table>
    </div>
</div>

<?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lougeh Supermarket 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
