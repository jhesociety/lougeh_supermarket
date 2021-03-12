<?php

session_start();

include_once 'config_connect.php';

if (isset($_POST['save'])) {

    $name = $_POST['fullname'];
    $custAdd = $_POST['address'];
    $custNumber = $_POST['contactnumber'];

    //SQL QUERY TO ADD CUSTOMER TO TABLE "customer_tbl"
    $sqlAddCust = "INSERT INTO customer_tbl (Cust_Name, Cust_Address, Contact_Number) VALUES ('$name','$custAdd','$custNumber')";
    $conn->query($sqlAddCust) or die(mysqli_error());


    $_SESSION['message'] = "Customer Details Added";
    $_SESSION['msg_type'] = "success";

    header("location: manage_customers.php");

}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $updateCust = "SELECT * FROM customer_tbl WHERE Customer_id=$id";
    $result = $conn->query($updateCust) or die(mysqli_error());

    if (count($result) == 1) {
        $row = $result->fetch_array();
        $name = $row['upfullname'];
        $custAdd = $row['upaddress'];
        $custNumber = $row['upcontactnumber'];

    }

}
 