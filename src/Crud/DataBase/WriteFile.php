<?php
namespace EmailSender\Crud\Database;

use EmailSender\Crud\DataBase\Write;
use EmailSender\Crud\DataBase\DB;

class WriteFile implements DB
{
    public function __construct(public readonly string $filename)
    {}

    public function get()
    {
        return file_get_contents($this->filename);
    }

    public function write($email) :bool
    {
        $file = fopen($this->filename, 'a+');

        $result = fwrite($file, "$email\n");

        fclose($file);

        return $result;
    }

    public function clear()
    {
        $file = fopen($this->filename, 'w');

        fclose($file);
    } 
}