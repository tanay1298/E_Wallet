<!Doctype html>
<html>
<head>

 <title>Transaction Page></title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head> 
 
 <body>
  
  
  
  <div class="container">
  <div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
 
	<form method="post">
	  <fieldset>
       <legend>Transaction Dashboard</legend>
	   </br></br>
    
         	<button type="submit" class="btn btn-primary" name="AddMoney" value="AddMoney">Add Money</button>
         	<button type="submit" class="btn btn-primary" name="pay" value="pay">Pay</button>
         	<button type="submit" class="btn btn-primary" name="balance" value="balance">Balance</button>
         	<button type="submit" class="btn btn-primary" name="logout" value="logout">Logout</button>
	        
		</fieldset>
	</form>
	
   </div>
   </div>   
  
</body>
<?php
	session_start();
	if(!isset($_SESSION['user']))
	header("Location: login.php");
	if(isset($_POST['AddMoney']))
	header("Location: addmoney.php");
	else if(isset($_POST['pay']))
	header("Location: pay.php");
	else if(isset($_POST['balance']))
		header("Location: balance.php");
	else if(isset($_POST['logout']))
	{
		session_destroy();
		header("Location: login.php");
	}
?>