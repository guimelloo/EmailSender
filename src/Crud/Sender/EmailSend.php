<?php
namespace EmailSender\Crud\Sender;

use EmailSender\Crud\Sender\Sender;
use EmailSender\Message\Email;

class EmailSend implements Sender
{
    public function send(string $email): ?string
    {
        if ($email == false) {
            return 'error';
        }

        $message = new Email;

        return $message->run($email);
    }
}