<!Doctype html>
<html>
 <head>

    <title>Check Balance Page</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
 </head>
<body>
	

	
	
 <div class="container">
  <div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
	<form method="post" >
  <fieldset>
  
    <legend>Check Balance Dashboard</legend>
	 </br></br>
  
    Your Wallet Balance is := 
	<?php
		session_start();
	 
		include 'database.php';
		
		  $em=$_SESSION['user'];
		  
		$bal="select * from users where `email`='$em'";

		$res=mysqli_query($conn,$bal);
		$rows=mysqli_fetch_assoc($res);
		
		echo $rows['amount'];
		
		if(isset($_POST['back']))
			header("Location: transaction.php");
	?>

	</br></br>
    
	<div class="text-center">
   	<button type="submit" class="btn btn-primary" name="back" value="back">Back</button>
    </div>
	</fieldset>
</form>

</div>
</div>
	
	
	
</body>
</html>


