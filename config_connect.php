<?php

// SQL Database Configuration 

$servername = "localhost"; // Server or host Name Ex. localhost
$username = "root"; // SQL User
$password = ""; // SQL Password
$dbname = "system1"; // SQL Database Name

// Connection Table
$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection Error: " . mysqli_connect_error());
	}
