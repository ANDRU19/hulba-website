<?php

namespace App\Contracts;

Interface SmsServiceInterface
{
    public function settings(array $settings) :void;

    public function send(string $phone, string $message) :void;
}