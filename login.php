<?php

 session_start();

?>
 

<html>
  <head>
    <title>Login Page</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script>
	 function checkvalid()
	 {
		 
		 var email=$('#InputEmail').val();	
		 var password=$('#InputPassword').val();
		 var passlength=$('#InputPassword').val().length;
		 	
		if(email=='')
		 {
			 alert("please enter your email");
			 return false;
		 }

		if(password=='')
		 {
			 alert("please enter your password");
			 return false;
		 } 	 
		 
		if(passlength<=4)
        {
			alert("password should be of minimum 4 characters");
			return false;	
		}
	 }
	</script>
	
  </head>
  
<body>  

 <?php include "header.php";?>

<div class="container">


<!----------------------------------------------------form starts here--------------------------------------------------------------->


<div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
<form method="post" onsubmit="return checkvalid();" action="login_account.php">
  <fieldset>
  
    <legend>Login</legend>
	
	<?php
	 
	 // if(isset($_SESSION['success']))
	  //{
		//  echo $_SESSION['success'];
	    //  unset($_SESSION['success']);  
	//  }
	  if(isset($_SESSION['error']))
	  {
	     echo $_SESSION['error'];
		 unset($_SESSION['error']);
	  }
	  else if(isset($_SESSION['error1']))
	  {
	  	 echo $_SESSION['error1'];
		 unset($_SESSION['error1']);
	  }
	
	
	?>
	
	
    <div class="form-group">
      <label for="InputEmail">Email address</label>
      <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
	

    <div class="form-group">
      <label for="InputPassword">Password</label>
      <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
    </div>
    
    <button type="submit" class="btn btn-primary">Login</button>
  </fieldset>
</form>
</div>

</div>

</body>


</html>