<?php
//银联支付操作类
namespace unionPay;

use unionpay\sdk\SDKConfig;
use unionpay\sdk\LogUtil;
use unionpay\sdk\PhpLog;
use unionpay\sdk\CertUtil;
use unionpay\sdk\AcpService;

class UnionPay{

    public function pay($data){

        $params = array(

            //以下信息非特殊情况不需要改动
            'version' => '5.0.0',                 //版本号
            'encoding' => 'utf-8',                //编码方式
            'txnType' => '01',                    //交易类型
            'txnSubType' => '01',                 //交易子类
            'bizType' => '000201',                //业务类型
            'frontUrl'=> 'http://'.$_SERVER['HTTP_HOST'].'/mobile/pay/FrontReceive.html',  //前台通知地址
            'backUrl' => 'http://'.$_SERVER['HTTP_HOST'].'/mobile/pay/BackReceive.html',    //后台通知地址
            'signMethod' => '01',                 //签名方法
            'channelType' => '08',                //渠道类型，07-PC，08-手机
            'accessType' => '0',                  //接入类型
            'currencyCode' => '156',              //交易币种，境内商户固定156

            //TODO 以下信息需要填写
            'merId' => SDKConfig::MER_ID,   //商户代码，请改自己的测试商户号，此处默认取demo演示页面传递的参数
            'orderId' => $data["orderId"], //商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
            'txnTime' => date('YmdHis'), //订单发送时间，格式为YYYYMMDDhhmmss，取北京时间，此处默认取demo演示页面传递的参数
            'txnAmt' => $data["txnAmt"],   //交易金额，单位分，此处默认取demo演示页面传递的参数
            //      'reqReserved' =>'透传信息',        //请求方保留域，透传字段，查询、通知、对账文件中均会原样出现，如有需要请启用并修改自己希望透传的数据

            //TODO 其他特殊用法请查看 special_use_purchase.php
        );

        AcpService::sign ( $params );
        $uri = SDKConfig::SDK_FRONT_TRANS_URL;
        $html_form = AcpService::createAutoFormHtml( $params, $uri );
        echo $html_form;

    }
    public function CheckData($result){

        if(AcpService::validate($result)){
            return true;
        }else{
            return false;
        }

    }

}
