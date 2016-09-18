<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\auth\login.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\style.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\script.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\modal.html";i:1469761909;}*/ ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->

<head>
    <meta charset="utf-8" />
    <title>管理员登录</title>
    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
<link id="bootstrap-rtl-link" href="" rel="stylesheet" />
<link href="/assets/css/font-awesome.min.css" rel="stylesheet" />
<link href="/assets/css/weather-icons.min.css" rel="stylesheet" />

<!--Fonts-->
<!-- <link href="http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css"> -->

<!--Beyond styles-->
<link id="beyond-link" href="/assets/css/beyond.min.css" rel="stylesheet" />
<link href="/assets/css/demo.min.css" rel="stylesheet" />
<link href="/assets/css/typicons.min.css" rel="stylesheet" />
<link href="/assets/css/animate.min.css" rel="stylesheet" />
<link id="skin-link" href="" rel="stylesheet" type="text/css" />

<!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
<script src="/assets/js/skins.min.js"></script>
<script src="/assets/js/jquery-2.0.3.min.js"></script>
<script src="/assets/js/bootbox/bootbox.js"></script>

</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown" id="authLogin">
        <validator name="signinValidation">
        <form novalidate>
          <div class="loginbox bg-white" style="height: 250px!important;">
            <div class="loginbox-title">登录</div>
            <div class="loginbox-social">
                <div class="social-title ">联系你的社交账户</div>
            </div>
            <div class="loginbox-textbox">
                <input type="text"
                v-validate:usernameLogin="{ required: true}"
                class="form-control"
                placeholder="用户名"
                v-model="user.usernamelogin">
            </div>
            <div class="loginbox-textbox">
                <input type="password" v-model="user.password"
                v-validate:password="{ required: true }"
                class="form-control"
                placeholder="密码"/>
            </div>
            <div class="loginbox-submit">
            <button type="button" @click="doLogin()" class="btn btn-primary btn-block" :disabled="$signinValidation.invalid">登录</button>
            </div>
        </div>
        </form>
      </validator>
        <div class="logobox" v-if="msg"><p style="color: red;line-height: 40px;
    text-align: center;">{{msg}}</p></div>
    </div>
    <!--Basic Scripts-->
    <!--Basic Scripts-->
<script src="/assets/js/bootstrap.min.js"></script>

<!--Beyond Scripts-->
<script src="/assets/js/beyond.js"></script>


<!--Page Related Scripts-->
<!--Sparkline Charts Needed Scripts-->
<script src="/assets/js/charts/sparkline/jquery.sparkline.js"></script>
<script src="/assets/js/charts/sparkline/sparkline-init.js"></script>

<!--Easy Pie Charts Needed Scripts-->
<script src="/assets/js/charts/easypiechart/jquery.easypiechart.js"></script>
<script src="/assets/js/charts/easypiechart/easypiechart-init.js"></script>

<!-- Flot Charts Needed Scripts -->
<script src="/assets/js/charts/flot/jquery.flot.js"></script>
<script src="/assets/js/charts/flot/jquery.flot.resize.js"></script>
<script src="/assets/js/charts/flot/jquery.flot.pie.js"></script>
<script src="/assets/js/charts/flot/jquery.flot.tooltip.js"></script>
<script src="/assets/js/charts/flot/jquery.flot.orderBars.js"></script>

<!-- Vue -->
<script src="/assets/vue/vue.js"></script>
<script src="/assets/vue/vue-validator.js"></script>

<!-- alert -->
<script src="/assets/alert.js"></script>
    <!--Success Modal Templates-->
<div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title">Success</div>

            <div class="modal-body">You have done great!</div>
            <div class="modal-footer">
               <!--  <button type="button" class="btn btn-success" data-dismiss="modal">OK</button> -->
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Success Modal Templates-->
    <script>
        "use strict";
        var vm = new Vue({
          el: '#authLogin',
          data: {
            user: {},
            msg:''
          },
          methods: {
            doLogin: function () {
                $.ajax({
                    type: "POST",
                    url: '/admin/login.html',
                    dataType: 'json',
                    cache: false,
                    data: this.user,
                    success: function(data) {
                        if(data.status>0){
                            success({msg:"登陆成功",url:"<?php echo url('Admin/Index/index'); ?>"});
                        }else{
                            vm.$set('msg',data.msg)
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    }
                });
            }
          }
        })
    </script>
</body>
</html>
