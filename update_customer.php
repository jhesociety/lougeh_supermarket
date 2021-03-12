<?php
include 'config_connect.php';


if (isset($_POST['update'])) {
    $Customer_id = $_POST['Customer_id'];
    $name = $_POST['upfullname'];
    $custAdd = $_POST['upaddress'];
    $custNumber = $_POST['upcontactnumber'];

    $sqlupdatequery = "UPDATE customer_tbl SET Cust_Name = '$name', Cust_Address = '$custAdd', Contact_Number = '$custNumber' WHERE Customer_id='$Customer_id' ";

    $conn->query($sqlupdatequery) or die(mysqli_error());

    header("location: manage_customers.php");

}
