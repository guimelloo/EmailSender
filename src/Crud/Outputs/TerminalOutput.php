<?php 
namespace EmailSender\Crud\Outputs;

class TerminalOutput implements Output
{
    public function output(): ?string
    {
        $message = "\nThanks to being looking to my codes, I apreciate your time here!"; 
        
        echo $message;

        return $message;
    }
} 