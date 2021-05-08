<?php



use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
function send_otp($email,$otp)
{
$mail = new PHPMailer(true);




  $alert = '';
  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Enter Your mail id'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Enter password of email'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('notesharing0@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'ONE TIME PASSWORD';
    $mail->Body = "<h1><center>Hostle / PG Management Systesm </center></h1><br>
                    <h3>Your Verification code is </h3><br> <h1><b><big>".$otp."</big></b></h1>";

    $mail->send();
    $alert = '<div class="alert-success">
    <span>OTP is  Sent Successfully .</span>
   </div>';
    return $alert;
   
  } catch (Exception $e){
    $alert = '<div class="alert alert-warning " role="alert"> Something went wrong ! </div>';
      return $alert;        
  }

}
?>
