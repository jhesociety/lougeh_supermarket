<?php
include 'config_connect.php';


?>


<!DOCTYPE html>

<head>
    <title>Lougeh Supermarket - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?$_SESSION['msg_type']?>">

        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);

        ?>

    </div>
<?php endif ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Lougeh <sup>Supermarket</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Management</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manage:</h6>
                    <a class="collapse-item" href="manage_products.php">Products</a>
                    <a class="collapse-item" href="manage_customers.php">Customers</a>
                    <a class="collapse-item" href="manage_suppliers.php">Suppliers</a>
                </div>
            </div>
        </li>


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
                <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Sales Dashboard</h1>
                </div>

                <!-- DataTables -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Sales</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Sales ID</th>
                                    <th>Product Decriptions</th>
                                    <th>Customer Name</th>
                                    <th>Sold Quantity</th>
                                    <th>Total Sost</th>
                                    <th>Date</th>
                                    <th colspan="1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                include('config_connect.php');
                                if ($conn->connect_error) {
                                    die("Connection Failed" . $conn->connect_error);
                                }
                                $sql = "SELECT sales_tbl.`Sales_ID`,product_tbl.`Prod_Desc`, customer_tbl.`Cust_Name`,sales_tbl.`Sold_Qty`,sales_tbl.`Total_Sold`,sales_tbl.`Sales_Date`  FROM sales_tbl 
INNER JOIN product_tbl ON sales_tbl.`Product_ID` = product_tbl.`product_id`
INNER JOIN customer_tbl ON sales_tbl.`Customer_ID` = customer_tbl.`Customer_id`";
                                $result = $conn->query($sql); ?>

                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo $row['Sales_ID']; ?></td>
                                        <td><?php echo $row['Prod_Desc']; ?></td>
                                        <td><?php echo $row['Cust_Name']; ?></td>
                                        <td><?php echo $row['Sold_Qty']; ?></td>
                                        <td><?php echo $row['Total_Sold']; ?></td>
                                        <td><?php echo $row['Sales_Date']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-block" data-toggle="modal"
                                                    type="button"
                                                    data-target="#UpdateModal<?php echo $row['Sales_ID'] ?>">
                                                <span class="fa fa-search fa-sm"></span> View
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                    include 'modal_product.php';
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

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
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <? require_once 'addProduct.php'?>
            <form action="addProduct.php" method="POST" >
                <div class="modal-header">

                    <h5 class="modal-title" id="modelTitle">Add Customer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <?php
                        if ($conn -> connect_error){
                            die("Connection Failed" . $conn->connect_error);
                        }
                        $sqlDropDown = "SELECT * FROM supplier_tbl";
                        $resultDropDown = $conn -> query($sqlDropDown); ?>

                        <label class="col-form-label">Supplier:</label>
                        <select name="suppID" class="form-control dropdown-toggle" >

                            <option value="" disabled>Choose option</option>
                            <?php
                            while($row = $resultDropDown->fetch_assoc())
                            {
                                $suppID = $row['Supplier_ID'];
                                $suppComp = $row['Supp_Company'];

                                echo "<option value='Supplier_ID'>$suppComp</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Product Name:</label>
                        <input type="text" class="form-control " name="prodName" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control " name="prodQuan" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Price:</label>
                        <input type="number" class="form-control " name="prodPrice" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Date:</label>
                        <input type="date" class="form-control " name="prodDate" required="required">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Barcode:</label>
                        <input type="text" class="form-control " name="prodCode" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save" >Add</button>

                </div>
            </form>
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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>
