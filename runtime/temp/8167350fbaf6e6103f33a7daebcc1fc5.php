<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\member\register.html";i:1469787492;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\public\style.html";i:1470027234;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn" style="overflow: visible;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>会员-注册</title>
    <script src="/mobile/js/jquery.min.js"></script>
<script src="/mobile/js/script.js"></script>
<link rel="stylesheet" href="/mobile/css/font-awesome.min.css">
<link rel="stylesheet" href="/mobile/css/custom.css">
<script src="/mobile/layer/layer.js"></script>
<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>
<script src="/assets/vue/vue-resource.js"></script>

    <link rel="stylesheet" type="text/css" href="/mobile/css/ionic.min.css">
    <style type="text/css" media="screen">
    .item-input{
      border: 0;
      border-bottom: 1px solid #ddd;
    }
    .sendyzm {
        border-radius: 0;
        height: 47px;
        background: #FDAA4F;
        text-align: center;
        color: #fff;
        line-height: 40px;
        width: 100px;
        border: 1px;
    }
    </style>
</head>

<body id="register">
    <div class="content has-header" style="overflow: scroll;">
        <validator name="registerValidation">
        <div class="list list-inset" style="width:60%;float:left;">
            <label class="item item-input">
                <i class="icon ion-iphone placeholder-icon"></i>
                <input type="text" placeholder="手机号" v-validate:phone="{ required: true}" v-model="user.phone">
            </label>
        </div>
        <button class="sendyzm list list-inset" @click="sendyzm()">
            <span id="sendyzm_s" v-text="sms"></span>
        </button >
        <div style="clear:both;"></div>
        <div class="list list-inset" style="width:60%;float:left;">
            <label class="item item-input">
                <i class="icon ion-closed-captioning placeholder-icon"></i>
                <input type="text" name="code" placeholder="验证码" v-validate:code="{ required: true}" v-model="user.code">
            </label>
        </div>
        <div id="sendyzmimg" class="list list-inset">
            <img id="verify_img" src="<?php echo captcha_src(); ?>" alt="验证码" @click="refreshVerify()">
        </div>
        <div style="clear:both;"></div>
        <div class="list list-inset">
            <label class="item item-input">
                <i class="icon ion-ios-email-outline placeholder-icon"></i>
                <input type="text" name="codesms" placeholder="短信验证码" v-validate:codesms="{ required: true}" v-model="user.codesms"/>
            </label>
        </div>
        <div style="clear:both;"></div>
        <div class="list list-inset">
            <label class="item item-input">
                <i class="icon ion-android-lock placeholder-icon"></i>
                <input type="password" name="password" placeholder="密码" v-validate:password="{ required: true, minlength:6, maxlength:12 }" v-model="user.password">
            </label>
        </div>
        <div class="form_msg" v-if="msg">
            <span>{{msg}}</span>
        </div>
        <div id="btn_login" class="padding">
            <button class="button button-block" :disabled="$registerValidation.invalid" @click="addMember()">注 册</button>
        </div>
    </validator>
    </div>
</body>
<script>
    'use strict';
    var vn = new Vue({
        el: '#register',
        data: {
            user: {},
            msg:'',
            sms:'获取验证码',
            s:false,
        },
        methods: {
            refreshVerify: function(){
                var ts = Date.parse(new Date())/1000;
                $('#verify_img').attr("src", "/captcha?id="+ts);
            },
            sendyzm: function () {
                if(this.validation() != false){
                    if(this.s == false){
                        $.ajax({
                            type: "POST",
                            url: '<?php echo url("mobile/sms/send"); ?>',
                            dataType: 'json',
                            cache: false,
                            data: {phone:this.user.phone},
                            success: function(data) {
                                if(data.status == 0){
                                    var t = 60;
                                    var time = setInterval(function() {
                                        if (t > 0) {
                                            $('.sendyzm').css('background','#c9c9ce');
                                            vn.$set('sms',(t--)+'后重发');
                                            vn.$set('s',true);
                                        } else {
                                            window.clearInterval(time);
                                            $('.sendyzm').css('background','#676BE5');
                                            vn.$set('sms','重发验证码');
                                            vn.$set('s',false);
                                        }
                                    }, 1000);
                                }else{
                                    layer.msg(data.msg);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log('系统错误')
                            }
                        });
                    }
                }else{
                    layer.msg('手机号码错误');
                }

            },
            validation: function() {
                return /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/.test(this.user.phone)
            },
            addMember: function(){
                $.ajax({
                    type: "POST",
                    url: '<?php echo url("mobile/Member/add"); ?>',
                    dataType: 'json',
                    cache: false,
                    data: this.user,
                    success: function(data) {
                        layer.msg('注册成功');
                        window.location.href = '<?php echo url("mobile/base/login"); ?>';
                    },
                    error: function(xhr, status, error) {
                        console.log('系统错误')
                    }
                });
            }
        }
    })
</script>
</html>
