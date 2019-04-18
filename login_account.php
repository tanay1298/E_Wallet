<?php

    session_start();

 $host="localhost";
 $username="root";
 $pass="";
 $db="ewallet";
 
  $conn=mysqli_connect($host,$username,$pass,$db);
  
  if(!$conn)
  {
    die("Database connection error");
  }  
        $email=$_POST['email'];
	    $password=md5($_POST['password']);
		
		$query="select * from `users` where email='$email' and password='$password'";
		
		$res=mysqli_query($conn,$query);
		$count=mysqli_num_rows($res);
		$ver="SELECT * from `users` where `email`='$email' and  `password`='$password'";
		$res1=mysqli_query($conn,$ver);
		$emv=mysqli_fetch_assoc($res1);
		if($emv['isemailcomfirmed']=='0')
			{$_SESSION['error1']="please verify your email";
		header('Location:login.php');}
		else if($count==1)
		{
			$em=$_POST['email'];
			$_SESSION['user']=$em;
			
		   $_SESSION['loginsuccess']="Login successful";
		   header('Location:transaction.php');
		}
			
		else
		{
			$_SESSION['error']="Incorrect credentials";
			header('Location:login.php');
		}
		
	
?>  