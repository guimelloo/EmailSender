<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Inputs\Input;
use EmailSender\Crud\Outputs\Output;
use EmailSender\Crud\Database\DB;
use EmailSender\Crud\Crud;
use EmailSender\Crud\Sender\Sender;

class Create implements Crud
{

    public function __construct (
        private Input $input,
        private DB $database,
        private Sender $sender,
        private Output $output,
    ){}

    public function run()
    {
        $email = $this->createUser($this->input->read());

        $this->sender->send($email);

        $this->output->output();

        return true;
    }

    private function createUser(string $email)
    {
        $this->CheckIfUserIsCreate($email);

        $this->database->write($email);
        
        return $email;
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