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

    $sqladdProd1 = "INSERT INTO product_tbl (Supplier_ID, Prod_Desc, Prod_Qty , Prod_Cost , Prod_Date, Prod_Code) VALUES ('$selectedSupp','$prodName','$prodQuan','$prodPrice','$prodDate','$prodCode')";

    $conn->query($sqladdProd1) or die(mysqli_error());


    $_SESSION['message'] = "Products Details Added";
    $_SESSION['msg_type'] = "success";

    header("location: manage_products.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$updateSupp = "SELECT * FROM product_tbl WHERE product_id=$id";
	$result = $conn->query($updateSupp) or die(mysqli_error());

	if (count($result)==1) {
		$row = $result->fetch_array();
        $sName = $row['upsuppComp'];
        $suppNum = $row['upsuppContact'];
        $suppAdd = $row['upsuppAddress'];
	}

}
 