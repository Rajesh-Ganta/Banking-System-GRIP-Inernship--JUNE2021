<?php
	$server_name = "127.0.0.1";
	$user_name = "root";
	$password = "";
	$data_base = "sparks_bank_db";

	$connection = mysqli_connect($server_name, $user_name, $password, $data_base);

	if ($connection->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>