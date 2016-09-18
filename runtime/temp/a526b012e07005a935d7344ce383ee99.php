<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpStudy\WWW\Carpooling\public/../application/mobile\view\order\index.html";i:1470111073;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的生活</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/mobile/css/custom.css">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="/mobile/css/sm.min.css">
    <link rel="stylesheet" href="/mobile/css/sm-extend.min.css">
    <style type="text/css" media="screen">
    body,
    div,
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    a,
    td,
    th {
        font-family: Helvetica, Tahoma, Arial, "Microsoft YaHei", "微软雅黑", STXihei, "华文细黑", SimSun, "宋体", Heiti, "黑体", sans-serif !important;
    }
    body{
        background-color: #fff;
    }
    .list-block {
        margin: 0 0;
    }
    
    .pickerinput {
        text-align: right;
        height: auto !important;
        font-size: 16px;
    }
    
    .iteminput {
        text-align: right;
        height: auto !important;
        font-size: 16px;
    }
    
    .list-block .item-content {
        padding-left: 0;
        font-size: 16px;
        color: #888;
    }
    
    .list-block .item-title {
        padding-left: .75rem;
    }
    
    .pricelist {
        margin: 8px;
    }
    
    .pricetable {
        width: 100%;
        color: #aaa;
    }
    
    th {
        height: 45px;
        font-weight: 100;
    }
    caption{
        margin:10px;
    }
    thead {
        background-color: #FDAA4F;
        color: #fff;
        border: 1px #FDAA4F solid;
    }
    
    td {
        text-align: center;
        border: 1px #FECC95 solid;
        height: 45px;
        color: #aaa;
    }
    
    .pricetotal {
        margin-top:30px;
        text-align: center;
    }
    
    .p_price {
        color: #FDAA4F;
    }
    
    .span_total {
        font-size: 18px;
    }
    
    .span_yu {
        font-size: 20px;
        font-weight:bold;

    }
    
    .p_desc {
        color: #aaa;
        font-size: 12px;
    }
    
    .sub {
        width: 100%;
        text-align: center;
        clear: both;
    }
    
    .sub button {
        background-color: #FDAA4F;
        width: 95%;
        margin: 10px auto;
        border: 0;
        padding: 10px;
        border-radius: 1px;
        color: #fff;
        font-size: 17px;
    }
    </style>
</head>

