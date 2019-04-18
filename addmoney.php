<!Doctype html>
<html>
 <head>

    <title>Add Money Page</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
 </head>
<body>
	
 <div class="container">
  <div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
	<form method="post" >
  <fieldset>
  
    <legend>AddMoney Dashboard</legend>
	 </br></br>
  
    <div class="form-group">
      <label for="InputAmount">Amount</label>
      <input type="number" class="form-control" id="InputAmount" placeholder="Enter Amount" name="amount">
    </div>
	
<?php

session_start();
 include "database.php";

$em=$_SESSION['user'];

if(isset($_POST['add']))
{
	$am=$_POST['amount'];

	if(!empty($am))
	{
		
	   $ub="UPDATE users SET amount=amount+'$am' WHERE `email`='$em'";

	   if(mysqli_query($conn,$ub))
		echo "amount added successfully";
	   else
		 echo "amount cannot be added";
	}
}

if(isset($_POST['back']))
header("Location: transaction.php");

?>
	
	</br></br>
	
	<div class="text-center">
	 <button type="submit" class="btn btn-primary" name="add" value="add">Add</button>
	 <button type="submit" class="btn btn-primary" name="back" value="back">Back</button>
    </div>
  </fieldset>
</form>

</div>
</div>
	
	
	
</body>
</html>
