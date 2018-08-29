<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            <!-- Header -->
            <header id="header" class="header">
                <div class="header__top">
                    <div class="container">
                        <?php  if (session('download') == 1) { ?>
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
                                                <!--<a href="category.html">室外实况数据</a>-->
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
                                        <a href="/accont">数据统计</a>
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
            <!-- END header -->
            
    <!-- Content-->
    <div class="wrap-error">
        <div class="error clearfix">
            <div class="error__left">
                <p class="error__text">404</p>
            </div>
            <div class="error__right">
                <div class="error__head">Page not found...</div>
                <p class="error__text">We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it we'll try to fix it. In the meantime, try one of this options:</p>
                <ul class="error__list">

                    <li>
                        <a href="/" class="link">Go to homepage</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END content-->

            <!-- Footer -->
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


</body>
</html>