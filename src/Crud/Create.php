<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Inputs\Input;
use EmailSender\Crud\Outputs\Output;
use EmailSender\Crud\Writer\Write;
use EmailSender\Crud\Crud;

class Create implements Crud
{

    public function __construct (
        private Input $input,
        private Write $writer,
        private Output $output

    ){}

    public function run()
    {
        $this->createUser($this->input->read());

        $this->output->output($this->input->read());

        return true;
    }

    private function createUser(string $email)
    {
        $path = __DIR__ . '/database.txt';

        $myfile = fopen($path, "a+");

        $this->CheckIfUserIsCreate($email, $path);

        $this->writer->write($myfile, $email);

        fclose($myfile);

        // return true;
    }

    private function CheckIfUserIsCreate($email, $path)
    {
        $files = file($path);

        // dd($files);
        foreach ($files as $file) {
            if ($file === $email) {
                throw new \Exception("error, user alredy exists");
            }
        }
    }
}