<?php
namespace EmailSender\Crud;

use EmailSender\Crud\Inputs\Input;
use EmailSender\Crud\Writer\Write;

class Delete implements Crud
{
    public function __construct (
        private Input $input,
        private Write $writer,
    ){}

    public function run()
    {
        $this->deleteUser($this->input->read());

        return true;
    }

    private function deleteUser(string $email)
    {
        $path = __DIR__ . '/database.txt';

        $myfile = fopen($path, "a+");

        $this->CheckIfUserExists($email, $path);

        $this->writer->unWrite($myfile, $email);

        fclose($myfile);
    }

    private function CheckIfUserExists($email, $path)
    {
        $files = file($path);

        // dd($files);
        foreach ($files as $file) {
            if ($file === $email) {
                return new \Exception("error, user does not exists");
            }
        }
    }
}