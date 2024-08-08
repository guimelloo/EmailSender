<?php
namespace Tests;

use EmailSender\Crud\DataBase\WriteFile;
use PHPUnit\Framework\TestCase;

class WriteTest extends TestCase
{
    private WriteFile $database;

    public function setUp(): void
    {
        $this->database = new WriteFile(__DIR__ . '/db.txt');

        $this->database->clear();
    }

    public function test_if_is_write_is_writing()
    {
        $this->assertSame(true, $this->database->write('negromonteguilherme@gmail.com'));
    }

    public function test_if_clear_is_cleaning()
    {
        $this->database->write('negromonteguilherme@gmail.com'); 

        $this->database->clear();

        $this->assertSame('', $this->database->get());
    }

    public function test_get_is_string()
    {
        $this->assertIsString($this->database->get());
    }
}