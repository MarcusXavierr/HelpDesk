<?php
    header('Content-Type: text/html; charset=utf-8');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    require_once 'code_email_verification.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                   
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'emailphpsender@gmail.com';                   
        $mail->Password   = '!@123456789$';                            
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom('emailphpsender@gmail.com', 'Help Desk');
        $mail->addAddress('marcusxavierr123@gmail.com');    

 

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Activating your account';
        $mail->Body    = "<h2>Hello Marcus</h2><h3>Click the link below to verify your account</h3><br><a href= http://localhost/help_desk/ >Verify your account</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>