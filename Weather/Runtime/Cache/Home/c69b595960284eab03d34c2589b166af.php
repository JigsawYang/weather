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
                                        <a href="">农业气象服务信息
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
            
    <!-- END header -->
    <!-- content-->
    <!-- title -->
    <div class="wrap wrap_white">
        <div class="container title">
            <h1 class="title__h1 underscore">温室小气候统计报表</h1>
        </div>
    </div>
    <!-- END title -->
    <div class="wrap wrap_gray pt20">
        <div class="container">
            <div class="row">
                <div class="wrap-thumbnail">
                    <div class="thumbnail">
                        <div class="thumbnail__news news">

                            <div>
                                <form action="/accont/index" class="form-inline" id="acount_form" method="post">
                                    <div class="form-group pick">
                                        <label for="dtp_input1" class="col-md-1 control-label">开始</label>

                                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd"
                                             data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" value="<?php echo ($now1); ?>" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                        <input type="hidden" id="dtp_input1" value="<?php echo ($now1); ?>" name="sdate1"/>
                                        <br/>
                                    </div>

                                    <div class="form-group pick">
                                        <label for="dtp_input2" class="col-md-1 control-label">结束</label>

                                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd"
                                             data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" value="<?php echo ($now2); ?>" readonly>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="<?php echo ($now2); ?>" name="sdate2"/>
                                        <br/>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="设施编号" aria-describedby="basic-addon1" name="station">
                                    </div>
                                    <!--<div class="form-group slwidth">-->
                                        <!--<select class="form-control" name="station">-->
                                            <!--<?php foreach ($stlist as $key => $v) { ?>-->
                                            <!--<?php if ($st == $v['id']) { ?>-->
                                            <!--<option value="<?php echo ($v['id']); ?>" selected><?php echo ($v['location']); ?>--<?php echo ($v['zdmc']); ?></option>-->
                                            <!--<?php } else { ?>-->
                                            <!--<option value="<?php echo ($v['id']); ?>"><?php echo ($v['location']); ?>--<?php echo ($v['zdmc']); ?></option>-->
                                            <!--<?php } ?>-->
                                            <!--<?php } ?>-->
                                        <!--</select>-->
                                    <!--</div>-->
                                    <button id="btnsub" type="submit" class="btn btn-orange pull-right">刷新</button>
                                </form>
                            </div>
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>自动统计要素</th>
                                    <th></th>
                                    <th>自动统计项目</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--150cm-->
                                <tr>
                                    <th rowspan="6">150厘米</th>
                                    <td rowspan="3">空气温度</td>
                                    <td>极端最高气温 <?php echo ($air['air150tpg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低气温 <?php echo ($air['air150tpd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均温度 <?php echo ($air['air150tpav']); ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">空气湿度</td>
                                    <td>极端最高相对湿度 <?php echo ($air['air150wetg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低相对湿度 <?php echo ($air['air150wetd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均湿度 <?php echo round($air['air150wetav']); ?></td>
                                </tr>


                                <tr>
                                    <th rowspan="6">100厘米</th>
                                    <td rowspan="3">空气温度</td>
                                    <td>极端最高气温 <?php echo ($air['air50tpg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低气温 <?php echo ($air['air50tpd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均温度 <?php echo ($air['air50tpav']); ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">空气湿度</td>
                                    <td>极端最高相对湿度 <?php echo ($air['air50wetg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低相对湿度 <?php echo ($air['air50wetd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均湿度 <?php echo round($air['air50wetav']); ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="6">0厘米</th>
                                    <td rowspan="3">土壤温度</td>
                                    <td>极端最高温度 <?php echo ($land['land0tpg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低温度 <?php echo ($land['land0tpd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均温度 <?php echo ($land['land0tpav']); ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">土壤湿度</td>
                                    <td>极端最高相对湿度 <?php echo ($land['land0wetg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低相对湿度 <?php echo ($land['land0wetd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均湿度 <?php echo round($land['land0wetav']); ?></td>
                                </tr>


                                <tr>
                                    <th rowspan="6">-10厘米</th>
                                    <td rowspan="3">土壤温度</td>
                                    <td>极端最高温度 <?php echo ($land['land10tpg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低温度 <?php echo ($land['land10tpd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均温度 <?php echo ($land['land10tpav']); ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">土壤湿度</td>
                                    <td>极端最高相对湿度 <?php echo ($land['land10wetg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低相对湿度 <?php echo ($land['land10wetd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均湿度 <?php echo round($land['land10wetav']); ?></td>
                                </tr>

                                <tr>
                                    <th rowspan="6">-20厘米</th>
                                    <td rowspan="3">土壤温度</td>
                                    <td>极端最高温度 <?php echo ($land['land20tpg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低温度 <?php echo ($land['land20tpd']); ?></td>
                                </tr>
                                <tr>
                                    <td>平均温度 <?php echo ($land['land20tpav']); ?></td>
                                </tr>
                                <tr>
                                    <td rowspan="3">土壤湿度</td>
                                    <td>极端最高相对湿度 <?php echo ($land['land20wetg']); ?></td>
                                </tr>
                                <tr>
                                    <td>极端最低相对湿度 <?php echo round($land['land20wetd']); ?> </td>
                                </tr>
                                <tr>
                                    <td>平均湿度 <?php echo round($land['land20wetav']); ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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