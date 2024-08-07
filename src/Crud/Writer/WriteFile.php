<?php
namespace EmailSender\Crud\Writer;

use EmailSender\Crud\Writer\Write;

class WriteFile implements Database
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

    public function unWrite($email)
    {
        $content = file_get_contents($this->filename);

        $modifiedContent = str_replace($email, '', $content);

        file_put_contents($this->filename, $modifiedContent);
    }

    public function clear()
    {
        $file = fopen($this->filename, 'w');

        ftruncate($file, 0);

        fclose($file);
    }
}