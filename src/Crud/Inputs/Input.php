<?php
namespace EmailSender\Crud\Inputs;

interface Input
{
    public function read(): string;

    public function crateUser(string $i);
}