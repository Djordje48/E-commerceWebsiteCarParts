<?php
	use PHPMailer\PHPMailer\PHPMailer;
	if(isset($_POST['name']) && isset($_POST['email'])){
		$name= $_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$body=$_POST['bodyy'];
		
		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";
		
		$mail= new PHPMailer();
		
		$mail->isSMTP();
		$mail->Host= "smtp.gmail.com";
		$mail->SMTPAuth=true;
		$mail->Username="ilicprogramming@gmail.com";
		$mail->Password='programerstvo';
		$mail->Port=465;
		$mail->SMTPSecure="ssl";
		
		$mail->isHTML(true);
		$mail->setFrom($email,$name);
		$mail->addAddress("ilic98djordje@gmail.com");
		$mail->Subject=$subject;
		$mail->Body=$body;
		
		if($mail->Send())
			$response ="Email is sent!";
		else
			$response= "Something is wrong: <br><br>" . $mail->ErrorInfo;
		
		exit(json_encode(array("response"=>$response)));
	}
?>