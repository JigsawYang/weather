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
    <title>包头市现代智慧农业服务系统</title>
</head>
<body>
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
                                        <a href="">设施气象评估及报警预警
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="wsmenu-submenu">
                                            <li>
                                                <a href="/realassessment">温室实况作物影响评估</a>
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
            
        <!-- END header -->
        <!-- content-->
        <!-- title -->
        <div class="wrap wrap_white">
            <div class="container title">
                <h1 class="title__h1 underscore">实况数据</h1>
            </div>
        </div>

        <!-- END title -->
        <div class="wrap wrap_gray pt20">
            <div class="container">
                <div class="row">
                    <div>
                        <form action="/livedata/getdata" class="form-inline" id="wtform" method="post">
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
                                <select class="form-control" name="station">
                                    <?php foreach ($stlist as $key => $v) { ?>
                                    <option value="<?php echo ($v['id']); ?>"><?php echo ($v['location']); ?>--<?php echo ($v['zdmc']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <!--<a href="/index/show_table" class="btn btn-primary pull-right" id="tb-btn">表格</a>-->
                            <button id="btnsub" type="submit" class="btn btn-primary btn-orange pull-right">刷新</button>
                        </form>
                    </div>
                    <div class="wrap-thumbnail">
                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">温度</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="tempreture" style="height:370px">

                                </div>
                            </div>
                        </div>

                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">空气湿度</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="air" style="height:370px">

                                </div>
                            </div>
                        </div>

                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">土壤温度</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="land" style="height:370px">

                                </div>
                            </div>
                        </div>

                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">土壤湿度</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="ldwt" style="height:370px">

                                </div>
                            </div>
                        </div>

                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">太阳辐射</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="sun" style="height:370px">

                                </div>
                            </div>
                        </div>

                        <div class="thumbnail">
                            <div class="thumbnail__news news" style="height: 450px;">
                                <p class="news__category underscore">二氧化碳浓度</p>
                                <div class="col-md-12 col-sm-12 tpblock" id="co2" style="height:370px">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END content-->
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
                    var tmp = <?php echo ($tmp); ?>;
//                    console.log(linenumw);
                    if (tmp.length != 0) {
                        var dom_tmp = ec.init(document.getElementById('tempreture'));
                        var tmptime = [];
                        var linenum1 = [];
                        var linenum2 = [];
//                        var lineout = linenumw;

                        for (var val in tmp) {
                            tmptime.push(tmp[val]['time']);
                            linenum1.push(parseInt(tmp[val]['ta_cu']) / 10);
                            linenum2.push(parseInt(tmp[val]['ta_cd']) / 10);
                        }
//                        console.log(linenum1);
                        tmp_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',
                                text: '<?php echo ($sdate); ?>温度',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['150cm气温','100cm气温']
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
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: tmptime
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value} °C'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: '150cm气温',
                                    type: 'line',
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
                                    name: '100cm气温',
                                    type: 'line',
                                    data: linenum2,
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
                                }

                            ]
                        };
                        dom_tmp.setOption(tmp_op);
                    } else {
                        $('#tempreture').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    //空气
                    var air = <?php echo ($air); ?>;
                    if (air.length != 0) {
                        var dom_air = ec.init(document.getElementById('air'));
                        var airtime = [];
                        var airnum = [];
                        for (var val in air) {
                            airtime.push(air[val]['time']);
                            airnum.push(parseInt(air[val]['rh_c']));
                        }
                        air_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',
                                text: '<?php echo ($sdate); ?>空气湿度',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['空气湿度']
                            },
                            toolbox: {
                                show: true,
                                feature: {
//                                    mark: {show: true},
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: airtime
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value}'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: '空气湿度',
                                    type: 'line',
                                    data: airnum,
                                    markPoint: {
                                        data: [
                                            {type: 'max', name: '最大值'},
                                            {type: 'min', name: '最小值'}
                                        ]
                                    }
//                                    markLine: {
//                                        data: [
//                                            {type: 'average', name: '平均值'}
//                                        ]
//                                    }
                                }

                            ]
                        };
                        dom_air.setOption(air_op);
                    } else {
                        $('#air').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    //土地
                    var land = <?php echo ($land); ?>;
                    if (land.length != 0) {
                        var dom_land = ec.init(document.getElementById('land'));
                        var landtime = [];
                        var landnum1 = [];
                        var landnum2 = [];
                        var landnum3 = [];

                        for (var val in land) {
                            landtime.push(land[val]['time']);
                            landnum1.push(parseInt(land[val]['ts_u']) / 10);
                            landnum2.push(parseInt(land[val]['ts_m']) / 10);
                            landnum3.push(parseInt(land[val]['ts_d']) / 10);
                        }

                        land_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',
                                text: '<?php echo ($sdate); ?>土壤温度',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['0cm温度','-10cm温度','-20cm温度']
                            },
                            toolbox: {
                                show: true,
                                feature: {
//                                    mark: {show: true},
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: landtime
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value} °C'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: '0cm温度',
                                    type: 'line',
                                    data: landnum1,
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
                                    name: '-10cm温度',
                                    type: 'line',
                                    data: landnum2,
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
                                    name: '-20cm温度',
                                    type: 'line',
                                    data: landnum3,
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
                                }
                            ]
                        };
                        dom_land.setOption(land_op);
                    } else {
                        $('#land').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    //土壤湿度
                    var ldwt = <?php echo ($ldwt); ?>;
                    if (ldwt.length != 0) {
                        var dom_ldwt = ec.init(document.getElementById('ldwt'));
                        var ldwttime = [];
                        var ldwtnum1 = [];
                        var ldwtnum2 = [];
                        var ldwtnum3 = [];

                        for (var val in ldwt) {
                            ldwttime.push(ldwt[val]['time']);
                            ldwtnum1.push(parseInt(ldwt[val]['sh_u']));
                            ldwtnum2.push(parseInt(ldwt[val]['sh_m']));
                            ldwtnum3.push(parseInt(ldwt[val]['sh_d']));
                        }

                        ldwt_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',

                                text: '<?php echo ($sdate); ?>土壤湿度',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['0cm湿度','-10cm湿度','-20cm湿度']
                            },
                            toolbox: {
                                show: true,
                                feature: {
//                                    mark: {show: true},
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: ldwttime
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value}'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: '0cm湿度',
                                    type: 'line',
                                    data: ldwtnum1,
                                    markPoint: {
                                        data: [
                                            {type: 'max', name: '最大值'},
                                            {type: 'min', name: '最小值'}
                                        ]
                                    }
//                                    markLine: {
//                                        data: [
//                                            {type: 'average', name: '平均值'}
//                                        ]
//                                    }
                                },
                                {
                                    name: '-10cm湿度',
                                    type: 'line',
                                    data: ldwtnum2,
                                    markPoint: {
                                        data: [
                                            {type: 'max', name: '最大值'},
                                            {type: 'min', name: '最小值'}
                                        ]
                                    }
//                                    markLine: {
//                                        data: [
//                                            {type: 'average', name: '平均值'}
//                                        ]
//                                    }
                                },
                                {
                                    name: '-20cm湿度',
                                    type: 'line',
                                    data: ldwtnum3,
                                    markPoint: {
                                        data: [
                                            {type: 'max', name: '最大值'},
                                            {type: 'min', name: '最小值'}
                                        ]
                                    }
//                                    markLine: {
//                                        data: [
//                                            {type: 'average', name: '平均值'}
//                                        ]
//                                    }
                                }
                            ]
                        };
                        dom_ldwt.setOption(ldwt_op);
                    } else {
                        $('#ldwt').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    //辐射
                    var sun = <?php echo ($sun); ?>;
                    if (sun.length != 0) {
                        var dom_sun = ec.init(document.getElementById('sun'));
                        var suntime = [];
                        var sunnum1 = [];
                        var sunnum2 = [];

                        for (var val in sun) {
                            suntime.push(sun[val]['time']);
                            sunnum1.push(parseInt(sun[val]['r_u']));
                            sunnum2.push(parseInt(sun[val]['par_u']));
                        }

                        sun_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',

                                text: '<?php echo ($sdate); ?>太阳辐射',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['150cm辐射', '有效辐射']
                            },
                            toolbox: {
                                show: true,
                                feature: {
//                                    mark: {show: true},
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: suntime
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value}'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: '150cm辐射',
                                    type: 'line',
                                    data: sunnum1,
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
                                    name: '有效辐射',
                                    type: 'line',
                                    data: sunnum2,
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
                                }
                            ]
                        };
                        dom_sun.setOption(sun_op);
                    } else {
                        $('#sun').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    //CO2
                    var co2 = <?php echo ($co2); ?>;
                    if (co2.length != 0) {
                        var dom_co2 = ec.init(document.getElementById('co2'));
                        var co2time = [];
                        var co2num = [];
                        for (var val in co2) {
                            co2time.push(co2[val]['time']);
                            co2num.push(parseInt(co2[val]['co2_u']));
                        }
                        co2_op = {
                            title: {
                                textStyle: {
                                    fontSize: 14,
                                    fontWeight: 'bolder',
                                    color: '#333'          // 主标题文字颜色
                                },
                                x: 'left',

                                text: '<?php echo ($sdate); ?>二氧化碳浓度',
                                subtext: '实时数据'
                            },
                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                orient: 'vertical',
                                x:'right',
                                data:['co2浓度']
                            },
                            toolbox: {
                                show: true,
                                feature: {
//                                    mark: {show: true},
//                                    dataView: {show: true, readOnly: false},
//                                    magicType: {show: true, type: ['line', 'bar']},
//                                    restore: {show: true},
//                                    saveAsImage: {show: true}
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data: co2time
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value',
                                    axisLabel: {
                                        formatter: '{value}'
                                    }
                                }
                            ],
                            series: [
                                {
                                    name: 'co2浓度',
                                    type: 'line',
                                    data: co2num,
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
                                }

                            ]
                        };
                        dom_co2.setOption(co2_op);
                    } else {
                        $('#co2').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
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
                    if (data.info) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    // 基于准备好的dom，初始化echarts图表
                                    var dom_tmp = ec.init(document.getElementById('tempreture'));

//                                    var outtmp = data.outtmp;
                                    var tmp = data.info;
                                    var dtime = [];
                                    var linenum1 = [];
                                    var linenum2 = [];
//                                    var lineout = [];

                                    for (var val in tmp) {
                                        dtime.push(tmp[val]['time']);
                                        linenum1.push(parseInt(tmp[val]['ta_cu']) / 10);
                                        linenum2.push(parseInt(tmp[val]['ta_cd']) / 10);

                                    }
//                                    for (var val1 in outtmp) {
//                                        lineout.push(parseInt(outtmp[val1]['bc']) / 10);
//
//                                    }
                                    tmp_op = {
                                        title: {
                                            textStyle: {
                                                fontSize: 14,
                                                fontWeight: 'bolder',
                                                color: '#333'          // 主标题文字颜色
                                            },
                                            x: 'left',

                                            text: data.sdate + '温度',
                                            subtext: '实时数据'
                                        },
                                        tooltip: {
                                            trigger: 'axis'
                                        },
                                        legend: {
                                            orient: 'vertical',
                                            x:'right',
                                            data:['150cm气温','100cm气温']
                                        },
                                        toolbox: {
                                            show: true,
                                            feature: {
//                                                mark: {show: true},
//                                                dataView: {show: true, readOnly: false},
//                                                magicType: {show: true, type: ['line', 'bar']},
//                                                restore: {show: true},
//                                                saveAsImage: {show: true}
                                            }
                                        },
                                        calculable: false,
                                        xAxis: [
                                            {
                                                type: 'category',
                                                boundaryGap: false,
                                                data: dtime
                                            }
                                        ],
                                        yAxis: [
                                            {
                                                type: 'value',
                                                axisLabel: {
                                                    formatter: '{value} °C'
                                                }
                                            }
                                        ],
                                        series: [
                                            {
                                                name: '150cm气温',
                                                type: 'line',
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
                                                name: '100cm气温',
                                                type: 'line',
                                                data: linenum2,
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
                                            }

                                        ]
                                    };
                                    dom_tmp.setOption(tmp_op);
                                }
                        );
                    } else {
                        $('#tempreture').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');

                    }
                    if (data.air) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    var air = data.air;
                                    if (air.length != 0) {
                                        var dom_air = ec.init(document.getElementById('air'));
                                        var airtime = [];
                                        var airnum = [];
                                        for (var val in air) {
                                            airtime.push(air[val]['time']);
                                            airnum.push(parseInt(air[val]['rh_c']));
                                        }
                                        air_op = {
                                            title: {
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontWeight: 'bolder',
                                                    color: '#333'          // 主标题文字颜色
                                                },
                                                x: 'left',

                                                text: data.sdate + '空气湿度',
                                                subtext: '实时数据'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                x:'right',
                                                data:['空气湿度']
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
//                                                    mark: {show: true},
//                                                    dataView: {show: true, readOnly: false},
//                                                    magicType: {show: true, type: ['line', 'bar']},
//                                                    restore: {show: true},
//                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: false,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: airtime
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value',
                                                    axisLabel: {
                                                        formatter: '{value}'
                                                    }
                                                }
                                            ],
                                            series: [
                                                {
                                                    name: '空气湿度',
                                                    type: 'line',
                                                    data: airnum,
                                                    markPoint: {
                                                        data: [
                                                            {type: 'max', name: '最大值'},
                                                            {type: 'min', name: '最小值'}
                                                        ]
                                                    }
//                                                    markLine: {
//                                                        data: [
//                                                            {type: 'average', name: '平均值'}
//                                                        ]
//                                                    }
                                                }

                                            ]
                                        };
                                        dom_air.setOption(air_op);
                                    }
                                }
                        );

                    } else {
                        $('#air').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }
                    if (data.land) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    var land = data.land;
                                    if (land.length != 0) {
                                        var dom_land = ec.init(document.getElementById('land'));
                                        var landtime = [];
                                        var landnum1 = [];
                                        var landnum2 = [];
                                        var landnum3 = [];

                                        for (var val in land) {
                                            landtime.push(land[val]['time']);
                                            landnum1.push(parseInt(land[val]['ts_u']) /10);
                                            landnum2.push(parseInt(land[val]['ts_m']) / 10);
                                            landnum3.push(parseInt(land[val]['ts_d']) / 10);
                                        }

                                        land_op = {
                                            title: {
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontWeight: 'bolder',
                                                    color: '#333'          // 主标题文字颜色
                                                },
                                                x: 'left',

                                                text: data.sdate + '土壤温度',
                                                subtext: '实时数据'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                x:'right',
                                                data:['0cm温度','-10cm温度','-20cm温度']
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
//                                                    mark: {show: true},
//                                                    dataView: {show: true, readOnly: false},
//                                                    magicType: {show: true, type: ['line', 'bar']},
//                                                    restore: {show: true},
//                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: false,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: landtime
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value',
                                                    axisLabel: {
                                                        formatter: '{value} °C'
                                                    }
                                                }
                                            ],
                                            series: [
                                                {
                                                    name: '0cm温度',
                                                    type: 'line',
                                                    data: landnum1,
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
                                                    name: '-10cm温度',
                                                    type: 'line',
                                                    data: landnum2,
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
                                                    name: '-20cm温度',
                                                    type: 'line',
                                                    data: landnum3,
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
                                                }
                                            ]
                                        };
                                        dom_land.setOption(land_op);
                                    }
                                }
                        );

                    } else {
                        $('#land').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }
                    if (data.ldwt) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    var ldwt = data.ldwt;
                                    if (ldwt.length != 0) {
                                        var dom_ldwt = ec.init(document.getElementById('ldwt'));
                                        var ldwttime = [];
                                        var ldwtnum1 = [];
                                        var ldwtnum2 = [];
                                        var ldwtnum3 = [];

                                        for (var val in ldwt) {
                                            ldwttime.push(ldwt[val]['time']);
                                            ldwtnum1.push(parseInt(ldwt[val]['sh_u']));
                                            ldwtnum2.push(parseInt(ldwt[val]['sh_m']));
                                            ldwtnum3.push(parseInt(ldwt[val]['sh_d']));
                                        }

                                        ldwt_op = {
                                            title: {
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontWeight: 'bolder',
                                                    color: '#333'          // 主标题文字颜色
                                                },
                                                x: 'left',

                                                text: data.sdate + '土壤湿度',
                                                subtext: '实时数据'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                x:'right',
                                                data:['0cm湿度','-10cm湿度','-20cm湿度']
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
//                                                    mark: {show: true},
//                                                    dataView: {show: true, readOnly: false},
//                                                    magicType: {show: true, type: ['line', 'bar']},
//                                                    restore: {show: true},
//                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: false,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: ldwttime
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value',
                                                    axisLabel: {
                                                        formatter: '{value}'
                                                    }
                                                }
                                            ],
                                            series: [
                                                {
                                                    name: '0cm湿度',
                                                    type: 'line',
                                                    data: ldwtnum1,
                                                    markPoint: {
                                                        data: [
                                                            {type: 'max', name: '最大值'},
                                                            {type: 'min', name: '最小值'}
                                                        ]
                                                    }
//                                                    markLine: {
//                                                        data: [
//                                                            {type: 'average', name: '平均值'}
//                                                        ]
//                                                    }
                                                },
                                                {
                                                    name: '-10cm湿度',
                                                    type: 'line',
                                                    data: ldwtnum2,
                                                    markPoint: {
                                                        data: [
                                                            {type: 'max', name: '最大值'},
                                                            {type: 'min', name: '最小值'}
                                                        ]
                                                    }
//                                                    markLine: {
//                                                        data: [
//                                                            {type: 'average', name: '平均值'}
//                                                        ]
//                                                    }
                                                },
                                                {
                                                    name: '-20cm湿度',
                                                    type: 'line',
                                                    data: ldwtnum3,
                                                    markPoint: {
                                                        data: [
                                                            {type: 'max', name: '最大值'},
                                                            {type: 'min', name: '最小值'}
                                                        ]
                                                    }
//                                                    markLine: {
//                                                        data: [
//                                                            {type: 'average', name: '平均值'}
//                                                        ]
//                                                    }
                                                }
                                            ]
                                        };
                                        dom_ldwt.setOption(ldwt_op);
                                    }
                                }
                        );

                    } else {
                        $('#ldwt').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }
                    if (data.sun) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    var sun = data.sun;
                                    if (sun.length != 0) {
                                        var dom_sun = ec.init(document.getElementById('sun'));
                                        var suntime = [];
                                        var sunnum1 = [];
                                        var sunnum2 = [];

                                        for (var val in sun) {
                                            suntime.push(sun[val]['time']);
                                            sunnum1.push(parseInt(sun[val]['r_u']));
                                            sunnum2.push(parseInt(sun[val]['par_u']));
                                        }

                                        sun_op = {
                                            title: {
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontWeight: 'bolder',
                                                    color: '#333'          // 主标题文字颜色
                                                },
                                                x: 'left',
                                                text: data.sdate + '太阳辐射',
                                                subtext: '实时数据'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                x:'right',
                                                data:['150cm辐射', '有效辐射']
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
//                                                    mark: {show: true},
//                                                    dataView: {show: true, readOnly: false},
//                                                    magicType: {show: true, type: ['line', 'bar']},
//                                                    restore: {show: true},
//                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: false,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: suntime
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value',
                                                    axisLabel: {
                                                        formatter: '{value}'
                                                    }
                                                }
                                            ],
                                            series: [
                                                {
                                                    name: '150cm辐射',
                                                    type: 'line',
                                                    data: sunnum1,
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
                                                    name: '有效辐射',
                                                    type: 'line',
                                                    data: sunnum2,
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
                                                }
                                            ]
                                        };
                                        dom_sun.setOption(sun_op);
                                    }
                                }
                        );

                    } else {
                        $('#sun').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }

                    if (data.co2) {
                        require(
                                [
                                    'echarts',
                                    'echarts/chart/line',// 使用柱状图就加载bar模块，按需加载
                                    'echarts/chart/bar'
                                ],
                                function (ec) {
                                    var co2 = data.co2;
                                    if (co2.length != 0) {
                                        var dom_co2 = ec.init(document.getElementById('co2'));
                                        var co2time = [];
                                        var co2num = [];
                                        for (var val in co2) {
                                            co2time.push(co2[val]['time']);
                                            co2num.push(parseInt(co2[val]['co2_u']));
                                        }
                                        co2_op = {
                                            title: {
                                                textStyle: {
                                                    fontSize: 14,
                                                    fontWeight: 'bolder',
                                                    color: '#333'          // 主标题文字颜色
                                                },
                                                x: 'left',

                                                text: data.sdate + '二氧化碳浓度',
                                                subtext: '实时数据'
                                            },
                                            tooltip: {
                                                trigger: 'axis'
                                            },
                                            legend: {
                                                orient: 'vertical',
                                                x:'right',
                                                data:['co2浓度']
                                            },
                                            toolbox: {
                                                show: true,
                                                feature: {
//                                                    mark: {show: true},
//                                                    dataView: {show: true, readOnly: false},
//                                                    magicType: {show: true, type: ['line', 'bar']},
//                                                    restore: {show: true},
//                                                    saveAsImage: {show: true}
                                                }
                                            },
                                            calculable: false,
                                            xAxis: [
                                                {
                                                    type: 'category',
                                                    boundaryGap: false,
                                                    data: co2time
                                                }
                                            ],
                                            yAxis: [
                                                {
                                                    type: 'value',
                                                    axisLabel: {
                                                        formatter: '{value}'
                                                    }
                                                }
                                            ],
                                            series: [
                                                {
                                                    name: 'co2浓度',
                                                    type: 'line',
                                                    data: co2num,
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
                                                }

                                            ]
                                        };
                                        dom_co2.setOption(co2_op);
                                    }
                                }
                        );

                    } else {
                        $('#co2').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    }


                } else {
                    $('#tempreture').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    $('#air').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    $('#land').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    $('#ldwt').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    $('#sun').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
                    $('#co2').html('<div class="alert alert-info" role="alert">没有此站点数据</div>');
//                    window.location.href = '/';
                }
            }
        });
    </script>
    <script>
        $("#Validform_msg").remove();
    </script>


</body>
</html>