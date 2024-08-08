<?php
namespace EmailSender\Crud\Database;

interface DB
{
    public function get();
    
    public function write($b): bool;

    public function clear();
}