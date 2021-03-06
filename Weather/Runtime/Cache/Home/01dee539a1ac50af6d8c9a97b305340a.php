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
                <h1 class="title__h1 underscore">最新天气情况</h1>
            </div>
        </div>
        <!-- END title -->
        <div class="wrap wrap_gray pt20">
            <div class="container">
                <div class="row">
                    <div class="wrap-thumbnail">
                        <div class="thumbnail">
                            <div class="thumbnail__news news">
                                <p class="news__category" id="realinfo"><?php echo ($now); ?> <?php echo ($station); ?></p>
                                <div class="table-responsive">
                                    <div>
                                        <form action="/index/show_table" class="form-inline" id="wtform" method="post">
                                            <div class="form-group pick">
                                                <label for="dtp_input2" class="col-md-1 control-label">日期</label>

                                                <div class="input-group date form_date col-md-8" data-date=""
                                                     data-date-format="yyyy-mm-dd"
                                                     data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                    <input class="form-control" size="16" type="text" value="<?php echo ($day1); ?>" readonly>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                                <input type="hidden" id="dtp_input2" value="<?php echo ($day1); ?>" name="sdate1"/>
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
                                            <button id="btnsub" type="submit" class="btn btn-primary btn-orange pull-right">刷新
                                            </button>
                                        </form>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" style="margin-bottom: 200px;">
                                        <thead>
                                        <tr>
                                            <th colspan="2">地区</th>
                                            <th colspan="7">过去7天天气实况</th>
                                            <th colspan="3">未来3天天气预报</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th><?php echo ($res[0]['time']); ?></th>
                                            <th><?php echo ($res[1]['time']); ?></th>
                                            <th><?php echo ($res[2]['time']); ?></th>
                                            <th><?php echo ($res[3]['time']); ?></th>
                                            <th><?php echo ($res[4]['time']); ?></th>
                                            <th><?php echo ($res[5]['time']); ?></th>
                                            <th><?php echo ($res[6]['time']); ?></th>

                                            <th id="t1"><?php echo ($res_f[0]['time']); ?></th>
                                            <th id="t2"><?php echo ($res_f[1]['time']); ?></th>
                                            <th id="t3"><?php echo ($res_f[2]['time']); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th rowspan="5">包头</th>
                                            <td rowspan="1">最高温度</td>
                                            <th><?php echo ($res[0]['max']); ?></th>
                                            <th><?php echo ($res[1]['max']); ?></th>
                                            <th><?php echo ($res[2]['max']); ?></th>
                                            <th><?php echo ($res[3]['max']); ?></th>
                                            <th><?php echo ($res[4]['max']); ?></th>
                                            <th><?php echo ($res[5]['max']); ?></th>
                                            <th><?php echo ($res[6]['max']); ?></th>
                                            <td id="m1"><?php echo ($res_f[0]['max']); ?></td>
                                            <td id="m2"><?php echo ($res_f[1]['max']); ?></td>
                                            <td id="m3"><?php echo ($res_f[2]['max']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>最低温度</td>
                                            <th><?php echo ($res[0]['min']); ?></th>
                                            <th><?php echo ($res[1]['min']); ?></th>
                                            <th><?php echo ($res[2]['min']); ?></th>
                                            <th><?php echo ($res[3]['min']); ?></th>
                                            <th><?php echo ($res[4]['min']); ?></th>
                                            <th><?php echo ($res[5]['min']); ?></th>
                                            <th><?php echo ($res[6]['min']); ?></th>
                                            <td id="n1"><?php echo ($res_f[0]['min']); ?></td>
                                            <td id="n2"><?php echo ($res_f[1]['min']); ?></td>
                                            <td id="n3"><?php echo ($res_f[2]['min']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>降水量（毫米）</td>
                                            <th><?php echo ($res[0]['water']); ?></th>
                                            <th><?php echo ($res[1]['water']); ?></th>
                                            <th><?php echo ($res[2]['water']); ?></th>
                                            <th><?php echo ($res[3]['water']); ?></th>
                                            <th><?php echo ($res[4]['water']); ?></th>
                                            <th><?php echo ($res[5]['water']); ?></th>
                                            <th><?php echo ($res[6]['water']); ?></th>
                                            <th colspan="3"></th>

                                        </tr>
                                        <tr>
                                            <td>天空状况</td>
                                            <th colspan="7"></th>

                                            <td id="s1"><?php echo ($sky[0]['st']); ?></td>
                                            <td id="s2"><?php echo ($sky[1]['st']); ?></td>
                                            <td id="s3"><?php echo ($sky[2]['st']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>图标</td>
                                            <th colspan="7"></th>

                                            <td id="i1"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[0]['icon']); ?>" alt="" /></td>
                                            <td id="i2"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[1]['icon']); ?>" alt="" /></td>
                                            <td id="i3"><img height="50" width="50" src="/Public/assets/images/picweather/<?php echo ($sky[2]['icon']); ?>" alt="" /></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
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

    <script type="text/javascript">
        var form = $('#realform');
        form.Validform({
            btnSubmit: "#realsub",
            ajaxPost: true,
            callback: function (data) {
                if (data.status) {
//                    console.log(data.now);
                    $('#realinfo').text(data.now + '时' + ' ' + data.location + "---" + data.station);
                    $('#realtable').html(
                            '<tr> <th>#</th> <th>农作物</th> <th>发育期</th> <th>空气温度(100厘米)</th> <th>空气湿度</th> <th>土壤温度(-10厘米)</th> <th>土壤湿度(-10厘米)</th> <th>太阳辐射</th> <!-- <th>二氧化碳</th> --> </tr> <tr> <th>#</th> <th></th> <th></th> <th>' + data.resnum["airtmp"] + '</th> <th>' + data.resnum["airwet"] + '</th> <th>' + data.resnum["landtmp"] + '</th> <th>' + data.resnum["landwet"] + '</th> <th>' + data.resnum["sun"] + '</th> <!-- <th></th> --> </tr>'

                    );
                    var str = '';
                    for (var a in data.res) {
//                        console.log(data.res[a]);
                        str += '<tr>' + '<td>' + a + '</td>';
                        if (data.res[a]['name']) {
                            str += "<td>" + data.res[a]['name'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }

                        if (data.res[a]['huaqi']) {
                            str += "<td>" + data.res[a]['huaqi'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }

                        if (data.res[a]['air']) {
                            str += "<td>" + data.res[a]['air'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }

                        if (data.res[a]['airwet']) {
                            str += "<td>" + data.res[a]['airwet'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }

                        if (data.res[a]['land']) {
                            str += "<td>" + data.res[a]['land'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }
                        if (data.res[a]['landwet']) {
                            str += "<td>" + data.res[a]['landwet'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }
                        if (data.res[a]['sun']) {
                            str += "<td>" + data.res[a]['sun'] + "</td>";
                        } else {
                            str += "<td>" + "未到预定值" + "</td>";
                        }


                        str += "</tr>";


                    }

//                                            console.log(str);
                    $('#realtb').html(str);

                } else {
                    $('#removetb').html('<div class="alert alert-info" role="alert">此地区没有此站点, 请确认后再查询</div>');
                }
            }
        })
    </script>
    <script>
        $("#Validform_msg").remove();
    </script>



</body>
</html>