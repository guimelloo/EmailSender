<?php
namespace EmailSender\Crud\Outputs;

use EmailSender\Crud\Outputs\Output;
use EmailSender\Message\Message;

class EmailOutput implements Output
{
    public function output(string $email): ?string
    {
        if ($email == false) {
            return 'error';
        }

        $message = new Message;

        $message->run($email);
    }
}