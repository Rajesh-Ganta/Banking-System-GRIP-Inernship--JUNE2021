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
			<th>Sender Name</th>
			<th>Receiver Name</th>
			<th>Transfered Ammount</th>
			<th>Time Stamp</th>
		</tr>
		<?php
			include 'database_connection.php';
			
			$query = "select * from transactions order by time=0 DESC, time DESC ";

			$records = mysqli_query($connection, $query);
			
			if(mysqli_num_rows($records)>0)
			{
				$i = 1;
				echo "<tbody>";
				while ($record = mysqli_fetch_assoc($records)) 
				{
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$record['sender_name']."</td>";
					echo "<td>".$record['receiver_name']."</td>";
					echo "<td>".$record['amount']."</td>";
					echo "<td>".$record['time']."</td>";
					echo "</tr>";		
					$i++;
				}
				echo "</tbody>";

			}
			else
			{
				echo "<tbody>";
				echo "<tr><td colspan='5'>No Transaction are Done.</td></tr>";
				echo "</tbody>";
			}
		?>
	</table>
</body>
</html>