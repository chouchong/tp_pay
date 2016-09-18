<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\pay\index.html";i:1470202595;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\public\style.html";i:1470027234;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>订单支付</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

</head>

<body style="background-color: #f0f0f0;">
  <div class="pay_desc">
    <p class="pd_time"><?php echo $order['go_time']; ?></p>
    <p class="pd_t">始发地：<?php echo $order->areaFrom->name; ?></p>
    <p class="pd_t">目的地：<?php echo $order->areaTo->name; ?></p>
    <p class="pd_t">车辆要求：<?php echo $order->brand->name; ?></p>
    <p class="pd_t">约车人信息：<?php echo $order['name']; ?> <?php echo $order['phone']; ?></p>
    <!-- <hr> -->
    <p class="pd_to">总计 ￥<?php echo $order->price->price; ?>，需要在线支付<?php echo $order['prepay']; ?>作为订金，剩下部分请当面结算给车主</p>
  </div>
  <div class="pay_way">
    <div class="paywitem">
      <img src="/mobile/img/wxpay.png" alt="">
      <span class="pw_t">微信支付</span>
      <span class="fa fa-check"></span>
    </div>
  </div>
  <div class="pay_btn">
    <p>￥<?php echo $order['prepay']; ?></p>
    <button type="button" onclick="callpay()">确认支付</button>
  </div>
</body>
<script type="text/javascript">
    //调用微信JS api 支付
    function onBridgeReady() {
      $.ajax({
        type: "POST",
        url: '<?php echo url("Mobile/Pay/wxPay"); ?>',
        dataType: 'json',
        cache: false,
        data:{id:<?php echo $order['id']; ?>,prepay:<?php echo $order['prepay']; ?>},
        success: function(data) {
          WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            data,
            function (res) {
              if (res.err_msg == "get_brand_wcpay_request:ok") {
                window.location.href='<?php echo url("mobile/Member/book"); ?>';
              }
              if (res.err_msg == "get_brand_wcpay_request:cancel") {
                layer.msg('取消支付');
              }
            }
          );
        },
        error: function(xhr, status, error) {
            console.log('系统错误');
        }
      });
    }
    function callpay() {
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
            }
        } else {
            onBridgeReady();
        }
    }
</script>
</html>
