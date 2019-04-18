<?php

session_start();
?>
 

<html>
  <head>
    <title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script>
	 function checkvalid()
	 {
		 
	     var name=$('#InputName').val();
		 var email=$('#InputEmail').val();	
		 var number=$('#InputNumber').val();
		 var numlength=$('#InputNumber').val().length;
		 var password=$('#InputPassword').val();
		 var passlength=$('#InputPassword').val().length;
		 
		 if(name=='')
		 {
		   alert("please enter your name");
			return false;
		 }
			
		if(email=='')
		 {
			 alert("please enter your email");
			 return false;
		 }

		if(number=='')
		 {
			 alert("please enter your number");
			 return false;
		 } 	 
		 
		if(numlength!=10)
        {
			alert("number should be of 10 digits");
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

<header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Friendly-Wallet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor03">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
	  
	  
	<li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
	  

	  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	  
	  
	  
    </form>
	  
  </div>
</nav>

</header>


<div class="container">


<!----------------------------------------------------form starts here--------------------------------------------------------------->


<div class="col-sm-4 col-sm-3 offset-md-3 breadcrumb">
<form method="post" onsubmit="return checkvalid();" action="insertuser.php">
  <fieldset>
  
    <legend>Register</legend>
	
	<?php 
	  if(isset($_SESSION['mailsuccess']))
	  {
		  echo $_SESSION['mailsuccess'];
		   unset($_SESSION['mailsuccess']);  
	  }
	  else if(isset($_SESSION['mailerror']))
	  {
	  	echo $_SESSION['mailerror'];
	  	unset($_SESSION['mailerror']);
	  }
	?>
	 
	 <div class="form-group">
      <label for="InputName">Name</label>
      <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter name" >
    </div>
    
    <div class="form-group">
      <label for="InputEmail">Email address</label>
      <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
	
	<div class="form-group">
      <label for="InputNumber">Number</label>
      <input type="number" class="form-control" id="InputNumber" placeholder="Enter number" name="number">
    </div>
	
    <div class="form-group">
      <label for="InputPassword">Password</label>
      <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
    </div>
    
    <button type="reset" class="btn btn-info">Cancel</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
</div>

</div>

</body>


</html>