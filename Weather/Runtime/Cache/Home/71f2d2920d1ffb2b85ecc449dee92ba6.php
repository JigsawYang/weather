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
<div class="wrapper-sticky-footer">
    <div class="content-sticky">
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
        <!-- END header -->
        <!-- content-->
        <!-- title -->
        <div class="container">
            <?php  if ($flag == 0) { ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>提示: </strong> <?php echo ($info); ?>
            </div>
            <?php } elseif ($flag == 1) { ?>
            <?php } else { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>提示: </strong> <?php echo ($info); ?>
            </div>
            <?php } ?>
                <form class="form-horizontal form-signin" id="signup-form" method="post" action="<?php echo U('register/index');?>">
                <label for="username" class="sr-only">注册名</label>
                <div class="input-group input-group-lg formp col-sm-12">
                    <input type="text" id="username" name="username" class="form-control" placeholder="注册名：至少3位字母，最多7位" required autofocus>
                    <div class="col-xs-4 form-control-static tip"></div>

                </div>
                <label for="password" class="sr-only">密码</label>
                <div class="input-group input-group-lg formp col-sm-12">
                    <input type="password" id="password" name="password" class="form-control" placeholder="密码: 至少6位数字" required>
                    <div class="col-xs-4 form-control-static tip"></div>

                </div>
                <label for="repassword" class="sr-only">确认密码</label>
                <div class="input-group input-group-lg formp col-sm-12">
                    <input type="password" id="repassword" name="repassword" class="form-control" placeholder="确认密码" required>
                    <div class="col-xs-4 form-control-static tip"></div>

                </div>
                        <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me"> Remember me
                  </label>
                </div> -->
                <div class="input-group input-group-lg formp col-sm-12">


                    <button class="btntop btn btn-lg btn-orange btn-block signup-submit" type="submit">立即注册</button>
            </div>
            </form>

        </div>
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
        <!-- END Footer -->
        <!-- All JavaScript libraries -->
        <script src="/Public/assets/js/jquery.js"></script>
        <script src="/Public/assets/js/bootstrap.min.js"></script>
        <script src="/Public/assets/js/validata.js"></script>

        <!-- Custom JavaScript -->
        <script src="/Public/assets/js/main.js"></script>
        <script>
            var form = $('#signup-form');
//            form.sdkFocus();
            form.Validform({
                btnSubmit: ".signup-submit",
                tiptype: function (info, o) {
                    var tip = o.obj.closest('.input-group').find('.tip');
                    var html = '';
                    switch (o.type) {
                        case 2:
                            html = '<p class="text-success"><i class="fa fa-check-circle fa-2x"></i></p>';
                            break;
                        case 3:
                            html = '<p class="text-danger">' + info + '</p>';
                            break;
                        default:
                            html = info;
                    }
                    tip.html(html);
                }
            }).addRule([
                {
                    ele: "#username",
                    datatype: "s6-18",
                    nullmsg: "请输入用户名",
                    errormsg: "用户名长度在6~18之间"
                },
                {
                    ele: "#password",
                    datatype: "s6-16",
                    nullmsg: "请输入密码",
                    errormsg: "密码长度在6~18之间"
                },
                {
                    ele: "#repassword",
                    datatype: "*",
                    recheck: "password",
                    nullmsg: "请再输入一次密码",
                    errormsg: "两次输入的账号密码不一致"
                }
            ]);
        </script>
</body>
</html>