#dotpay-client

> notification

``` 
$dotpay = new \mirolabs\dotpay\client\payment\DotPay('pin', 'current');
$dotpay->setNotificationObjects([$notificationClass]);
$dotpay->receivedNotice();
```

> admin
```
use mirolabs\dotpay\client\admin\Configuration;
use mirolabs\dotpay\client\admin\Accounts;

$config = new Configuration(login, password);    
$accounts = new Accounts($config);
$accounts->getAccounts();
```