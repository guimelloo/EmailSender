<?php
require 'vendor/autoload.php';

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use EmailSender\Crud\Outputs\TerminalOutput;
use EmailSender\Crud\Sender\EmailSend;
use EmailSender\Crud\DataBase\WriteFile;

$crud = new Create(new TerminalInput, new WriteFile(__DIR__ . '/database.txt'), new EmailSend, new TerminalOutput());

$crud->run();

