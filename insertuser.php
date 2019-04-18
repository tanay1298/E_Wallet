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
  
  if(isset($_POST['email']))
  {
	    $name=$_POST['InputName'];
        $email=$_POST['email'];
	    $number=$_POST['number'];
	    $password=md5($_POST['password']);
		$vkey=md5(uniqid());
		$query="insert into `users` (`user_id`,`name`,`email`,`number`,`password`,`token`) values('','$name','$email','$number','$password','$vkey')";
		
		mysqli_query($conn,$query);
		
		if($query)
		{ 
          require 'phpmailer/PHPMailerAutoload.php';
          $mail=new PHPMailer;
          $mail->isSMTP();
          $mail->Host='smtp.gmail.com';
          $mail->Port=587;
          $mail->SMTPAuth=true;
          $mail->SMTPSecure='tls';

          $mail->Username='email.verfi@gmail.com';
          $mail->Password='Pass@123';

           $mail->setFrom('email.verfi@gmail.com','E-wallet');
          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject='user verification';  
          $mail->Body="click on the link to verify http://localhost:8080/ewallet_php/activate.php?vkey=$vkey";
          if(!$mail->send())
         	$_SESSION['mailerror']="email not sent";
          else
        	$_SESSION['mailsuccess']="ThankYou for registering, Please verify you Email";
        header("Location: register.php");

		}
		else
			echo "Data not inserted";
         
	 
  }  
  //insert query for registration page
  
  
  
?>  