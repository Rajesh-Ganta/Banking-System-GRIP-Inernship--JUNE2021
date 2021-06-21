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
	  	<?php include 'navbar.php'; ?>
	  	<table>
	  		<tr>
				<th>Customer Id</th>
				<th>Customer Name</th>
				<th>Email</th>
				<th>Balance</th>
			</tr>
			<tbody>
				<?php

					include 'database_connection.php';

					$sender_id = $_POST['bt1'];

					$sender_query = 'select * from customers where Id = '.$sender_id.' ;';
	
					$records = mysqli_query($connection, $sender_query);

					if(mysqli_num_rows($records) == 1)
					{
						while ($record = mysqli_fetch_assoc($records)) 
						{
							echo "<tr>";
							echo "<td>".$record['Id']."</td>";
							echo "<td>".$record['Name']."</td>";
							echo "<td>".$record['Email']."</td>";
							echo "<td>".$record['Balance']."</td>";
						}

					}
					echo "</tbody>";
					echo "</table>";
					echo "<div class='forms2'>";
					echo "<form action = 'transfer.php' method='POST'>";
					echo "<label>select the receiver:</label>";

					echo "<input type='text' hidden name='sender_id' value = ".$sender_id.">";
					$recivers_query = 'select Id, Name from customers where not Id = '.$sender_id.' ;';
					$records = mysqli_query($connection, $recivers_query);
					echo "<div><select  name='receiver_id' required>";
					while ($record = mysqli_fetch_assoc($records)) 
					{
						echo "<option style = 'width: 50%;' value =".$record['Id'].">".$record['Name']."</option>";
					}
					echo "</select></div>";
					echo "<label >Amount:</label>";
					echo "<input type='number' class='form-control' placeholder='Enter Amount' name='amount' required=''><br>";
					echo "<button type='submit' class='btn btn-primary'>Transfer Funds</button>";
					echo "</div>";
					echo "</form>";
				?>
	</body>
</html>