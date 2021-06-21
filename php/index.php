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
    <div class="container-fluid">
      <form class="forms" action="creat_user.php" method="POST">
        <div class="form-group">
          <h3 class="heading"> Create User <i class="fa fa-user"></i> </h3>
          <label>Customer Name</label>
          <input type="text" class="form-control" placeholder="Enter Name" required="" name="Name" >
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="" name="Email" >
          <label >Credited Amount:</label>
          <input type="number" class="form-control" placeholder="Enter Amount" required="" name="Amount">
        </div>
        <button type="submit" class="btn btn-primary">create</button>
      </form>
    </div>
</body>
</html>