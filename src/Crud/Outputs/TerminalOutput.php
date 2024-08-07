<?php 
namespace EmailSender\Crud\Outputs;

class TerminalOutput implements Output
{
    public function output(): string|null
    {
        $url = "https://github.com/guimelloo";

        return shell_exec("start chrome $url");
    }
} 