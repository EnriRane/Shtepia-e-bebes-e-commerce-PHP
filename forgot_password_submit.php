<?php
require('connection.inc.php');
require('function.inc.php');

$email=get_safe_value($con,$_POST['email']);
$res=mysqli_query($con,"select * from users where email='$email'");
$check_user=mysqli_num_rows($res);


	if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$pwd=$row['password'];
	$html="Passwordi juaj eshte ne faqen 'Shtepia e Bebes' eshte <strong>$pwd</strong>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="zroizin3000@gmail.com";
	$mail->Password="neverforget3000!";
	$mail->SetFrom("zroizin3000@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject="Njoftim nga 'Shtepia e Bebes";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		echo "Perfundoi me sukses";
	}else{
		echo "Ndodhi nje gabim! Ju lutem provoni serish me vone!";
	}
}else{
	echo "Adresa juaj e emalit nuk gjendet e rregjistruar ne databazen e dyqanit tone!";
	die();
}


?>
