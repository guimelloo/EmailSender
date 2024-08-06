<?php 
namespace Tests;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use EmailSender\Crud\Outputs\EmailOutput;
use EmailSender\Crud\Writer\WriteFile;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    public function test_if_create_user_is_true() 
    {
        $createUser = new Create($this->createInputMock(), $this->createWriterMock(), $this->createOutputMock());

        $this->assertSame($createUser->run(), true);
    }

    public function test_if_create_user_is_false() 
    {
        $createUser = new Create($this->createInputMock(), $this->createWriterMock(), $this->createOutputMock());

        $this->assertNotSame($createUser->run(), false);
    }

    public function test_if_user_is_added_in_file()
    {
        $createUser = new Create($this->createInputMock(), $this->createWriterMock(), $this->createOutputMock());

        $content = file_get_contents(__DIR__.'/database.txt');

        $this->assertNotSame($createUser->run(), strpos($content,'negromonteguilherme@gmail.com'));
    }

    private function createOutputMock()
    {
        $mock = $this->getMockBuilder(EmailOutput::class)->getMock();

        return $mock;
    }

    private function createWriterMock()
    {
        $mock = $this->getMockBuilder(WriteFile::class)->getMock();

        return $mock;
    }

    private function createInputMock()
    {
        $mock = $this
        ->getMockBuilder(TerminalInput::class)
        ->getMock();

        $mock->method('read')->willReturn('negromonteguilherme@gmail.com');

        return $mock;
    }
}