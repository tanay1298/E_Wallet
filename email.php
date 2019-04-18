<?php
	$to = "tanay.burreja12@gmail.com";
	$subject = "response from website";
	$message = "welcome";
	$headers = "From: email.verfi@gmail.com";

	if(mail($to,$subject,$message,$headers))
	{
	  echo "mail send successfully";
	}
	else
		echo "cannot send mail";
 
 ?>