<?php

namespace mirolabs\dotpay\client\payment;

class DotPay
{
    /**
     * @var string
     */
    private $pin;

    /**
     * @var string
     */
    private $version;

    /**
     * @var Notification[]
     */
    private $observators = array();

    /**
     * @var services\NotificationRequest
     */
    private $notificationRequest;

    /**
     * @param string $pin
     */
    public function __construct($pin, $version = 'current')
    {
        $this->pin = $pin;
        $this->version = $version;
    }

    /**
     * @param array $notifcations
     */
    public function setNotificationObjects(array $notifcations)
    {
        $this->observators = array();
        array_walk($notifcations, function ($n) { $this->addNotificationObject($n); });
    }

    /**
     * @param \mirolabs\dotpay\client\payment\Notification $notification
     */
    public function addNotificationObject(Notification $notification)
    {
        $this->observators[] = $notification;
    }

    /**
     * proccessing notification from dotpay.pl
     */
    public function receivedNotice()
    {
        try {
            $notice = $this->getNotificationRequest()->takeNotification();
            if (!$this->getNotificationRequest()->verifySignature($notice, $this->pin)) {
                throw new \Exception('Invalid notification');
            }
            array_walk($this->observators,
                function (Notification $n) use ($notice) {
                $n->callNotification($notice);
            });
            return 'OK';
        } catch (\Exception $e) {
            return 'ERROR';
        }
    }

    public function addCheckControlToRequest(model\RequestParam $request)
    {
        $check = $this->pin;
        $check.= $request->getApiVersion();
        $check.= $request->getLang();
        $check.= $request->getId();
        $check.= $request->getAmount();
        $check.= $request->getCurrency();
        $check.= $request->getDescription();
        $check.= $request->getControl();
        $check.= $request->getChannel();
        $check.= $request->getChannelLock();
        $check.= $request->getChannelGroupsString();
        $check.= $request->getUrl();
        $check.= $request->getType();
        $check.= $request->getButtonText();
        $check.= $request->getUrlc();
        $check.= $request->getFirstname();
        $check.= $request->getLastname();
        $check.= $request->getEmail();
        $check.= $request->getStreet();
        $check.= $request->getHouse();
        $check.= $request->getFlat();
        $check.= $request->getState();
        $check.= $request->getAddr3();
        $check.= $request->getCity();
        $check.= $request->getPostcode();
        $check.= $request->getCountry();
        $check.= $request->getInfo();
        $check.= $request->getContactEmail();
        $check.= $request->getBylaw();
        $check.= $request->getPersonalData();
        $check.= $request->getBlikCode();
        $request->setCheck(hash('sha256', $check));
    }

    /**
     * @return services\NotificationRequest
     */
    private function getNotificationRequest()
    {
        if (is_null($this->notificationRequest)) {
            $requestParam = new services\RequestParam();
            if (strtolower($this->version) == 'md5') {
                $this->notificationRequest = new services\request\Md5Version($requestParam);
            } else {
                $this->notificationRequest = new services\request\CurrentVersion($requestParam);
            }
        }
        return $this->notificationRequest;
    }
}