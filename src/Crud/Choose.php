<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use EmailSender\Crud\Outputs\EmailOutput;
use EmailSender\Crud\Delete;
use EmailSender\Crud\Writer\WriteFile;

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
            'create' => new Create( new TerminalInput, new WriteFile, new EmailOutput) ,
            // 'delete' => new Delete($input),
        };

        $crud->run();
    }
}