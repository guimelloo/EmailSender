<?php
namespace EmailSender\Crud\DataBase;

interface DB
{
    public function get();
    
    public function write($b): bool;

    public function clear();
}