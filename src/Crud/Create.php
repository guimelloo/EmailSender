<?php
namespace EmailSender\Crud;

use EmailSender\Message\Message;
use EmailSender\Crud\Crud;

class Create implements Crud
{
    public function run()
    {
        $email = readline('digite seu email ');

        $check = $this->createUser($email);

        $this->SendMessageIfIsCreate($check, $email);
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