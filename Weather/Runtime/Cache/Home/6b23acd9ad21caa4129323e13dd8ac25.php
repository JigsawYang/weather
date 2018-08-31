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
            
    <!-- END header -->
    <!-- content-->
    <!-- title -->
    <div class="wrap wrap_white">
        <div class="container title">
            <h1 class="title__h1 underscore">农田小气候实况监测报警信息</h1>
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
                                <form action="/landwarning" class="form-inline" id="wtform" method="post">
                                    <div class="form-group pick">
                                        <label for="dtp_input2" class="col-md-1 control-label">日期</label>

                                        <div class="input-group date form_date col-md-8" data-date=""
                                             data-date-format="yyyy-mm-dd"
                                             data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="16" type="text" value="<?php echo ($day); ?>" readonly>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                        </div>
                                        <input type="hidden" id="dtp_input2" value="<?php echo ($day); ?>" name="sdate1"/>
                                        <br/>
                                    </div>
                                    <div class="form-group slwidth">
                                        <select class="form-control" id="qulist" name="qustation" autocomplete="off">
                                            <?php foreach ($stlist as $key => $v) { ?>
                                            <?php if ($st == $v['xzqh_id']) { ?>
                                            <option value="<?php echo ($v['xzqh_id']); ?>" selected><?php echo ($v['xzqh_name']); ?></option>
                                            <?php } else { ?>
                                            <option value="<?php echo ($v['xzqh_id']); ?>"><?php echo ($v['xzqh_name']); ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group slwidth" id="xilist">
                                        <select class="form-control" name="station">
                                            <!--<option value=""></option>-->
                                            <!--<?php foreach ($stlist as $key => $v) { ?>-->
                                            <!--<option value="<?php echo ($v['id']); ?>"><?php echo ($v['location']); ?></option>-->
                                            <!--<?php } ?>-->
                                        </select>
                                    </div>
                                    <!--<a href="/index/show_table" class="btn btn-primary pull-right" id="tb-btn">表格</a>-->
                                    <button id="btnsub" type="submit" class="btn btn-primary btn-orange pull-right">刷新
                                    </button>
                                </form>
                            </div>
                            <p class="news__category"><?php echo ($now); ?>时 <?php echo ($station); ?> 地区作物冷害报警信息</p>

                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>冷害程度</th>
                                    <th>服务提示</th>
                                    <th>受冷害影响的作物及生长期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($cold) { ?>
                                <?php if(is_array($cold)): foreach($cold as $key=>$v): ?><tr>
                                        <td><?php echo ($v['dis']); ?></td>
                                        <td>当前室外气温过低，部分农作物将遭受冷害影响，请视具体情况适当采取御寒保温措施</td>
                                        <td><?php echo ($v['plantdis']); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                <?php } else { ?>
                                <tr>
                                    <td>没有受害作物</td>
                                    <!--<td>当前室内气温过低，部分农作物将遭受冻害影响，请视具体情况适当采取御寒保温措施</td>-->
                                    <!--<td>没有受害作物</td>-->
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            <p class="news__category"><?php echo ($now); ?>时 <?php echo ($station); ?> 地区作物霜冻报警信息</p>

                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>霜冻程度</th>
                                    <th>服务提示</th>
                                    <th>受霜冻影响的作物及生长期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($ice) { ?>
                                <?php if(is_array($ice)): foreach($ice as $key=>$v): ?><tr>
                                        <td><?php echo ($v['dis']); ?></td>
                                        <td>当前室外气温过低，部分农作物将遭受霜冻影响，请视具体情况适当采取御寒保温措施</td>
                                        <td><?php echo ($v['plantdis']); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                <?php } else { ?>
                                <tr>
                                    <td>没有受害作物</td>
                                    <!--<td>当前室内气温过低，部分农作物将遭受冻害影响，请视具体情况适当采取御寒保温措施</td>-->
                                    <!--<td>没有受害作物</td>-->
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <p class="news__category"><?php echo ($now); ?>时 <?php echo ($station); ?> 地区作物热害报警信息</p>

                            <!--<h4 class="margin-bottom-15 st"><?php echo ($now); ?> <?php echo ($station[0]); ?>--<?php echo ($station[1]); ?> 结构温室作物热害报警信息</h4>-->
                            <!--<h4 class="station-head"><?php echo ($station); ?></h4>-->
                            <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>服务提示</th>
                                    <th>受热害影响的作物及生长期</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($hot) { ?>
                                <?php if(is_array($hot)): foreach($hot as $key=>$v): ?><tr>
                                        <td>当前室内气温过高，部分农作物将受到热害影响，请视具体情况适当采取通风、喷水、浇灌等降温措施</td>
                                        <td><?php echo ($v['plantdis']); ?></td>
                                    </tr><?php endforeach; endif; ?>
                                <?php } else { ?>
                                <tr>
                                    <!--<td>当前室内气温过高，部分农作物将受到热害影响，请视具体情况适当采取通风、喷水、浇灌等降温措施</td>-->
                                    <td>没有受害作物</td>
                                </tr>
                                <?php } ?>
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

    <script>
        function getxilist(){
            var brandId = $("select[name=qustation]").val();
            console.log(brandId);
            $("select[name=station]").empty();		//清空
            $.ajax({url:'/landwarning/getxian',
                type:"post",
                data:{
                    quid : brandId
                },
                cache: false,
                error:function(){
                },
                success:function(data){
                    var modelList = data.res;
                    if(modelList && modelList.length != 0){
                        for(var i=0; i<modelList.length; i++){
                            var option="<option value=\""+modelList[i].zd_code+"\"";
//                            if(_LastModelId && _LastModelId==modelList[i].zd_code){
//                                option += " selected=\"selected\" "; //默认选中
//                                _LastModelId=null;
//                            }
                            option += ">"+modelList[i].zd_name+"</option>";  //动态添加数据
                            $("select[name=station]").append(option);
                        }
                    }
                }
            });
        }
        $("#qulist").change(function(){
            getxilist();
        });
    </script>


</body>
</html>