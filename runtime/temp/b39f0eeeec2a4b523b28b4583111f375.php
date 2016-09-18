<?php if (!defined('THINK_PATH')) exit(); /*a:10:{s:73:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\car\edit.html";i:1469781355;s:74:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\base\base.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\style.html";i:1469761909;s:79:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\loading.html";i:1469761909;s:75:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\nav.html";i:1469761909;s:79:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\sidebar.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\upload\upload.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\script.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\modal.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\danger.html";i:1469761909;}*/ ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    
<style>
    .input-label{
        width:500px;
    }
    .zyupload {
        margin:0;
    }
    #zyupload{
        /*min-height: 1px;height: 1px;*/
    }

    .upload_preview {
        width: 657px;
    }
</style>

</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
    <div class="loading-progress">
        <div class="rotator">
            <div class="rotator">
                <div class="rotator colored">
                    <div class="rotator">
                        <div class="rotator colored">
                            <div class="rotator colored"></div>
                            <div class="rotator"></div>
                        </div>
                        <div class="rotator colored"></div>
                    </div>
                    <div class="rotator"></div>
                </div>
                <div class="rotator"></div>
            </div>
            <div class="rotator"></div>
        </div>
        <div class="rotator"></div>
    </div>
</div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/assets/img/logo.png" alt="" />
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->

            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/assets/img/avatars/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo $userInfo; ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <!--Avatar Area-->
                                <li class="edit">
                                    <a href="#" class="pull-right">用户设置</a>
                                </li>
                                <!--/Theme Selector Area-->
                                <li class="dropdown-footer" id="bootbox-confirm" style="cursor: pointer;">
                                    <a>
                                        退 出
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                    </ul>
                    <div class="setting">
                        <a id="btn-setting" title="Setting" href="#">
                            <i class="icon glyphicon glyphicon-cog"></i>
                        </a>
                    </div>
                    <div class="setting-container">
                        <label>
                            <a class="dropdown-footer"><span class="text" style="color: #fff;">退 出</span></a>
                        </label>
                    </div>
                    <!-- Settings -->
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<script>
    $(function(){
        "use strict";
        $(".dropdown-footer").on('click', function () {
            bootbox.confirm("是否确定退出", function (result) {
                if (result) {
                    $.ajax({
                        type: "POST",
                        url: '/admin/common/logout',
                        dataType: 'json',
                        cache: false,
                        success: function(data) {
                            if(data.status>0){
                                window.location.href = '/admin/login.html';
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                }
            });
        });
    })
</script>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input type="text" class="searchinput" />
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- 控制面板 -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <?php if(is_array($navBar) || $navBar instanceof \think\Collection): $i = 0; $__LIST__ = $navBar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li <?php if($pid2 == $vo['id']||$pid1 == $vo['id']): ?>class="open"<?php endif; if($uri == $vo['name']): ?>class="active"<?php endif; ?>>
            <a href='<?php if(!empty($vo["name"])): ?><?php echo url($vo["name"]); else: ?>#<?php endif; ?>' class="menu-dropdown">
                <i class="menu-icon <?php echo $vo['icon']; ?>"></i>
                <span class="menu-text"><?php echo $vo['title']; ?> </span>
                <i class="menu-expand"></i>
            </a>
            <?php if(isset($vo['sub']) && !empty($vo['sub'])): ?>
            <ul class="submenu">
                <?php if(is_array($vo['sub']) || $vo['sub'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li <?php if($uri == $v['name']||$pid1 == $v['id']): ?>class="active"<?php endif; ?>>
                    <a href="<?php echo url($v['name']); ?>">
                        <i class="menu-icon <?php echo $v['icon']; ?>"></i>
                        <span class="menu-text"> <?php echo $v['title']; ?> </span>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- /Sidebar Menu -->
</div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            
<div class="page-content" id="addCar">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">控制面板</a>
            </li>
            <li>
                <a href="#">车辆管理</a>
            </li>
            <li class="active">车辆添加</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                车辆添加
            </h1>
        </div>
        <!--Header Buttons-->
        <div class="header-buttons">
            <a class="sidebar-toggler" href="#">
                <i class="fa fa-arrows-h"></i>
            </a>
            <a class="refresh" id="refresh-toggler" href="">
                <i class="glyphicon glyphicon-refresh"></i>
            </a>
            <a class="fullscreen" id="fullscreen-toggler" href="#">
                <i class="glyphicon glyphicon-fullscreen"></i>
            </a>
        </div>
        <!--Header Buttons End-->
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget flat radius-bordered">
                    <div class="widget-header bordered-bottom bordered-themeprimary">
                        <span class="widget-caption">车辆添加</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <div id="horizontal-form">
                        <validator name="addCarValidation">
                            <form class="form-horizontal" role="form" novalidate>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车品牌</label>
                                    <div class="col-sm-10">
                                        <select id="e1" name="bid" class="input-label" v-model="car.bid" v-validate:bid="{ required: true}">
                                                <option value="" />请选择品牌
                                                <?php if(is_array($brand) || $brand instanceof \think\Collection): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $car['bid']): ?>selected="true"<?php endif; ?>/><?php echo $vo['name']; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车主姓名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-label" name="name" placeholder="车主姓名" v-validate:name="{ required: true}" v-model="car.name" value="<?php echo $car['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车主电话</label>
                                    <div class="col-sm-10">
                                        <input type="tel" class="form-control input-label" name="phone" placeholder="车主电话" v-validate:phone="{ required: true,minlength:11,maxlength:11}" v-model="car.phone" value="<?php echo $car['phone']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">出发时间</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="datebut" class="form-control input-label" name="go_time"placeholder="出发时间" onClick="jeDate({dateCell:'#datebut',isTime:true,format:'YYYY-MM-DD hh:mm'})" readonly value="<?php echo $car['go_time']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车牌号</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-label" name="number'" placeholder="车牌号" v-validate:number="{ required: true,minlength:7,maxlength:7}" v-model="car.number" value="<?php echo $car['number']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车型</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-label" name="type" placeholder="车型" v-validate:type="{ required: true}" v-model="car.type" value="<?php echo $car['type']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车颜色</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-label" name="color" placeholder="车颜色" v-validate:color="{ required: true}" v-model="car.color" value="<?php echo $car['color']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">行程</label>
                                    <div class="col-sm-10">
                                        <select style="width: 248px" id="e1" name="from" class="input-label" v-model="car.from" v-validate:from="{ required: true}">
                                                <option value=""/>请选择出发城市
                                                <?php if(is_array($city) || $city instanceof \think\Collection): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $car['from']): ?>selected="true"<?php endif; ?>/><?php echo $vo['name']; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select style="width: 248px" id="e1" name="to" class="input-label" v-model="car.to" v-validate:to="{ required: true}">
                                                <option value="" />请选择到达城市
                                                <?php if(is_array($city) || $city instanceof \think\Collection): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $car['to']): ?>selected="true"<?php endif; ?>/><?php echo $vo['name']; endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="input" class="col-sm-2 control-label no-padding-right">车辆图片上传</label>
                                    <div class="col-sm-10">
                                        <div style="width:1024px">
                                        <link href="/static/js/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="/static/js/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="/static/js/bootstrap-fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="/static/js/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="/static/js/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
<!-- optionally if you need a theme like font awesome theme you can include 
    it as mentioned below -->
<script src="/static/js/bootstrap-fileinput/js/themes/gly.js"></script>
<!-- optionally if you need translation for your language then include
    locale file as mentioned below -->
<script src="/static/js/bootstrap-fileinput/js/locales/zh.js" type="text/javascript"></script>
<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#file-upload" aria-controls="file-upload" role="tab" data-toggle="tab">上传新的文件</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content" style="height:400px;overflow-y: scroll;overflow-x: hidden;">
        <div role="tabpanel" class="tab-pane active" id="file-upload">
            <div class="row" style="margin:10px 0;">
                <div class="col-sm-12">
                    <input id="upload-input" type="file" class="file-loading" name="imgFile[]" multiple=true>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
</script>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button @click="addCar()"   :disabled="$addCarValidation.invalid" type="button" class="btn btn-blue">保 存</button>
                                    </div>
                                </div>
                            </form>
                            </validator>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
</div>

            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

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
    <div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd done bad!</div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button> -->
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
    
<script type="text/javascript" src="/static/js/jeDate/jedate.js"></script>
    <script>
    $(function(argument) {
    var vn = new Vue({
        el: '#addCar',
        data: {
            car: {id:'<?php echo $car['id']; ?>'},
            img:[],
            thumb:[],
            config:[],
            imgs:<?php echo $car['gallery']; ?>
        },
        created: function () {
            this.imgData(this.imgs);
        },
        methods: {
            imgData:function(data){
                for (var i = 0; i < data.length; i++) {
                    this.img.push(data[i].gallery);
                    this.thumb.push("<img style='height:160px' src='"+data[i].gallery+"'>");
                    this.config.push({caption: "", url: "/admin/upload/delete", key: i})
                }
            },
            addCar: function () {
                this.car.go_time = $("#datebut").val();
                this.car.thumb = this.img;
                $.ajax({
                    type: "POST",
                    url: '<?php echo url("admin/car/edit"); ?>',
                    dataType: 'json',
                    cache: false,
                    data: this.car,
                    success: function(data) {
                        console.log(data);
                        if(data.status>0){
                           window.success({msg:'添加成功',url:"<?php echo url('admin/car/index'); ?>"});
                        }else{
                           window.error({msg:data.msg});
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log('系统错误');
                    }
                });
            }
        }
    })
    $("#upload-input").fileinput({
            maxFileCount: 4, //表示允许同时上传的最大文件个数
            // allowedFileExtensions: ["jpg", "png", "gif"],
            uploadUrl: "/admin/upload/upload/id/car.html",
            // your upload server url
            // overwriteInitial:false,
            language: 'zh',
            // enctype: 'multipart/form-data',
            uploadAsync: false,
            overwriteInitial: false,
            // showPreview: false,
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            // uploadAsync:false,
            uploadExtraData: {
                img_key: "1000",
                img_keywords: "happy, nature",
            },
            initialPreview: vn.thumb,
            initialPreviewConfig: vn.config,
        }).on('filebatchuploadsuccess', function(event, data) {
            response = data.response;
            $.each(data.files, function(key, file) {
                var fname = response[key].file;
                vn.img.push(fname);
                // vn.thumb.push("<img style='height:160px' src='"+fname+"'>");
                // vn.config.push({caption: "", url: "/admin/upload/delete", key: ((i++)-1)})
            });
        }).on("filedeleted", function(jqXHR, key) {
            var abort = true;
            if (confirm("是否删除车辆图片")) {
                abort = false;
                vn.img.splice(key,1);
                vn.thumb.splice(key,1);
                vn.config.splice(key,1);
            }
            return abort;
        });
    });
    </script>

    <script>
    </script>
</body>
<!--  /Body -->
</html>
