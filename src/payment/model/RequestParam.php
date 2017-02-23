<?php
namespace mirolabs\dotpay\client\payment\model;
use JMS\Serializer\Annotation as JMS;

class RequestParam
{
    const CH_CREDIT_CARD = 'K';
    const CH_FAST_TRANSFER = 'T';
    const CH_TRANSFER_ONLINE = 'P';
    const CH_CASH = 'G';
    const CH_WALLET_AND_VOUCHER = 'W';
    const CH_INSTALLMENT = 'R';
    const CH_OTHER = 'I';
    const CH_PAYMENT_DELAYED = 'O';


    const RETURN_TYPE_BUTTON = 0;
    const RETURN_TYPE_POST = 1;
    const RETURN_TYPE_NOTHING = 2;
    const RETURN_TYPE_BUTTON_AND_POST = 3;
    const RETURN_TYPE_DIRECT_REDIRECT = 4;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("api_version")
     */
    private $apiVersion = 'dev';

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $amount;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $currency;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $lang;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $channel;


    /**
     * @var boolean
     * @JMS\Type("boolean")
     * @JMS\SerializedName("ch_lock")
     */
    private $channelLock;


    /**
     * @var array
     * @JMS\Type("string")
     * @JMS\SerializedName("channel_groups")
     * @JMS\Accessor(getter="getChannelGroupsString",setter="setChannelGroupsString")
     */
    private $channelGroups;


    /**
     * return address
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("URL")
     */
    private $url;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $type;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("buttontext")
     */
    private $buttonText;

    /**
     * address for noticication
     *
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("URLC")
     */
    private $urlc;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $control;


    /**
     * @var string
     * @JMS\Type("string")
     */
    private $firstname;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $lastname;


    /**
     * @var string
     * @JMS\Type("string")
     */
    private $email;


    /**
     * @var string
     * @JMS\Type("string")
     */
    private $street;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("street_n1")
     */
    private $house;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("street_n2")
     */
    private $flat;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $state;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $addr3;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $city;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $postcode;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $phone;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $country;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("p_info")
     */
    private $info;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("p_email")
     */
    private $contactEmail;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("blik_code")
     */
    private $blikCode;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("blik_code")
     */
    private $blikCode;


    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("personal_data")
     */
    private $personalData;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("bylaw")
     */
    private $bylaw;

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("chk")
     */
    private $check;


    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function getChannel()
    {
        return $this->channel;
    }

    public function getChannelLock()
    {
        return $this->channelLock;
    }

    public function getChannelGroups()
    {
        return $this->channelGroups;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getButtonText()
    {
        return $this->buttonText;
    }

    public function getUrlc()
    {
        return $this->urlc;
    }

    public function getControl()
    {
        return $this->control;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getHouse()
    {
        return $this->house;
    }

    public function getFlat()
    {
        return $this->flat;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getAddr3()
    {
        return $this->addr3;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    public function getBlikCode()
    {
        return $this->blikCode;
    }

    public function getCheck()
    {
        return $this->check;
    }

    public function setApiVersion($apiVersion)
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
        return $this;
    }

    public function setChannelLock($channelLock)
    {
        $this->channelLock = $channelLock;
        return $this;
    }

    public function setChannelGroups(array $channelGroups)
    {
        foreach ($channelGroups as $group) {
            if (!in_array($group, self::getAvailableChanellGroups())) {
                throw new Exception('Invalid channel group');
            }
        }

        $this->channelGroups = $channelGroups;
        return $this;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function setType($type)
    {
        if (!in_array($type, self::getAvailableReturnType())) {
            throw new Exception('Invalid return type');
        }
        $this->type = $type;
        return $this;
    }

    public function setButtonText($buttonText)
    {
        $this->buttonText = $buttonText;
        return $this;
    }

    public function setUrlc($urlc)
    {
        $this->urlc = $urlc;
        return $this;
    }

    public function setControl($control)
    {
        $this->control = $control;
        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    public function setHouse($house)
    {
        $this->house = $house;
        return $this;
    }

    public function setFlat($flat)
    {
        $this->flat = $flat;
        return $this;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function setAddr3($addr3)
    {
        $this->addr3 = $addr3;
        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }

    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

    public function setBlikCode($blikCode)
    {
        $this->blikCode = $blikCode;
        return $this;
    }

    function getPersonalData()
    {
        return $this->personalData;
    }

    function getBylaw()
    {
        return $this->bylaw;
    }

    function setPersonalData($personalData)
    {
        $this->personalData = $personalData;
    }

    function setBylaw($bylaw)
    {
        $this->bylaw = $bylaw;
    }

    



    public function getChannelGroupsString()
    {
        if (is_array($this->channelGroups)) {
            return implode(',', $this->channelGroups);
        }
        return null;
    }

    /**
     * @param type $groups
     */
    public function setChannelGroupsString($groups)
    {
        if (!empty($groups)) {
            $this->setChannelGroups(explode(',', $groups));
        }
    }



    public function setCheck($check)
    {
        $this->check = $check;
        return $this;
    }


    public static function getAvailableChanellGroups()
    {
        return [
            self::CH_CREDIT_CARD,
            self::CH_FAST_TRANSFER,
            self::CH_TRANSFER_ONLINE,
            self::CH_CASH,
            self::CH_WALLET_AND_VOUCHER,
            self::CH_INSTALLMENT,
            self::CH_OTHER,
            self::CH_PAYMENT_DELAYED
        ];
    }

    public static function getAvailableReturnType()
    {
        return [
            self::RETURN_TYPE_BUTTON,
            self::RETURN_TYPE_BUTTON_AND_POST,
            self::RETURN_TYPE_DIRECT_REDIRECT,
            self::RETURN_TYPE_NOTHING,
            self::RETURN_TYPE_DIRECT_REDIRECT
        ];
    }
}