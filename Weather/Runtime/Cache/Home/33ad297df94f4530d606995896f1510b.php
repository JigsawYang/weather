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
    <script src="/Public/assets/js/validata.js"></script>
    <link href="/Public/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- END custom CSS -->
    <!--<![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/assets/js/html5shiv.min.js"></script>
    <script src="/Public/assets/js/respond.min.js"></script>
    <![endif]-->
    <title>包头市现代智慧农业服务系统</title>
</head>
<body>
<div id="wrap">
    <div id="main">
        <div id="page1" class="page">
            <!-- Header -->
            <header id="header" class="header">
                <div class="header__top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="wrap-logo">
                                    <a class="ptitle" href="/">包头市现代智慧农业服务系统</a>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-xs-4 col-sm-9">
                                    <div class="weather">

                                        <div class="weather__city">
                                            <em>包头</em>
                                            <div class="weather__city__list">
                                                <ul>
                                                    <li class="active">
                                                        <a href="#">包头</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Moscow</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Kiev</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                                <a href="/livedata">室外实况数据</a>
                                            </li>
                                            <li>
                                                <a href="category.html">室内实况数据</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="">温室内数据
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="404.html">温室实况作物影响</a>
                                            </li>
                                            <li>
                                                <a href="category.html">温室预报作物影响</a>
                                            </li>
                                            <li>
                                                <a href="news.html">温室小气候实况监测报警</a>
                                            </li>
                                            <li>
                                                <a href="search-result.html">温室气温光照预报预警</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="category.html">室外气候</a>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="category.html">预报服务信息和生产建议</a>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="category.html">科普知识</a>
                                    </li>
                                    <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="category.html">气候统计</a>
                                    </li>
                                    <!-- <li>
                                        <span class="wsmenu-click"></span>
                                        <a href="category.html">数据查询</a>
                                    </li> -->
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
                        <div class="col-sm-8 tab-content tab-content_mob-p0">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <img src="/Public/assets/images/content/slide1.jpg" alt="main img" class="tab-pane__img">
                                <div class="header_news_text tab-pane__block">
                                    <!-- <p class="tab-pane__category yel_line">People</p> -->
                                    <a class="tab-pane__title">最新任何图片</a>
                                    <p class="tab-pane__text">介绍这个图片</p>
                                </div>
                            </div>

                        </div>
                        <!-- END Tab panes -->
                        <!-- Nav tabs -->
                        <div class="col-sm-4 news-tabs">
                            <p class="news-tabs__title h2">最新预警</p>
                            <div id="demo" style="overflow:hidden;height:350px;width:450px;">
                                <ul id="demo1" class="news-tabs__nav nav nav-tabs shadow_text" role="tablist">

                                    <?php if(is_array($warn)): foreach($warn as $key=>$v): ?><li role="presentation" class="active">
                                            <a href="" role="tab" data-toggle="tab">
                                                <span class="time"><?php echo ($v['tm']); ?></span>
                                                <?php echo ($v['content']); ?>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                </ul>
                                <div id="demo2"></div>
                            </div>
                        </div>
                        <!-- END Nav tabs -->
                    </div>
                </div>
            </div>
            <!-- END header slider -->

            <section class="wrap wrap_gray">
                <div class="brilliant-section">
                    <div class="container">
                        <!-- <h2>常用功能</h2> -->
                        <!-- <h5>农业气象的常用工具</h5> -->
                        <div class="brilliant-grids">
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-cog" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>旗县区天气预报</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-cloud" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>气象灾害预警</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-signal" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>信息留言板及专家回答</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="brilliant-grids">
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-globe" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>农田小气候实况监测和评估</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-link" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>果树小气候实况监测和评估</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 brilliant-grid">
                                <div class="brilliant-left">
                                    <i class="glyphicon glyphicon-phone" aria-hidden="true"></i>
                                </div>
                                <div class="brilliant-right">
                                    <h4>数据查询</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- top news-->
        <div id="page2" class="page">
            <section>
                <!-- top news -->
                <!-- title -->
                <div class="wrap wrap_white">
                    <div class="container title">
                        <h1 class="title__h1 underscore">最新实况</h1>
                    </div>
                </div>
                <!-- END title -->
                <div class="wrap wrap_gray pt20">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="thumbnail thumbnail_big">
                                    <img src="img/content/kac.png" height="350" width="560" alt="News">
                                    <div class="caption thumbnail__caption">
                                        <div class="news caption__news">
                                            <p class="news__category yellow-line">温度</p>
                                            <p class="news__desc">最高温度：30°C</p>
                                            <p class="news__desc">最高温度：30°C</p>

                                            <p class="news__desc">最高温度：30°C</p>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumbnail thumbnail_small">
                                    <a href="news.html" class="thumbnail__link">
                                        <img src="img/content/k2.png" height="153" width="270" alt="News">
                                    </a>
                                    <div class="caption thumbnail__caption">
                                        <div class="news caption__news">
                                            <p class="news__category yellow-line">湿度</p>
                                            <a href="news.html" class="news__link">
                                                <p class="news__text">Еhe world's economy is improving and good times</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumbnail thumbnail_small">
                                    <a href="news.html" class="thumbnail__link">
                                        <img src="img/content/k2.png" height="153" width="270" alt="News">
                                    </a>
                                    <div class="caption thumbnail__caption">
                                        <div class="news caption__news">
                                            <p class="news__category yellow-line">土壤温度</p>
                                            <a href="news.html" class="news__link">
                                                <p class="news__text">The euro needs to everyone in a large amount</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumbnail thumbnail_small">
                                    <a href="news.html" class="thumbnail__link">
                                        <img src="img/content/k2.png" height="153" width="270" alt="News">
                                    </a>
                                    <div class="caption thumbnail__caption">
                                        <div class="news caption__news">
                                            <p class="news__category yellow-line">湿度</p>
                                            <a href="news.html" class="news__link">
                                                <p class="news__text">NEWS: People began to love each other in large numbers online (Video)</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="thumbnail thumbnail_small">
                                    <a href="news.html" class="thumbnail__link">
                                        <img src="img/content/k2.png" height="153" width="270" alt="News">
                                    </a>
                                    <div class="caption thumbnail__caption">
                                        <div class="news caption__news">
                                            <p class="news__category yellow-line">二氧化碳</p>
                                            <a href="news.html" class="news__link">
                                                <p class="news__text">Athletes are confident of victory in all competitions</p>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
            </section>
            <!-- /top news -->



<!-- <script src="js/jquery.mousewheel.min.js"></script> -->
<!-- <script src="js/jquery.fullPage.js"></script> -->
    <script type="text/javascript">
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
            //setTimeout("main.style.top = now + 'px'",1000);     javascript 实现动画效果
        }
    </script>
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
    </div>  <!--main-->
</div>
<!-- END Footer -->
<script src="/Public/assets/js/jquery.js"></script>
<script src="/Public/assets/js/bootstrap.min.js"></script>
<script src="/Public/assets/js/echarts.js"></script>
<script src="/Public/assets/js/main.js"></script>
<script type="text/javascript" src="/Public/assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/Public/assets/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
</body>
</html>