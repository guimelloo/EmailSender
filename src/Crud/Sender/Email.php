<?php
namespace EmailSender\Crud\Sender;

use EmailSender\Crud\Sender\Sender;
use EmailSender\Message\Message;

class Email implements Sender
{
    public function send(string $email): ?string
    {
        if ($email == false) {
            return 'error';
        }

        $message = new Message;

        return $message->run($email);
    }
}