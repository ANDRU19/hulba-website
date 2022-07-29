<?php

namespace App\Services;

use App\Contracts\SmsServiceInterface;
use Twilio\Rest\Client;

class SmsService implements SmsServiceInterface
{
    protected $client;

    public function __construct()
    {
        $sid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $token = config('app.twilio')['TWILIO_AUTH_TOKEN'];

        $this->client = new Client($sid, $token);
    }

    public function settings(array $settings) :void 
    {

    }

    public function send(string $phone, string $message) :void
    {
        $this->client->messages->create($phone, [
            'from' => '19377453506',
            'body' => $message
        ]);
    }

}