<?php
namespace mirolabs\dotpay\client\payment\services;

class RequestParam
{

    /**
     * @return \DateTime
     */
    public function getDateTime($key)
    {
        return new \DateTime($this->getPostParam($key));
    }



    public function getPostParam($key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        return null;
    }
}