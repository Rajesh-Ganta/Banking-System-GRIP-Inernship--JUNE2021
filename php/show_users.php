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
				<th>S.No</th>
				<th>Customer Name</th>
				<th>Email</th>
				<th>Balance</th>
				<th>Action</th>
			</tr>
			<tbody>
				<?php
					include 'database_connection.php';
					
					$query = "select * from customers;";

					$records = mysqli_query($connection, $query);

					if(mysqli_num_rows($records) > 0)
					{
						$i = 1;
						while ($record = mysqli_fetch_assoc($records)) 
						{
							echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$record['Name']."</td>";
							echo "<td>".$record['Email']."</td>";
							echo "<td>".$record['Balance']."</td>";
							echo "<td> <form action='view_user.php' method ='POST'> <button type='submit' class='btn btn-success' value = ".$record['Id']." name = 'bt1'>Transfer</button></form>";
							echo "</tr>";
							$i++;
						}
					}
				?>
			</tbody>
		</table>
	</body>
</html>