<?php
namespace Tests;

use EmailSender\Crud\DataBase\WriteFile;
use PHPUnit\Framework\TestCase;

class WriteTest extends TestCase
{
    private string $filename;

    public function setUp(): void
    {
        $this->filename = __DIR__ . '/database_file.txt';
    }

    public function tearDown(): void
    {
        unlink($this->filename);
    }

    public function test_file_database_is_writing()
    {
        $database = new WriteFile($this->filename);
        
        $database->write('negromonteguilherme@gmail.com');

        $this->assertEquals("negromonteguilherme@gmail.com\n", file_get_contents($this->filename));
    }

    public function test_file_database_is_cleaning()
    {
        $database = new WriteFile($this->filename);
        
        $database->write('negromonteguilherme@gmail.com');

        dd(file_get_contents($this->filename));
        $database->clear();

        $this->assertEquals('', file_get_contents($this->filename));
    }

    public function test_file_database_is_string()
    {
        $database = new WriteFile($this->filename);

        $database->write('negromonteguilherme@gmail.com');

        $this->assertSame("negromonteguilherme@gmail.com\n", $database->get());
    }
}