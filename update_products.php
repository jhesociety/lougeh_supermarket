<?php
include 'config_connect.php';


if (isset($_POST['update'])) {
    $Supplier_ID = $_POST['Supplier_ID'];
    $sName = $_POST['upsuppComp'];
    $suppNum = $_POST['upsuppContact'];
    $suppAdd = $_POST['upsuppAddress'];

    $sql1updateSupp = "UPDATE supplier_tbl SET Supp_Company = '$sName', Supp_Contact_No = '$suppNum', Supp_address = '$suppAdd' WHERE Supplier_ID='$Supplier_ID' ";

    $conn->query($sql1updateSupp) or die(mysqli_error());

    header("location: manage_suppliers.php");

}
