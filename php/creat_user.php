<?php
	$name = $_POST['Name'];
	$mail = $_POST['Email'];
	$amount = $_POST['Amount'];

	include 'database_connection.php';

	$insert_query = "INSERT INTO customers (Name, Email, Balance) VALUES ('$name','$mail','$amount');";

	mysqli_query($connection, $insert_query);

	echo "<script> alert('Successful: Customer Added'); window.location.href='show_users.php'; </script>";
?>