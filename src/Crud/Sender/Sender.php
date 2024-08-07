<?php
namespace EmailSender\Crud\Sender;

interface Sender
{
    public function send(string $email);
}