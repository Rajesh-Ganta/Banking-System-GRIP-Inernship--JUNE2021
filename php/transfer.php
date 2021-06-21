<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Bank</title>
    <link rel = "icon" href = "../images/bank_icon.png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
	<?php
		include 'database_connection.php';
		$sender_id = $_POST['sender_id'];
		$receiver_id = $_POST['receiver_id'];
		$transfer_amount = $_POST['amount'];

		$sender_query = 'select * from customers where Id = '.$sender_id.' ;';

		$receiver_query = 'select * from customers where Id = '.$receiver_id.';'; 	
		
		$receiver_record = mysqli_fetch_assoc(mysqli_query($connection, $receiver_query));

		$sender_record = mysqli_fetch_assoc(mysqli_query($connection, $sender_query));

		$sender_name = $sender_record['Name'];
		$receiver_name = $receiver_record['Name'];

		if($sender_record['Balance'] >= $transfer_amount)
		{
			$upadated_sender_balance =  $sender_record['Balance'] - $transfer_amount;
			$upadated_receiver_balance =  $receiver_record['Balance'] + $transfer_amount;

			$receiver_balance_update_query = "update customers set Balance = '$upadated_receiver_balance' where Id = '$receiver_id';";
			$result = mysqli_query($connection,$receiver_balance_update_query);

			$sender_balance_update_query = "update customers set Balance = '$upadated_sender_balance' where Id = '$sender_id';";

			$result = mysqli_query($connection,$sender_balance_update_query);
			
			$transaction_query = "INSERT INTO transactions (sender_id, sender_name, receiver_id, receiver_name, amount) VALUES ('$sender_id','$sender_name','$receiver_id','$receiver_name','$transfer_amount');";
			$result = mysqli_query($connection,$transaction_query);
			
			$msg = "Successful: Funds transfered";

		}
		else
		{
			$msg = "Failure: Insufficient Funds";
		}
		echo "<script> alert('$msg'); window.location.href='show_users.php'; </script>";

	?>
}
</body>
</html>

