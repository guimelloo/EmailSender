<?php 
namespace Tests;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use EmailSender\Crud\Sender\Email;
use EmailSender\Crud\Outputs\TerminalOutput;
use EmailSender\Crud\DataBase\WriteFile;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    private WriteFile $database;

    public function setUp(): void
    {
        $this->database = new WriteFile(__DIR__ . '/db.txt');

        $this->database->clear();
    }

    // public function test_if_create_user_is_true() 
    // {
    //     $createUser = new Create($this->createInputMock(), $this->createWriterMock(), $this->createOutputMock());

    //     $this->assertSame($createUser->run(), true);
    // }
    

    // public function test_if_create_user_is_false() 
    // {
    //     $createUser = new Create($this->createInputMock(), $this->createWriterMock(), $this->createOutputMock());

    //     $this->assertNotSame($createUser->run(), false);
    // }


    public function test_if_user_was_added_in_database()
    {
        $createUser = new Create(
            $this->createInputMock('negromonteguilherme@gmail.com'),
            $this->database,
            $this->createEmailMock(),
            $this->createOutputMock("foi"),
        );

        $createUser->run();

        $content = $this->database->get();

        $this->assertSame("negromonteguilherme@gmail.com\n", $content);
    }

    
    public function test_user_can_not_be_added_if_it_exists()
    {
        $this->database->write('negromonteguilherme@gmail.com');

        $createUser = new Create(
            $this->createInputMock('negromonteguilherme@gmail.com'),
            $this->database,
            $this->createEmailMock(),
            $this->createOutputMock("foi"),
        );

        $this->expectException(\Exception::class);

        $this->expectExceptionMessage('error, user already exists');

        $createUser->run();
    }

    private function createEmailMock()
    {
        $mock = $this->getMockBuilder(Email::class)->getMock();

        return $mock;
    }

    private function createOutputMock($return)
    {
        $mock = $this->getMockBuilder(TerminalOutput::class)
            // ->setConstructorArgs(['aaa'])
            ->getMock();

        $mock->method('output')->willReturn($return);

        return $mock;
    }

    private function createWriterMock()
    {
        $mock = $this->getMockBuilder(WriteFile::class)->getMock();

        return $mock;
    }

    private function createInputMock(string $return)
    {
        $mock = $this
            ->getMockBuilder(TerminalInput::class)
            ->getMock();

        $mock->method('read')->willReturn($return);

        return $mock;
    }
}