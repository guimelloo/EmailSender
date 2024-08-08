<?php
namespace EmailSender\Message;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

interface Message
{
    public function run(string $reciver);

    public function settings();

    public function config(string $reciver);

}