<?php
namespace EmailSender\Message;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

interface Message
{
    public function run(string $reciver);

    private function settings();

    private function config(string $reciver);

}