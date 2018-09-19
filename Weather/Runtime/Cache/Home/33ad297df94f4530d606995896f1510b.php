<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true">
    <meta content="telephone=no" name="format-detection">
    <!-- favicon -->
    <!-- <link rel="shortcut icon" type="image/png" href="favicon.png" /> -->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <!-- custom CSS -->
    <link href="/Public/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Public/assets/css/jquery.fullPage.css">
    <link href="/Public/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- END custom CSS -->
    <!--<![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/assets/js/html5shiv.min.js"></script>
    <script src="/Public/assets/js/respond.min.js"></script>
    <![endif]-->
    <title>包头市智慧农业气象服务系统</title>
</head>
<body>
<!-- <div id="wrap"> -->
    <!-- <div id="main"> -->
        <div id="page1" class="page">
            <!-- Header -->
            <header id="header" class="header">
                <div class="header__top">
                    <div class="container">
                        <?php  if (session('download') && session('download') == 1) { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>提示: </strong> 只有登陆后, 相关单位授权的用户才能下载.
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="wrap-logo">
                                    <a class="ptitle" href="/">包头市智慧农业气象服务系统</a>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-xs-4 col-sm-9">
                                    <div class="weather">

                                        <!--<div class="weather__city">-->
                                            <!--<em>包头</em>-->
                                            <!--<div class="weather__city__list">-->
                                                <!--<ul>-->
                                                    <!--<li class="active">-->
                                                        <!--<a href="#">包头</a>-->
                                                    <!--</li>-->
                                                    <!--<li>-->
                                                        <!--<a href="#">Moscow</a>-->
                                                    <!--</li>-->
                                                    <!--<li>-->
                                                        <!--<a href="#">Kiev</a>-->
                                                    <!--</li>-->
                                                <!--</ul>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="wrap-login">
                                    <?php if($currentMember) { ?>
                                    <a class="alogin" href="">欢迎， <?php echo ($currentMember['username']); ?> |</a>
                                    <a class="alogin" href="/login/logout">退出</a>
                                    <?php } else { ?>
                                    <a class="alogin" href="/login/index">登录 |</a>
                                    <a class="alogin" href="/register/index">注册</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wsmenucontent overlapblackbg"></div>
                <div class="wsmenuexpandermain slideRight">
                    <a id="navToggle" class="animated-arrow slideLeft">
                        <span></span>
                    </a>
                </div>
                <div class="header_down">
                    <div class="container">

                        <div class="wrapper clearfix bigmegamenu">
                            <!--Main Menu HTML Code-->
                            <nav class="wsmenu slideLeft clearfix">
                                <ul class="mobile-sub wsmenu-list">

                                    <li class="active">
                                        <span class="wsmenu-click"></span>
                                        <a href="">实况数据
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/livedata">室内实况数据</a>
                                            </li>
                                            <!--<li>-->
                                                <!--<a href="category.html">室内实况数据</a>-->
                                            <!--</li>-->
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="">设施气象评估及报警预警
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/realassessment">温室实况作物影响评估</a>
                                            </li>
                                            <li>
                                                <a href="/warning">温室小气候实况监测报警</a>
                                            </li>
                                            <li>
                                                <a href="/warning/feature">温室小气温预报预警</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <!--<li>-->
                                    <!--<span class="wsmenu-click"></span>-->
                                    <!--<a href="category.html">室外气候</a>-->
                                    <!--</li>-->
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="">农田小气候实况监测报警和预警
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/landwarning">农田小气候实况监测报警</a>
                                            </li>
                                            <li>
                                                <a href="/landwarning/feature">农田小气候预报预警</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="">果树小气候实况监测报警和预警
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/fruitwarning">果树小气候实况监测报警</a>
                                            </li>
                                            <li>
                                                <a href="/fruitwarning/feature">果树小气候预报预警</a>
                                            </li>


                                        </ul>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="/livedisaster">灾害性天气实况报警</a>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="/nyservice">农业气象服务信息
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/nyservice">农业气象</a>
                                            </li>
                                            <li>
                                                <a href="/stservice">生态气象</a>
                                            </li>


                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                            <!--Menu HTML Code-->
                        </div>
                    </div>
                </div>
            </header>
            <!-- END header -->            <!-- header slider -->
            <div class="slate_gray">
                <div class="container">
                    <div class="row header_news_panel">
                        <!-- Tab panes -->
                        <div class="col-sm-7 tab-content tab-content_mob-p0">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <img src="/Public/upload/<?php echo ($news[0]['path']); ?>" alt="main img" class="tab-pane__img" height="466" width="791">
                                <!--<div class="header_news_text tab-pane__block">-->
                                    <!--&lt;!&ndash; <p class="tab-pane__category yel_line">People</p> &ndash;&gt;-->
                                    <!--<a class="tab-pane__title">最新任何图片</a>-->
                                    <!--<p class="tab-pane__text">介绍这个图片</p>-->
                                <!--</div>-->
                            </div>

                        </div>
                        <!-- END Tab panes -->
                        <!-- Nav tabs -->
                        <div class="col-sm-3 news-tabs">
                            <p class="news-tabs__title h2">最新实况报警</p>
                            <div id="demo" style="overflow:hidden;height:350px;width:300px;">
                                <ul id="demo1" class="news-tabs__nav nav nav-tabs shadow_text" role="tablist">
                                    <?php if($livewarn) { ?>
                                    <?php if(is_array($livewarn)): foreach($livewarn as $key=>$v): ?><li role="presentation" class="active">
                                            <p href="" role="tab" data-toggle="tab" class="nav_p">
                                                <span class="time"><?php echo ($s); ?></span>
                                                <?php echo ($v['yj_content']); ?>
                                            </p>
                                        </li><?php endforeach; endif; ?>
                                    <?php } else { ?>
                                    <p class="p_yujing">无灾害报警</p>
                                     <?php } ?>
                                </ul>
                                <div id="demo2"></div>
                            </div>
                        </div>
                        <div class="col-sm-2 news-tabs">
                            <p class="news-tabs__title h2">灾害天气预警</p>
                            <div id="demo6" style="overflow:hidden;height:360px;width:300px;">
                                <ul id="demo8" class="news-tabs__nav nav nav-tabs shadow_text" role="tablist">
                                    <?php if($yujing) { ?>
                                    <?php if(is_array($yujing)): foreach($yujing as $key=>$v): ?><li role="presentation" class="active">
                                            <a href="<?php echo U('disaster/detail', ['id' => $v['id']]);?>">
                                                <span class="time"><?php echo ($v['addtime']); ?></span>
                                                <?php echo ($v['title']); ?>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                    <?php } else { ?>
                                    <p class="p_yujing">无灾害预警</p>
                                     <?php } ?>
                                </ul>
                                <div id="demo5"></div>
                            </div>
                        </div>
                        <!-- END Nav tabs -->
                    </div>
                </div>
            </div>
            <!-- END header slider -->

            
        </div>
        <!-- top news-->
        <div id="page2" class="page">
            <section>
                <!-- top news -->
                <!-- title -->
                <div class="wrap wrap_white">
                    <div class="container title">
                        <h1 class="title__h1 underscore">最新天气情况</h1>
                    </div>
                </div>

                <!-- END title -->
                <div class="wrap wrap_gray pt20">
                    <div class="container">
                        <div class="row">
                            <div>
                                <form action="/index/getdata" class="form-inline" id="wtform" method="post">
                                    <div class="form-group pick">
                                        <label for="dtp_input2" class="col-md-1 control-label">日期</label>

                                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd"
                                             data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" value="<?php echo ($day); ?>" readonly>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="<?php echo ($day); ?>" name="sdate"/>
                                        <br/>
                                    </div>
                                    <div class="form-group slwidth">
                                        <select class="form-control" name="station" autocomplete="off">
                                            <?php foreach ($stlist as $key => $v) { ?>
                                            <?php if ($st == $v['id']) { ?>
                                            <option value="<?php echo ($v['id']); ?>" selected><?php echo ($v['location']); ?></option>
                                            <?php } else { ?>
                                            <option value="<?php echo ($v['id']); ?>"><?php echo ($v['location']); ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                   <!--  <a href="/index/show_table" class="btn btn-orange btn-m pull-right" id="tb-btn">表格</a> -->

                                    <button id="btnsub" type="submit" class="btn btn-primary btn-orange pull-right">刷新</button>
                                </form>
                            </div>

                                    <div class="col-md-7 col-sm-7" id="out" style="height:300px"></div>
                                    <div class="col-md-5 col-sm-5" id="feat">
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="2">地区</th>
                                                <th colspan="3">未来3天天气预报</th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th id="t1"><?php echo ($res_f[0]['time']); ?></th>
                                                <th id="t2"><?php echo ($res_f[1]['time']); ?></th>
                                                <th id="t3"><?php echo ($res_f[2]['time']); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th rowspan="5" id='aaa1'><?php echo ($stlocation); ?></th>
                                                <td rowspan="1">最高温度</td>
                                                <td id="m1"><?php echo ($res_f[0]['max']); ?></td>
                                                <td id="m2"><?php echo ($res_f[1]['max']); ?></td>
                                                <td id="m3"><?php echo ($res_f[2]['max']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>最低温度</td>
                                                <td id="n1"><?php echo ($res_f[0]['min']); ?></td>
                                                <td id="n2"><?php echo ($res_f[1]['min']); ?></td>
                                                <td id="n3"><?php echo ($res_f[2]['min']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>天空状况</td>
                                                <td id="s1"><?php echo ($sky[0]['st']); ?></td>
                                                <td id="s2"><?php echo ($sky[1]['st']); ?></td>
                                                <td id="s3"><?php echo ($sky[2]['st']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>图标</td>
                                                <td id="i1"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[0]['icon']); ?>" alt="" /></td>
                                                <td id="i2"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[1]['icon']); ?>" alt="" /></td>
                                                <td id="i3"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[2]['icon']); ?>" alt="" /></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>


                        </div>
                    <!-- btn load-->
                    <!--   <div class="ajax_load">
                          <i class="icon-arrows-cw"></i>Load more
                          <svg width="128" height="40" viewBox="0 0 128 40" xmlns="http://www.w3.org/2000/svg">
                              <rect x='0' y='0' fill='none' width='128' height='40'></rect>
                          </svg>
                      </div> -->
                    <!-- END btn load-->
                </div>
                <!-- /container-->
                    </div>
            </section>
            <!-- /top news -->

<section class="wrap wrap_gray">
                <div class="brilliant-section">
                    <div class="container">
                        <!-- <h2>常用功能</h2> -->
                        <!-- <h5>农业气象的常用工具</h5> -->
                        <div class="col-md-11">
                        <div class="brilliant-grids">
                            <!--<div class="col-md-4 brilliant-grid">-->
                                <!--<div class="brilliant-left">-->
                                    <!--<i class="glyphicon glyphicon-cog" aria-hidden="true"></i>-->
                                <!--</div>-->
                                <!--<div class="brilliant-right">-->
                                    <!--<h4>旗县区天气预报</h4>-->
                                <!--</div>-->
                                <!--<div class="clearfix"></div>-->
                            <!--</div>-->
                            <div class="col-md-3 brilliant-grid">
                                <div class="brilliant-left">
                                    <a href="/accont"><i class="glyphicon glyphicon-cloud" aria-hidden="true"></i></a>
                                </div>
                                <div class="brilliant-right">
                                    <a href="/accont"><h4>数据统计</h4></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!--<div class="col-md-4 brilliant-grid">-->
                                <!--<div class="brilliant-left">-->
                                    <!--<i class="glyphicon glyphicon-signal" aria-hidden="true"></i>-->
                                <!--</div>-->
                                <!--<div class="brilliant-right">-->
                                    <!--<h4>信息留言板</h4>-->
                                <!--</div>-->
                                <!--<div class="clearfix"></div>-->
                            <!--</div>-->
                            <div class="col-md-3 brilliant-grid">
                                <div class="brilliant-left">
                                    <a href="/advise"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i></a>
                                </div>
                                <div class="brilliant-right">
                                    <a href="/advise"><h4>新闻资讯</h4></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 brilliant-grid">
                                <div class="brilliant-left">
                                    <a href="/know"><i class="glyphicon glyphicon-link" aria-hidden="true"></i></a>
                                </div>
                                <div class="brilliant-right">
                                    <a href="/know"><h4>科普信息</h4></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-3 brilliant-grid">
                                <div class="brilliant-left">
                                    <a href="/history"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></a>
                                </div>
                                <div class="brilliant-right">
                                    <a href="/history"><h4>数据下载</h4></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                           
                            <div class="clearfix"></div>
                        </div>
                        <!--<div class="brilliant-grids">-->
                            <!--<div class="col-md-4 brilliant-grid">-->
                                <!--<div class="brilliant-left">-->
                                    <!--<i class="glyphicon glyphicon-globe" aria-hidden="true"></i>-->
                                <!--</div>-->
                                <!--<div class="brilliant-right">-->
                                    <!--<h4>农田小气候实况监测报警和预警</h4>-->
                                <!--</div>-->
                                <!--<div class="clearfix"></div>-->
                            <!--</div>-->
                            <!--<div class="col-md-4 brilliant-grid">-->
                                <!--<div class="brilliant-left">-->
                                    <!--<i class="glyphicon glyphicon-link" aria-hidden="true"></i>-->
                                <!--</div>-->
                                <!--<div class="brilliant-right">-->
                                    <!--<h4>果树小气候实况监测报警和预警</h4>-->
                                <!--</div>-->
                                <!--<div class="clearfix"></div>-->
                            <!--</div>-->
                            <!--<div class="col-md-4 brilliant-grid">-->
                                <!--<div class="brilliant-left">-->
                                    <!--<i class="glyphicon glyphicon-phone" aria-hidden="true"></i>-->
                                <!--</div>-->
                                <!--<div class="brilliant-right">-->
                                    <!--<h4>数据查询</h4>-->
                                <!--</div>-->
                                <!--<div class="clearfix"></div>-->
                            <!--</div>-->
                            <!--<div class="clearfix"></div>-->
                        <!--</div>-->
                        </div>
                        <div class="col-md-1">
                            <div>
        <img src="/Public/assets/images/11.png" alt="二维码">
        <p id="qrcode-center" style="margin-left:13px;">扫描安卓APP下载</p>
    </div>
                        </div>
                    </div>
                </div>

            </section>

<!-- <script src="js/jquery.mousewheel.min.js"></script> -->
<!-- <script src="js/jquery.fullPage.js"></script> -->
    <!-- <script type="text/javascript">
        var wrap = document.getElementById("wrap");
        var main = document.getElementById("main");
        var hei = document.body.clientHeight;
        wrap.style.height = hei + "px";
        var obj = document.getElementsByTagName("div");
        console.log(obj.length);

        for(var i=0;i<obj.length;i++){
            if(obj[i].className == 'page'){
                obj[i].style.height = hei + "px";
            }
        }
        //如果不加时间控制，滚动会过度灵敏，一次翻好几屏
        var startTime = 0, //翻屏起始时间
                endTime = 0,
                now = 0;
        //浏览器兼容
        if ((navigator.userAgent.toLowerCase().indexOf("firefox")!=-1)){
            document.addEventListener("DOMMouseScroll",scrollFun,false);
        }
        else if (document.addEventListener) {
            document.addEventListener("mousewheel",scrollFun,false);
        }
        else if (document.attachEvent) {
            document.attachEvent("onmousewheel",scrollFun);
        }
        else{
            document.onmousewheel = scrollFun;
        }

        //滚动事件处理函数
        function scrollFun(event){
            startTime = new Date().getTime();
            var delta = event.detail || (-event.wheelDelta);
            //mousewheel事件中的 “event.wheelDelta” 属性值：返回的如果是正值说明滚轮是向上滚动
            //DOMMouseScroll事件中的 “event.detail” 属性值：返回的如果是负值说明滚轮是向上滚动
            if ((endTime - startTime) < -1000){
                if(delta>0 && parseInt(main.offsetTop) > -(hei*1)){
                    //向下滚动
                    now = now - hei;
                    toPage(now);
                }
                if(delta<0 && parseInt(main.offsetTop) < 0){
                    //向上滚动
                    now = now + hei;
                    toPage(now);
                }
                endTime = new Date().getTime();
            }
            else{
                event.preventDefault();
            }
        }
        function toPage(now){
            $("#main").animate({top:(now+'px')},1000);     //jquery实现动画效果
//            setTimeout("main.style.top = now + 'px'",1000);     javascript 实现动画效果
        }
    </script> -->
    <script>
        function marq (demo, demo2, demo1) {
            var speed=40
            var demo=document.getElementById(demo);
            var demo2=document.getElementById(demo2);
            var demo1=document.getElementById(demo1);
            demo2.innerHTML=demo1.innerHTML
            function Marquee(){
                if(demo2.offsetTop-demo.scrollTop<=0)
                    demo.scrollTop-=demo1.offsetHeight
                else{
                    demo.scrollTop++
                }
            }
            var MyMar=setInterval(Marquee,speed)
            demo.onmouseover=function() {clearInterval(MyMar)}
            demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
        }
        marq("demo", "demo2", "demo1");
    </script>
<!-- Custom JavaScript -->
            <footer class="footer slate_gray">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="copyright">Copyright &copy; 2018.包头农科院 包头气象局 All rights reserved.</p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    <!-- </div>  main -->
<!-- </div> -->
<!-- END Footer -->
<script src="/Public/assets/js/jquery.js"></script>
<script src="/Public/assets/js/bootstrap.min.js"></script>
<script src="/Public/assets/js/echarts.js"></script>
<script src="/Public/assets/js/main.js"></script>
<script src="/Public/assets/js/validata.js"></script>
<script type="text/javascript" src="/Public/assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/Public/assets/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">

    $('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

</script>
<script type="text/javascript">
    require.config({
        paths: {
            echarts: "/Public/assets/js"
        }
    });
</script>
<script type="text/javascript" id="linejs">
    require(
            [
                'echarts',
                'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                'echarts/chart/bar'
//                    'echarts/chart/radar'
//                    'echarts/chart/polar'
            ],
            function (ec) {

                var tmp = <?php echo ($wrp); ?>;
//                    console.log(linenumw);
                if (tmp.length != 0) {
                    var dom_tmp = ec.init(document.getElementById('out'));
                    var tmptime = [];
                    var linenum1 = [];
                    var linenum2 = [];
                    var bar1 = [];
//                        var lineout = linenumw;

                    for (var val in tmp) {

                        tmptime.push(tmp[val]['time']);
                        linenum1.push(tmp[val]['max']);
                        linenum2.push(tmp[val]['min']);
                        if (tmp[val]['water']) {
                            bar1.push(tmp[val]['water']);
                        }
                    }
//                        console.log(linenum1);
//                    console.log(linenum2);
//                    console.log(bar1);
//                    var maxactive = calMax(bar1);//活跃Y轴值

                    tmp_op = {
                        title: {
                            textStyle: {
                                fontSize: 14,
                                fontWeight: 'bolder',
                                color: '#333'          // 主标题文字颜色
                            },
                            x: 'left',
                            text: '<?php echo ($sdate); ?>',
                            subtext: '实况数据'
                        },
                        tooltip: {
                            trigger: 'axis'
                        },
                        legend: {
                            orient: 'vertical',
                            x: 'right',
                            data: ['最高温度', '最低温度', '降水']
                        },

                        toolbox: {
                            show: true,
                            feature: {
//                                    mark: {show: true}
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                            }
                        },
                        calculable: true,
                        xAxis: [
                            {
                                type: 'category',
                                axisLabel: {
                                    formatter: '{value}',
                                    interval:0
                                },
//                                boundaryGap: false,
                                data: tmptime
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',

                                axisLabel: {
                                    formatter: '{value}'
                                }
                            },
                            {
                                type: 'value',
                                axisLabel: {
                                    formatter: '{value}毫米cccccccccccc'
                                }
                            }

                        ],
                        series: [
                            {
                                name: '降水',
                                type: 'bar',
                                yAxisIndex: 0,
                                barWidth: 20,
                                data: bar1,
                                itemStyle:{
                                    normal:{
                                        color:'#6699CC'
                                    }
                                },
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                }

                            },
                            {
                                name: '最高温度',
                                type: 'line',
                                yAxisIndex: 0,
                                data: linenum1,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值'},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}
                                    ]
                                }
                            },
                            {
                                name: '最低温度',
                                type: 'line',
                                yAxisIndex: 0,
                                data: linenum2,
                                markPoint: {
                                    data: [
                                        {type: 'max', name: '最大值',symbolSize:18},
                                        {type: 'min', name: '最小值'}
                                    ]
                                },
                                markLine: {
                                    data: [
                                        {type: 'average', name: '平均值'}

                                    ]
                                }
                            }


                        ]
                    };
                    dom_tmp.setOption(tmp_op);
                } else {
                    $('#out').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                }
            }
    )
</script>
<script type="text/javascript">
    var form = $('#wtform');
    form.Validform({
        btnSubmit: "#btnsub",
        ajaxPost: true,
        callback: function (data) {
            if (data.status) {
                console.log(data.sky);
                if (data.res) {
                    require(
                            [
                                'echarts',
                                'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                'echarts/chart/bar'
                            ],
                            function (ec) {
                                // 基于准备好的dom，初始化echarts图表
                                var dom_tmp1 = ec.init(document.getElementById('out'));

//                                    var outtmp = data.outtmp;
                                var tmp1 = data.res;
//                                console.log(tmp1);
                                var tmptime1 = [];
                                var linenum11 = [];
                                var linenum22 = [];
                                var bar11 = [];
//                        var lineout = linenumw;

                                for (var val in tmp1) {
                                    tmptime1.push(tmp1[val]['time']);
                                    linenum11.push(tmp1[val]['max']);
                                    linenum22.push(tmp1[val]['min']);
                                    if (tmp1[val]['water']) {
                                        bar11.push(tmp1[val]['water']);
                                    }
                                }
//                                console.log(linenum11);
//                                console.log(linenum22);
//                                console.log(bar11);
//                    var maxactive = calMax(bar1);//活跃Y轴值

                                tmp_op1 = {
                                    title: {
                                        textStyle: {
                                            fontSize: 14,
                                            fontWeight: 'bolder',
                                            color: '#333'          // 主标题文字颜色
                                        },
                                        x: 'left',
                                        text: '<?php echo ($sdate); ?>',
                                        subtext: '实况数据'
                                    },
                                    tooltip: {
                                        trigger: 'axis'
                                    },
                                    legend: {
                                        orient: 'vertical',
                                        x: 'right',
                                        data: ['最高温度', '最低温度', '降水']
                                    },

                                    toolbox: {
                                        show: true,
                                        feature: {
//                                    mark: {show: true}
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                        }
                                    },
                                    calculable: true,
                                    xAxis: [
                                        {
                                            type: 'category',
                                            axisLabel: {
                                                formatter: '{value}',
                                                interval:0
                                            },
//                                boundaryGap: false,
                                            data: tmptime1
                                        }
                                    ],
                                    yAxis: [
                                        {
                                            type: 'value',

                                            axisLabel: {
                                                formatter: '{value}'
                                            }
                                        },
                                        {
                                            type: 'value',
                                            axisLabel: {
                                                formatter: '{value}毫米cccccccccccc'
                                            }
                                        }

                                    ],
                                    series: [
                                        {
                                            name: '降水',
                                            type: 'bar',
                                            barWidth: 20,
                                            yAxisIndex: 0,
                                            data: bar11,
                                            itemStyle:{
                                                normal:{
                                                    color:'#6699CC'
                                                }
                                            },
                                            markPoint: {
                                                data: [
                                                    {type: 'max', name: '最大值'},
                                                    {type: 'min', name: '最小值'}
                                                ]
                                            }

                                        },
                                        {
                                            name: '最高温度',
                                            type: 'line',
                                            yAxisIndex: 0,
                                            data: linenum11,
                                            markPoint: {
                                                data: [
                                                    {type: 'max', name: '最大值'},
                                                    {type: 'min', name: '最小值'}
                                                ]
                                            },
                                            markLine: {
                                                data: [
                                                    {type: 'average', name: '平均值'}
                                                ]
                                            }
                                        },
                                        {
                                            name: '最低温度',
                                            type: 'line',
                                            yAxisIndex: 0,
                                            data: linenum22,
                                            markPoint: {
                                                data: [
                                                    {type: 'max', name: '最大值',symbolSize:18},
                                                    {type: 'min', name: '最小值'}
                                                ]
                                            },
                                            markLine: {
                                                data: [
                                                    {type: 'average', name: '平均值'}

                                                ]
                                            }
                                        }


                                    ]
                                };
                                dom_tmp1.setOption(tmp_op1);
                            }
                    );
                } else {
                    $('#out').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');

                }
                console.log(data.resf);
                if (data.resf) {
                    $('#t1').text(data.resf[0]['time']);
//                    console.log(data.resf[0]['time']);
                    $('#t2').text(data.resf[1]['time']);

                    $('#t3').text(data.resf[2]['time']);

                    $('#m1').text(data.resf[0]['max']);
                    $('#m2').text(data.resf[1]['max']);
                    $('#m3').text(data.resf[2]['max']);

                    $('#n1').text(data.resf[0]['min']);
                    $('#n2').text(data.resf[1]['min']);
                    $('#n3').text(data.resf[2]['min']);

                    $('#aaa1').text(data.slocation);



                }
                if (data.sky) {
                   $('#i1').html('<img height="50" width="50" src="/Public/assets/images/picweather/'+data.sky[0]['icon']+'" alt="" />');
                    $('#i2').html('<img height="50" width="50" src="/Public/assets/images/picweather/'+data.sky[1]['icon']+'" alt="" />');
                    $('#i3').html('<img height="50" width="50" src="/Public/assets/images/picweather/'+data.sky[2]['icon']+'" alt="" />');

                    $('#s1').text(data.resf[0]['st']);
                    $('#s2').text(data.resf[1]['st']);
                    $('#s3').text(data.resf[2]['st']);

                }else {
                    $('#skyt').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                }
            } else {
                $('#out').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
            }
        }
    });
</script>
<script>
    $("#Validform_msg").remove();
</script>
</body>
</html>