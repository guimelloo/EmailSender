<?php
namespace EmailSender\Crud\Writer;

interface Database
{
    public function get();
    
    public function write($b): bool;

    public function unWrite($b);

    public function clear();
}