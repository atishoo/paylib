<?php
use Atipay\alipay\Alipay;

/**
 * 支付宝支付demo
 */
class alipay
{

    public function getOrder()
    {
        $config = [];
        $alipay = new Alipay($config);
    }

}
