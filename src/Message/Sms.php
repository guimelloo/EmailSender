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
        $sid = 'AC85c52a746711715884bbf2f64864b423';
        $token = '35cd37e65d220c2361890ca5a9e61f27';
        $client = new Client($sid, $token);

        return $client;
    }

    public function config(string $reciver)
    {
        $this->settings()->messages->create(
            $reciver,
            [
                'from' => '+31685013132',
                
                'body' => 'Messagem teste'
            ]
        );
    }
}
