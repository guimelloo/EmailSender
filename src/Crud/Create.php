<?php
namespace EmailSender\Crud;

use EmailSender\Message\Message;
use EmailSender\Crud\Inputs\Input;
use EmailSender\Crud\Crud;

class Create implements Crud
{

    public function __construct (
        private Input $input
    ){}

    public function run()
    {
        return $this->createUser($this->input->read());
        // $this->SendMessageIfIsCreate($check, $email);
    }

    private function createUser(string $email)
    {
        $path = __DIR__ . '/database.txt';

        $myfile = fopen($path, "a+");

        $this->CheckIfUserIsCreate($email, $path);

        fwrite($myfile, "$email\n");

        fclose($myfile);

        return true;
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

    private function SendMessageIfIsCreate(bool $a, string $email)
    {
        if ($a == false) {
            return 'error';
        }

        $message = new Message;

        $message->run($email);

    }
}