<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\member\login.html";i:1470204333;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\public\style.html";i:1470027234;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn" style="overflow: visible;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>会员-登陆</title>
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
    </style>
</head>

<body id="login">
    <div class="content has-header" style="overflow: scroll;">
  <validator name="loginValidation">
      <div class="list list-inset">
        <label class="item item-input">
          <i class="icon ion-iphone placeholder-icon"></i>
          <input type="text" name="phone" placeholder="手机号" v-validate:phone="{ required: true,minlength:11,maxlength:11}" v-model="user.phone">
        </label>
      </div>
      <div class="list list-inset">
        <label class="item item-input">
          <i class="icon ion-android-lock placeholder-icon"></i>
          <input type="password" placeholder="密码" name="password" v-validate:password="{ required: true, minlength:6, maxlength:12 }" v-model="user.password">
        </label>
      </div>
      <div id="btn_login" class="padding">
        <button class="button button-block" :disabled="$loginValidation.invalid" @click="addLogin()">登陆</button>
      </div>
      <div class="login_lostreg">
          <a href="<?php echo url('mobile/base/psd'); ?>" title="">忘记密码</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?php echo url('mobile/base/register'); ?>" title="">注册账号</a>
      </div>
    </validator>
    </div>
</body>
<script>
   var vn = new Vue({
    el: '#login',
    data: {
        user: {}
    },
    methods: {
      addLogin: function(){
        $.ajax({
          type: "POST",
          url: '<?php echo url("mobile/member/login"); ?>',
          dataType: 'json',
          cache: false,
          data: this.user,
          success: function(data) {
              if(data.status > 0){
                if('<?php echo $url; ?>'!=''){
                  window.location.href = '<?php echo $url; ?>';
                }else{
                  layer.open({
                    btn: ['发布行程', '个人中心']
                    ,yes: function(index, layero){
                      window.location.href = '<?php echo url("mobile/car/index"); ?>'
                    },btn2: function(index, layero){
                      window.location.href = '<?php echo url("mobile/member/index"); ?>'
                    }
                  });
                }
              }else{
                  layer.msg(data.msg);
              }
          },
          error: function(xhr, status, error) {
              layer.msg('系统错误');
          }
        });
      },
    }
  })
</script>
</html>