<body>
    <div class="page page-current" id="order">
        <div class="content">
            <div class="list-block ">
                <ul>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">出发日期</div>
                            <div class="item-after">
                                <input placeholder="请选择出发日期" class="pickerinput" type="text" id='datetime-picker' v-model="order.go_time"/>
                            </div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">始发地</div>
                            <div class="item-after">
                                <input placeholder="请选择始发地" class="pickerinput" type="text" id='pickercfd' />
                            </div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">目的地</div>
                            <div class="item-after">
                                <input placeholder="请选择目的地" class="pickerinput" type="text" id='pickermdd' />
                            </div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">约车人姓名</div>
                            <div class="item-after">
                                <input placeholder="请输入姓名" class="iteminput" type="text" id="name" v-model="order.name
                                "/>
                            </div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">约车人联系方式</div>
                            <div class="item-after">
                                <input placeholder="请输入联系电话" class="iteminput" type="text" id="phone" v-model="order.phone"/>
                            </div>
                        </div>
                    </li>
                    <li class="item-content">
                        <div class="item-inner">
                            <div class="item-title">车辆品牌要求</div>
                            <div class="item-after">
                                <input placeholder="请选择车辆品牌" class="iteminput" type="text" id="pickerbrand" />
                            </div>
                        </div>
                    </li>
                    <div class="pricelist" v-show="price != ''">
                        <table class="pricetable">
                            <caption>价格列表</caption>
                            <thead>
                                <tr>
                                    <th>出发地</th>
                                    <th style="border-left: 1px solid #FFD3A3;border-right: 1px solid #FFD3A3;">目的地</th>
                                    <th>价格</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="vo in price">
                                    <td v-text="vo.from"></td>
                                    <td v-text="vo.to"></td>
                                    <td v-text="vo.price"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="pricetotal">
                        <p class="p_price"><span class="span_total" id="price"></span>&nbsp;&nbsp;<span class="span_yu">需预付￥50</span></p>
                        <p class="p_desc">此处所支付的金额仅作为订金，余下部分请当面结算给车主</p>
                    </div>
                    <div class="sub">
                        <button @click="addOrder()">去支付</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <script type='text/javascript' src='/mobile/js/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='/mobile/js/sm.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='/mobile/js/sm-extend.min.js' charset='utf-8'></script>
    <!-- Vue -->
    <script src="/assets/vue/vue.js"></script>
    <script src="/assets/vue/vue-validator.js"></script>
    <script src="/assets/vue/vue-resource.js"></script>
    <script type='text/javascript'>
    $.init();
    var area = [];
    var areaId = [];
    var brand = [];
    var brandId = [];
    var a = <?php echo $area; ?>;
    var to = [];
    var toId = [];
    var priceId = [];
    var b = <?php echo $brand; ?>;
    var vn = new Vue({
        el: '#order',
        data:{
            price:[],
            order:{}
        },
        methods: {
            // 获取行程信息
            _getPrice: function(id) {                                          
                $.ajax({
                    type: "POST",
                    url: '<?php echo url("mobile/order/index"); ?>',
                    dataType: 'json',
                    cache: false,
                    data:{id:id},
                    success: function(data) {
                        vn.price = data;
                        for (var i = 0; i < vn.price.length; i++) {
                            to.push(vn.price[i].to);
                            toId.push(vn.price[i].toId);
                            priceId.push(vn.price[i].id);
                        }        
                    },
                    error: function(xhr, status, error) {
                        console.log('系统错误');
                    }
                }); 
            },
            // 提交表单
            addOrder: function() {
                if($("#datetime-picker").val() == ''){
                   $.toast('出发日期不能为空', 1000);
                   return;
                }
                if($("#pickercfd").val() == ''){
                    $.toast('出发地不能为空', 1000);
                    return;
                }
                if($("#pickermdd").val() == ''){
                    $.toast('目的的不能为空', 1000);
                    return;
                } 
                if($("#name").val() == ''){
                   $.toast('约车人姓名不能为空', 1000);
                   return;
                }
                if($("#phone").val() == ''){
                   $.toast('联系电话不能为空', 1000);
                   return;
                }  
                if($("#phone").val() != ''){
                    if(!/^1[34578]{1}\d{9}$/.test($("#phone").val())){
                        $.toast('请填写正确联系电话', 1000);
                        return;  
                    }
                } 
                this.order.prepay = 50;                                       
                    $.ajax({
                        type: "POST",
                        url: '<?php echo url("mobile/order/order"); ?>',
                        dataType: 'json',
                        cache: false,
                        data:this.order,
                        success: function(data) {
                            if(data['status']>0){
                               $.toast('预约成功', 2000);
                               window.location.href = '/mobile/pay/index/id/'+data.status+'.html';
                            }else{
                               $.toast(data['msg'], 1000);
                            }    
                        },
                        error: function(xhr, status, error) {
                            console.log('系统错误');
                        }
                    });
            },
        }
    })
    for (var i = 0; i < a.length; i++) {
        area.push(a[i].name);
        areaId.push(a[i].id);
    }
    $("#pickercfd").picker({
        toolbarTemplate: '<header class="bar bar-nav"><button class="button button-link pull-right close-picker">确定</button><h1 class="title">选择地址</h1></header>',
        rotateEffect: "true",
        cols: [{
            textAlign: 'center',
            values: area
        }],
        onOpen: function() {
        },
        onClose: function() {
            vn._getPrice(areaId[this.cols[0].activeIndex]);
            vn.order.from = areaId[this.cols[0].activeIndex];
        }
    });

    $("#pickermdd").picker({
        toolbarTemplate: '<header class="bar bar-nav"><button class="button button-link pull-right close-picker">确定</button><h1 class="title">选择地址</h1></header>',
        rotateEffect: "true",
        cols: [{
            textAlign: 'center',
            values: to
        }],
        onOpen: function() {
        },
        onClose: function() {
           $("#price").html('<span class="span_yu">总价￥'+vn.price[this.cols[0].activeIndex].price+'</span>');
           vn.order.to = toId[this.cols[0].activeIndex];
           vn.order.price_id = priceId[this.cols[0].activeIndex];
        }
    });
        for (var i = 0; i < b.length; i++) {
          brand.push(b[i].name);
          brandId.push(b[i].id);
        }
        $("#pickerbrand").picker({
        toolbarTemplate: '<header class="bar bar-nav"><button class="button button-link pull-right close-picker">确定</button><h1 class="title">选择品牌</h1></header>',
        rotateEffect: "true",
        cols: [{
            textAlign: 'center',
            values: brand
        }],
        onOpen: function() {
        },
        onClose: function() {
            vn.order.bid = brandId[this.cols[0].activeIndex];
        }
    });

    $("#datetime-picker").datetimePicker({
    });

    </script>
</body>

</html>
