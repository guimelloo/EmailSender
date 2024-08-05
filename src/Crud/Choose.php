<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
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
        $input = new TerminalInput;

        $crud = match (strtolower($msg)) {
            'create' => new Create($input) ,
            // 'delete' => new Delete($input),
        };

        $crud->run();
    }
}