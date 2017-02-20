<?php
namespace mirolabs\dotpay\client\payment\services\request;

use mirolabs\dotpay\client\payment\services\NotificationRequest;
use mirolabs\dotpay\client\payment\services\RequestParam;

class CurrentVersion implements NotificationRequest
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
            ->setChannelCountry($this->requestParam->getPostParam('channel_country'))
            ->setContactEmail($this->requestParam->getPostParam('p_email'))
            ->setControl($this->requestParam->getPostParam('control'))
            ->setDescription($this->requestParam->getPostParam('description'))
            ->setEmail($this->requestParam->getPostParam('email'))
            ->setInfo($this->requestParam->getPostParam('p_info'))
            ->setOperationAmount($this->requestParam->getPostParam('operation_amount'))
            ->setOperationCommissionAmount($this->requestParam->getPostParam('operation_commission_amount'))
            ->setOperationCurrency($this->requestParam->getPostParam('operation_currency'))
            ->setOperationDateTime($this->requestParam->getDateTime('operation_datetime'))
            ->setOperationNumber($this->requestParam->getPostParam('operation_number'))
            ->setOperationOriginalAmount($this->requestParam->getPostParam('operation_original_amount'))
            ->setOperationOriginalCurrency($this->requestParam->getPostParam('operation_original_currency'))
            ->setOperationRelatedNumber($this->requestParam->getPostParam('operation_related_number'))
            ->setOperationStatus($this->requestParam->getPostParam('operation_status'))
            ->setOperationType($this->requestParam->getPostParam('operation_type'))
            ->setOperationWithdrawalAmount($this->requestParam->getPostParam('operation_withdrawal_amount'))
            ->setGeoIpCountry($this->requestParam->getPostParam('geoip_country'))
            ->setSignature($this->requestParam->getPostParam('signature'));
    }




    /**
     * @param Notice $notice
     * @param string $pin
     * @return boolean
     */
    public function verifySignature(Notice $notice, $pin)
    {
        $control = $pin;
        $control.= $notice->getId();
        $control.= $notice->getOperationNumber();
        $control.= $notice->getOperationType();
        $control.= $notice->getOperationStatus();
        $control.= $notice->getOperationAmount();
        $control.= $notice->getOperationCurrency();
        $control.= $notice->getOperationWithdrawalAmount();
        $control.= $notice->getOperationCommissionAmount();
        $control.= $notice->getOperationOriginalAmount();
        $control.= $notice->getOperationOriginalCurrency();
        $control.= $notice->getOperationDateTime()->format('Y-m-d H:i:s');
        $control.= $notice->getOperationRelatedNumber();
        $control.= $notice->getControl();
        $control.= $notice->getDescription();
        $control.= $notice->getEmail();
        $control.= $notice->getInfo();
        $control.= $notice->getContactEmail();
        $control.= $notice->getChannel();
        $control.= $notice->getChannelCountry();
        $control.= $notice->getGeoIpCountry();
        return $notice->getSignature() === hash('sha256', $control);
    }
    
}
