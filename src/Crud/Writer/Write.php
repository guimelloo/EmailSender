<?php
namespace EmailSender\Crud\Writer;

interface Write
{
    public function write($a, $b): bool;
}