<?php

session_start();

include 'config_connect.php';

if (isset($_POST['save'])) {

    $sName = $_POST['suppcomp'];
    $suppNum = $_POST['suppcontact'];
    $suppAdd = $_POST['suppaddress'];

    //SQL QUERY TO ADD CUSTOMER TO TABLE "customer_tbl"
    $sqlAddSupp = "INSERT INTO supplier_tbl (Supp_Company, Supp_Contact_No, Supp_address) VALUES ('$sName','$suppNum','$suppAdd')";
    $conn->query($sqlAddSupp) or die(mysqli_error());


    $_SESSION['message'] = "Customer Details Added";
    $_SESSION['msg_type'] = "success";

    header("location: manage_suppliers.php");

}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$updateSupp = "SELECT * FROM supplier_tbl WHERE Supplier_ID=$id";
	$result = $conn->query($updateSupp) or die(mysqli_error());

	if (count($result)==1) {
		$row = $result->fetch_array();
        $sName = $row['upsuppComp'];
        $suppNum = $row['upsuppContact'];
        $suppAdd = $row['upsuppAddress'];
	}

}
 