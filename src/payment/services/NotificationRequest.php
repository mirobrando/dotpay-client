<?php
namespace mirolabs\dotpay\client\payment\services;

use mirolabs\dotpay\client\payment\model\Notice;

interface NotificationRequest
{
    /**
     * @return Notice
     */
    public function takeNotification();

    /**
     * @param Notice $notice
     * @param string $pin
     * @return boolean
     */
    public function verifySignature(Notice $notice, $pin);

}