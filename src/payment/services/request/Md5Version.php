<?php
namespace mirolabs\dotpay\client\payment\services\request;

use mirolabs\dotpay\client\payment\services\NotificationRequest;
use mirolabs\dotpay\client\payment\services\RequestParam;
use mirolabs\dotpay\client\payment\model\Notice;

class Md5Version implements NotificationRequest
{

    /**
     * @var RequestParam
     */
    private $requestParam;

    /**
     * @param RequestParam $requestParam
     */
    public function __construct(RequestParam $requestParam)
    {
        $this->requestParam = $requestParam;
    }


    /**
     * @return Notice
     */
    public function takeNotification() {
        $notice = new Notice();
        return $notice
            ->setId($this->requestParam->getPostParam('id'))
            ->setChannel($this->requestParam->getPostParam('channel'))
            ->setContactEmail($this->requestParam->getPostParam('p_email'))
            ->setControl($this->requestParam->getPostParam('control'))
            ->setDescription($this->requestParam->getPostParam('description'))
            ->setEmail($this->requestParam->getPostParam('email'))
            ->setInfo($this->requestParam->getPostParam('p_info'))
            ->setOperationAmount($this->requestParam->getPostParam('amount'))
            ->setOperationDateTime($this->requestParam->getDateTime('operation_datetime'))
            ->setOperationNumber($this->requestParam->getPostParam('t_id'))
            ->setOperationOriginalAmount($this->requestParam->getPostParam('original_amount'))
            ->setOperationStatus($this->requestParam->getPostParam('t_status'))
            ->setSignature($this->requestParam->getPostParam('md5'));
    }


    private function verifySignature(Notice $notice, $pin) {
        $control = [
            $pin,$notice->getId(),$notice->getControl(),$notice->getOperationNumber(),$notice->getOperationAmount(),
            $notice->getEmail(),'','','', '',$notice->getOperationStatus()];
        $sign = implode(":", $control);
        return $notice->getSignature() === md5($sign);
    }
}