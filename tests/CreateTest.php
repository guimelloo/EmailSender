<?php 
namespace Tests;

use EmailSender\Crud\Create;
use EmailSender\Crud\Inputs\TerminalInput;
use PHPUnit\Framework\TestCase;

class CreateTest extends TestCase
{
    public function test_if_create_user_is_true() 
    {
        $inputMock = $this
            ->getMockBuilder(TerminalInput::class)
            ->getMock();

        $inputMock->method('read')->willReturn('negromonteguilherme@gmail.com');

        $createUser = new Create($inputMock);

        $this->assertSame($createUser->run(), true);
    }

    public function test_if_create_user_is_false() 
    {
        $inputMock = $this
            ->getMockBuilder(TerminalInput::class)
            ->getMock();

        $inputMock->method('read')->willReturn('negromonteguilherme@gmail.com');

        $createUser = new Create($inputMock);

        $this->assertNotSame($createUser->run(), false);
    }
}