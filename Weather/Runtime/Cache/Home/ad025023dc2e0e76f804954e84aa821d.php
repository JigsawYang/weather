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
    <!-- END custom CSS -->
    <!--<![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/Public/assets/js/html5shiv.min.js"></script>
    <script src="/Public/assets/js/respond.min.js"></script>
    <![endif]-->
    <title></title>
</head>
<body>
<div class="wrapper-sticky-footer">
    <div class="content-sticky">
        <!-- Header -->
        <header id="header" class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="wrap-logo">
                                <p class="ptitle">包头市现代智慧农业服务系统</p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="wrap-login">
                                <a class="alogin" href="">登录 |</a>
                                <a class="alogin" href="">注册</a>

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
                                    <a href="../index.html">实况数据</a>
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
        <!-- END header -->
        <!-- content-->
        <!-- title -->
        <div class="container">
            <?php  if (session('mes') != 1 && session('mes') != null) { ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>提示: </strong> <?php echo session('mes'); ?>
            </div>
            <?php } ?>
            <form class="form-horizontal form-signin" id="signup-form" method="post" action="<?php echo U('login/signin');?>">
                <label for="username" class="sr-only">用户名</label>
                <div class="input-group input-group-lg formp col-sm-12">
                    <input type="text" id="username" name="username" class="form-control" placeholder="请输入用户名" required autofocus>
                    <div class="col-xs-4 form-control-static tip"></div>

                </div>
                <label for="password" class="sr-only">密码</label>
                <div class="input-group input-group-lg formp col-sm-12">
                    <input type="password" id="password" name="password" class="form-control" placeholder="请输入密码" required>
                    <div class="col-xs-4 form-control-static tip"></div>

                </div>

                <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
                <div class="input-group input-group-lg formp col-sm-12">


                    <button class="btntop btn btn-lg btn-orange btn-block signup-submit" type="submit">登陆</button>
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
        <script src="/Public/assets/js/jquery/3.1.1/jquery.js"></script>
        <script src="/Public/assets/js/bootstrap.min.js"></script>
        <!-- Custom JavaScript -->
        <script src="/Public/assets/js/main.js"></script>
</body>
</html>