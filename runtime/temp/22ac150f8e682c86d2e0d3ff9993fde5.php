<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:74:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\role\edit.html";i:1469761909;s:74:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\base\base.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\style.html";i:1469761909;s:79:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\loading.html";i:1469761909;s:75:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\nav.html";i:1469761909;s:79:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\sidebar.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\script.html";i:1469761909;s:77:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\modal.html";i:1469761909;s:78:"D:\phpStudy\WWW\Carpooling\public/../application/admin\view\public\danger.html";i:1469761909;}*/ ?>
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
            
<div class="page-content">
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="#">控制面板</a>
            </li>
            <li>
                <a href="#">权限管理</a>
            </li>
            <li class="active">角色列表</li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                角色列表
                <small>
                </small>
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
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-sky">
                <span class="widget-caption">角色编辑</span>
            </div>
            <div class="widget-body">
                <validator name="addRoleValidation">
                <form class="form-horizontal" role="form" novalidate>
                    <input type="hidden" name="ruleId" id="ruleId" value="<?php echo $role['id']; ?>">
                    <table cellspacing="1" id="rs" class="table table-bordered table-hover">
                        <tr>
                            <td>
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <span class="text">角色名称</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $role['name']; ?>"  class="form-control input-label" id="roleName" placeholder="角色名称">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox">
                                    <label>
                                    <?php if($role->getData('status') == 1): ?>
                                    <input type="checkbox" id="checkbox_fixednavbar" checked="checked">
                                        <span class="text">是否启用</span>
                                    <?php else: ?>
                                    <input type="checkbox" id="checkbox_fixednavbar">
                                        <span class="text">是否启用</span>
                                    <?php endif; ?>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <?php if(is_array($lists) || $lists instanceof \think\Collection): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr class="r1">
                            <td>
                                <div class="col-lg-12 col-sm-12 col-xs-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="inverted" name="rules" value="<?php echo $vo['id']; ?>" id="rules_<?php echo $vo['id']; ?>">
                                            <span class="text"><?php echo $vo['title']; ?></span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td>
                               <?php if(is_array($vo->parent) || $vo->parent instanceof \think\Collection): $i = 0; $__LIST__ = $vo->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                                <div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 r2" style="background:#ccc;">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="inverted" name="rules" value="<?php echo $vo1['id']; ?>" id="rules_<?php echo $vo1['id']; ?>">
                                                <span class="text"><?php echo $vo1['title']; ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php if(is_array($vo1->parent) || $vo1->parent instanceof \think\Collection): $i = 0; $__LIST__ = $vo1->parent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                    <div class="col-lg-2 col-sm-2 col-xs-2 r3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="inverted" name="rules" value="<?php echo $vo2['id']; ?>" id="rules_<?php echo $vo2['id']; ?>">
                                                <span class="text"><?php echo $vo2['title']; ?></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                    <div class="clearfix"></div>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td colspan="2">
                                <button type="button" class="btn btn-blue">保 存</button>
                            </td>
                        </tr>
                    </table>
                </form>
                </validator>
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
    
<script>
$(function() {
    $('.r1 td:nth-child(1) .inverted').on('click', function() {
        if ($(this).prop('checked')) {
            $(this).closest('td').siblings().find('.inverted').prop('checked', true);
        } else {
            $(this).closest('td').siblings().find('.inverted').prop('checked', false);
        }
    });
    $('.r1 td:nth-child(2) .r2 .inverted').on('click', function() {
        if($(this).prop('checked')){
            $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', true);
        }else{
            $(this).closest('.r2').siblings('.r3').find('.inverted').prop('checked', false);
        }
    });
    var grant = '<?php echo $rule; ?>'.split(',');
    for(var i=0;i<grant.length;i++){
        $('#rules_'+grant[i]).prop('checked',true);
    }
    $("button[type='button']").on('click',function(){
        var grant = [];
        var params = {};
        $('.inverted').each(function(){
           if($(this).prop('checked'))grant.push($(this).val());
        });
        params.name = $('#roleName').val();
        params.status = $('#checkbox_fixednavbar').is(':checked')==true?1:0;
        params.id = $('#ruleId').val();
        params.rules = grant;
        $.ajax({
            type: "POST",
            url: '<?php echo url("admin/role/add"); ?>',
            dataType: 'json',
            cache: false,
            data: params,
            success: function(data) {
                if(data.status>0){
                    $('#modal-success').modal('show');
                    $('#modal-success').find('.modal-body').html("编辑成功");
                    setTimeout(function(){
                        window.location.href = '<?php echo url("Admin/role/index"); ?>';
                    },3*1000);
                }else{
                    $('#modal-danger').modal('show');
                    $('#modal-danger').find('.modal-body').html(data.msg);
                    setTimeout(function(){
                        $('#modal-danger').modal('hide');
                    },2*1000);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        });
    });
})
</script>

    <script>
    </script>
</body>
<!--  /Body -->
</html>
