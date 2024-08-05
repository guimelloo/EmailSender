<?php
namespace EmailSender\Crud\Inputs;

use EmailSender\Crud\Inputs\Input;

class TerminalInput implements Input
{
    public function read(): string
    {
        return readline('Qual o seu email?: ');
    }
}