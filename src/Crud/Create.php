<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Inputs\Input;
use EmailSender\Crud\Outputs\Output;
use EmailSender\Crud\Writer\Database;
use EmailSender\Crud\Crud;

class Create implements Crud
{

    public function __construct (
        private Input $input,
        private Database $database,
        private Output $output,
    ){}

    public function run()
    {
        $this->createUser($this->input->read());

        $this->output->output($this->input->read());

        return true;
    }

    private function createUser(string $email)
    {
        $this->CheckIfUserIsCreate($email);

        $this->database->write($email);
    }

    private function CheckIfUserIsCreate($email)
    {
        $files = explode("\n", $this->database->get());

        foreach (array_filter($files) as $file) {
            if ($file === $email) {
                throw new \Exception("error, user already exists");
            }
        }
    }
}