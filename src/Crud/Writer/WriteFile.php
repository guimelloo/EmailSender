<?php
namespace EmailSender\Crud\Writer;

use EmailSender\Crud\Writer\Write;

class WriteFile implements Write
{
    public function write($myfile, $email) :bool
    {
        return fwrite($myfile, "$email\n");
    }
}