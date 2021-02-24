<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['imeprezime'];
  $email = $_POST['emailadresa'];
	$message = $_POST['poruka'];
	$telefon = $_POST['brojmobitela'];
	

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'antonio2.sumak@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = '2YDYTK2M'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';
    $mail->setFrom('antonio2.sumak@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('antonio2.sumak@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = 'Poslano sa web-stranice';
    $mail->Body = "<h3>Ime i prezime: $name <br>Email: $email <br>Broj telefona: $telefon</h3><p> <br>Poruka: $message</p>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Poruka poslana! Hvala na kontaktiranju!</span>
                </div>';
                
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
