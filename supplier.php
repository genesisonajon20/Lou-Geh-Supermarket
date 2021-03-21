<!DOCTYPE html>

<head>


    <title>Lougeh Supermarket - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        
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
                <li class="nav-item active">
                <a class="nav-link" href="supplier.php">
                    <i class="fas fa-truck-loading"></i>
                    <span>SUPPLIER</span></a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="product.php">
                    <i class="fas fa-cube"></i>
                    <span>PRODUCTS</span></a>
                </li>
                <li class="nav-item">
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
                            <h1>SUPPLIER INFO</h1>
                        </ul>
                        
                   

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php require_once 'process.php';?>
                <div class="container-fluid">
                    <form action = "process.php" method = "POST">
                
                    
                   
                    <!-- Content Row -->
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type = "text" name = "CompName" class = "form-control"
                               value="<?php echo $CompName?>" placeholder = "Enter Company name">
                    </div>

                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type = "text" name = "ContactNo" class = "form-control"
                               value="<?php echo $ContactNo?>" placeholder = "Enter Contact No.">
                    </div>

                    <div class="form-group">
                        <label>Address.</label>
                        <input type = "text" name = "CompAddress" class = "form-control"
                               value = "<?php echo $CompAddress?>" placeholder = "Enter Address.">
                    </div>

                    <!-- Content Row -->
                    <div class = "form-group">
                   
                        <button type = "submit" class="btn btn-primary" name ="btnSave">Save</button>
                    
                            
                    </div>
                    </form>

                </div>
                <!-- /.container-fluid -->
                <!--for table and viewing data-->
<?php
$mysqli = new mysqli('localhost', 'root', '', 'inventorydb') or die (mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM supplier_tbl")or die($mysqli->error);
?>
    <div class="container-fluid">
        <div class = "form-group">
            <table class = "table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Contact No.</th>
                <th>Company Address</th>
                
            </tr>
        </thead>
        <?php
            while ($row = $result->fetch_assoc()): 
        ?>
            <tr>
                <td>
                    <?php echo $row ['Supplier_ID']?>
                </td>
                <td>
                    <?php echo $row ['Supp_Company']?>
                </td>
                <td>
                    <?php echo $row ['Supp_Contact_No']?>
                </td>
                <td>
                    <?php echo $row ['Supp_address']?>
                </td>
                <td>
                    
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
