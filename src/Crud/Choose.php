<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use EmailSender\Crud\Outputs\EmailOutput;
use EmailSender\Crud\Delete;

class Choose
{
    public function run()
    {
        $msg = readline('oque deseja fazer: Login, Create, Delete or Edit. ');
        $this->chooseFactory($msg);
    }

    private function chooseFactory($msg)
    {
        $crud = match (strtolower($msg)) {
            'create' => new Create( new TerminalInput, new EmailOutput) ,
            // 'delete' => new Delete($input),
        };

        $crud->run();
    }
}