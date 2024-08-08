<?php
namespace EmailSender\Message;

use Twilio\Rest\Client;

class Sms implements Message
{
    public function run(string $reciver)
    {
        $this->config($reciver);
    }

    public function settings()
    {
        $sid = '';
        $token = '';
        $client = new Client($sid, $token);

        return $client;
    }

    public function config(string $reciver)
    {
        $this->settings()->messages->create(
            $reciver,
            [
                'from' => '',
                
                'body' => 'Messagem teste'
            ]
        );
    }
}
