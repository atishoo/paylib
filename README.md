# paylib
自己使用过的支付接口合集

###### 下面是一些简单的使用说明
## 支付宝使用说明

1. 引入命名空间
```php
use Atipay\alipay\Alipay;
```

2. 调用方法体
```php
$config = ['partner'=>'商户号','private_key'=>'私钥','public_key'=>'公钥','input_charset'=>'字符集','sign_type'=>'签名类型','service','cacert','transport'];
$alipay = new Alipay($config);
```

3. 创建订单并签名

    ```php
    $data = array(
        'notify_url'=>'"'.'这里写通知地址'.'"',
        'out_trade_no'=>'"'.'订单编号'.'"',
        'subject'=>'"'.'订单标题'.'"',
        'total_fee'=>'"'.'总金额，单位元'.'"',
        'body'=>'"'.'订单描述'.'"',
        'it_b_pay'=>'"'.'过期时间'.'m"'
        );

    // 将post接收到的数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串。
    $data = $alipay->createLinkstring($data);

    // 将待签名字符串使用私钥签名,且做urlencode. 注意：请求到支付宝只需要做一次urlencode.
    $rsa_sign = urlencode($alipay->rsaSign($data));

    // 把签名得到的sign和签名类型sign_type拼接在待签名字符串后面。
    $data = $data.'&sign='.'"'.$rsa_sign.'"'.'&sign_type='.'"'.alipay_sign_type.'"';
    ```

## 微信支付使用说明

1. 引入命名空间
```php
use Atipay\wxpay\WxPayUnifiedOrder;
```

2. 实例化数据对象
```php
$wxdata = new WxPayUnifiedOrder();
```
