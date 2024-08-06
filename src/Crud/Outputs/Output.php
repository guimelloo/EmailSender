<?php
namespace EmailSender\Crud\Outputs;

interface Output
{
    public function output(string $email): ?string;
}