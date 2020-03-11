<?php
    header('Content-Type: text/html; charset=utf-8');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    require_once 'code_email_verification.php';
    require_once 'db_connection.php';

    $id = $_GET['id'];

    $sql = "
        insert into codes (code,user_id)
        values ('$code','$id')
    ";

    $connection->exec($sql);

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
        $mail->addAddress($_GET['email']);    

 

        // Content
        $mail->isHTML(true);                                  
        $mail->Subject = 'Activating your account';
        $mail->Body    = "<h2>Hello {$_GET['name']}</h2><h3>Click the link below to verify your account</h3><br><a href= http://localhost/help_desk/utils/code_verification.php?code=$code >Verify your account</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $connection = null;
        header('Location:../index.php?created');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }  
    

?>