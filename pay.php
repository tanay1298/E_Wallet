<!Doctype html>
<html>
 <head>

    <title>Pay Money Page</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script>
	 function checkvalid()
	 {
		 
	     var num=$('#rnumber').val();
		 var amnt=$('#ramount').val();	
		 var numleng=$('#rnumber').val().length;
		 
		 
		if(num=='')
		 {
			 alert("please enter your number");
			 return false;
		 } 	 
		 
		if(numleng!=10)
        {
			alert("number should be of 10 digits");
			return false;
		}	
		
		if(amnt=='')
		{
			alert("please enter amount");
			return false;
		}
		 
	 }
	</script>
	
	
 </head>
<body>
	
 <div class="container">
  <div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
	<form method="post" onsubmit="return checkvalidat();">
  <fieldset>
  
    <legend>PayMoney Dashboard</legend>
	 </br></br>
  
   <div class="form-group">
      <label for="InputAmount">Enter Receipent's Number</label>
      <input type="text" class="form-control" id="rnumber" placeholder="Enter Amount" name="rnumber">
    </div>
  
    <div class="form-group">
      <label for="InputAmount">Amount</label>
      <input type="number" class="form-control" id="ramount" placeholder="Enter Amount" name="ramount">
    </div>
	
	</br>
    
     
  <?php

		session_start();
		include 'database.php';

		if(isset($_POST['add']))
		{
			//receiver code starts here 
			
			  $rnum=$_POST['rnumber'];
			  $amt=$_POST['ramount'];
		 
		 
				$ema=$_SESSION['user'];	
				$bal="select * from users where `email`='$ema'";
				$res=mysqli_query($conn,$bal);
				$row=mysqli_fetch_assoc($res);	
				$self_amt=$row['amount'];
		  
			  
			  if($self_amt>=$amt)	 
			 {
				$ph="SELECT * FROM users WHERE `number`='$rnum'";
				$res=mysqli_query($conn,$ph);  
				$count=mysqli_num_rows($res);
			
				  if($count==1)
				  {
					$ub="UPDATE users SET amount=amount+'$amt' WHERE `number`='$rnum'";		
					$up="UPDATE users SET amount=amount-'$amt' WHERE `email`='$ema'";
				

					 if(mysqli_query($conn,$ub))
						echo "amount sent to user successfully"."</br>";
					 if(mysqli_query($conn,$up))
						 echo "amount debited from your account"."</br>";
				  }
				  else
					echo "receiver does no exist"."</br>";
			}
			else 
				echo "your wallet balance is low";
	   }
	
		
		if(isset($_POST['back']))
		header("Location: transaction.php");
  ?>

 	
	
	</br></br>
	<div class="text-center">
      <button type="submit" class="btn btn-primary" name="add" value="add" onclick="return checkvalidat()">Send</button>
	  <button type="submit" class="btn btn-primary" name="back" value="back">Back</button>
    </div>
  
  </fieldset>
</form>

</div>
</div>
	
	
	
</body>
</html>