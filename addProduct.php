<?php

session_start();

include 'config_connect.php';

if (isset($_POST['save'])) {

    $selectedSupp = $_POST['suppID'];
    $prodName = $_POST['prodName'];
    $prodQuan = $_POST['prodQuan'];
    $prodPrice = $_POST['prodPrice'];
    $prodDate = $_POST['prodDate'];
    $prodCode = $_POST['prodCode'];

    $sqladdProd1 = "INSERT INTO product_tbl (Supplier_ID, Prod_Desc, Prod_Qty , Prod_Cost , Prod_Date, Prod_Code) VALUES ('1','$prodName','$prodQuan','$prodPrice','$prodDate','$prodCode')";

    $conn->query($sqladdProd1) or die(mysqli_error());


    $_SESSION['message'] = "Products Details Added";
    $_SESSION['msg_type'] = "success";

    header("location: manage_products.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$updateProd = "SELECT * FROM product_tbl WHERE product_id=$id";
	$result = $conn->query($updateProd) or die(mysqli_error());

	if (count($result)==1) {
		$row = $result->fetch_array();
        $selectedSupp = $row['suppID'];
        $selectedSupp = $row['suppID'];
        $prodName = $row['prodName'];
        $prodQuan = $row['prodQuan'];
        $prodPrice = $row['prodPrice'];
        $prodDate = $row['prodDate'];
        $prodCode = $row['prodCode'];


	}

}
 