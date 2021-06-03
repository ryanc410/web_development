<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.privmailprovider.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'noreply@privmailprovider.com';                     //SMTP username
    $mail->Password   = 'crD$WL5jE#z$ToDL4Z';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('noreply@privmailprovider.com', 'noreply');
    $mail->addAddress('ryanhtown713@outlook.com', 'Ryan Cook');     //Add a recipient
    $mail->addAddress('');               //Name is optional
    $mail->addReplyTo('noreply@privmailprovider.com', 'noreply');
  //$mail->addCC('');
  //$mail->addBCC('');

    //Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New 713TechSupport.com User Registration';
    $mail->Body    = '<Center><h3>Thank you for Registering!</h3></center><br><p>You have registered as <?php echo $_POST['username']; ?>.</p>';
    $mail->AltBody = 'Thank you for registering on 713techsupport.com!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
