<?php
namespace EmailSender\Message;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Message
{
    public function run($reciver)
    {
        return $this->config($reciver);
    }

    private function settings()
    {
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'negromonteguilherme@gmail.com';  
        $mail->Password = 'ytpoqeasucxvvjrp';    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        return $mail;
    }

    private function config(string $reciver)
    {
        $mail = $this->settings();

        $mail->setFrom('negromonteguilherme@gmail.com', 'guilherme');
        $mail->addAddress($reciver, '');

        
        $mail->isHTML(false);
        $mail->Subject = 'Welcome!!!';
        $mail->Body = 'Great that you decided to join us, you won´t regret your decision';
        
        $mail->send();
        return 'Message has been sent';
    }
}