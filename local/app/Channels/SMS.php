<?php

namespace Responsive\Channels;

use Responsive\Contracts\SMSProviderContract;

class SMS extends AbstractChannel
{
    /**
     * SMS constructor.
     *
     * @param SMSProviderContract $service
     */
    public function __construct(SMSProviderContract $service)
    {
        $this->service = $service;
    }

    /**
     * Send SMS message.
     *
     * @param $phone
     * @param $message
     *
     * @return void
     */
    public function send($phone, $message)
    {
        $this->service->send($phone, $message);
    }
}
