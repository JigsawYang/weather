<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <title>sdk - 后台</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="/Public/front/images/favicon.ico" />
    <!--[if lt IE 9]>
    <script src='/Public/admin/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->
    <link href='/Public/admin/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
    <link href='/Public/admin/stylesheets/bootstrap/bootstrap-responsive.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='/Public/admin/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css' media='all' rel='stylesheet' type='text/css' />
    <link href='/Public/admin/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='/Public/admin/stylesheets/plugins/mention/mention.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <!-- <link href='/Public/admin/stylesheets/plugins/tabdrop/tabdrop.css' media='all' rel='stylesheet' type='text/css' /> -->
    <!-- / datatables -->
    <link href='/Public/admin/stylesheets/plugins/datatables/bootstrap-datatable.css' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
    <link href='/Public/admin/stylesheets/light-theme.css' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='/Public/admin/stylesheets/demo.css' media='all' rel='stylesheet' type='text/css' />
    <!--RBAC列表显示-->
	<link href='/Public/admin/stylesheets/node.css' media='all' rel='stylesheet' type='text/css' />
	    <!-- / 右上角弹出的提示框 -->
    <link href='/Public/admin/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css' media='all' rel='stylesheet' type='text/css' />
      <script>
        var FILE_SERVER_URL = '<?php echo C('FILE_SERVER.url');?>';
      </script>
      <script src='/Public/admin/javascripts/jquery/jquery.min.js' type='text/javascript'></script>

<!-- / jgrowl notifications -->
<link href='/Public/admin/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css' media='all' rel='stylesheet' type='text/css' />
<!-- 此文件内容是左侧的导航 -->
</head>

<body class='contrast-blue main-nav-closed'>
<header>
    <div class='navbar'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='<?php echo U('/admin');?>'> <span class='hidden-phone'>农业气象</span></a><a
                    class='toggle-nav btn pull-left' href='#'> <i class='icon-reorder'></i> </a>
                <ul class='nav pull-right'>
                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <img alt='<?php echo ($currentUser["username"]); ?>' height='20' src='/Public/admin/images/avatar.jpg'
                                 width='20'/>
                            <span class='user-name hidden-phone'><?php echo ($currentUser["username"]); ?></span> <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <li><a href="<?php echo U('/');?>" target="_blank"><i class='icon-home'></i>去前台</a></li>
                            <li><a href="<?php echo U('/admin/login/logout');?>"><i class='icon-signout'></i>退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div id='wrapper'><!-- id='wrapper' -->
    <div id='main-nav-bg'></div>
    <nav class='' id='main-nav'>
        <div class='navigation'>
            <ul class='nav nav-stacked'>
                <li class="<?php echo 'home'==$nav?'active':'';?>">
                    <a href='<?php echo U('/admin');?>'><i class='icon-home'></i><span>首页</span></a>
                </li>
                <li class="<?php echo 'members'==$nav?'active':'';?>">
                    <a class='dropdown-collapse' href='#'> <i class='icon-user'></i> <span>用户</span> <i
                            class='icon-angle-down angle-down'></i> </a>
                    <ul class='<?php echo ' members
                    '==$nav?'in':'';?> nav nav-stacked'>
                <li class="<?php echo 'front'==$tab?'active':'';?>">
                    <a href='<?php echo U('/admin/members/front');?>'> <i class='icon-caret-right'></i> <span>前台</span></a>
                </li>
                <li class="<?php echo 'back'==$tab?'active':'';?>">
                    <a href='<?php echo U('/admin/members');?>'> <i class='icon-caret-right'></i> <span>后台</span></a>
                </li>
            </ul>

            <!--</li>-->
            <li class="<?php echo 'datas'==$nav?'active':'';?>">
                <a class='dropdown-collapse' href='#'> <i class='icon-shield'></i> <span>农业生产建议</span> <i
                        class='icon-angle-down angle-down'></i> </a>
                <ul class='<?php echo ' advise
                '==$nav?'in':'';?> nav nav-stacked'>
            <li class="<?php echo 'datas'==$tab?'active':'';?>">
                <a href='<?php echo U('/admin/advise');?>'> <i class='icon-caret-right'></i> <span>查看并编辑</span></a>
            </li>
            <!--<li class="<?php echo 'recommend'==$tab?'active':'';?>">-->
            <!--<a href='<?php echo U('/admin/datas/index', ['isrecommended' => 1]);?>'> <i class='icon-caret-right'></i>-->
            <!--<span>推荐</span></a>-->
            <!--</li>-->
            <!--<li class="<?php echo 'categories'==$tab?'active':'';?>">-->
            <!--<a href='<?php echo U('/admin/datacategories');?>'> <i class='icon-caret-right'></i> <span>分类</span></a>-->
            <!--</li>-->
            </ul>
            </li>

            <!--<li class="<?php echo 'cate'==$nav?'active':'';?>">-->
                <!--<a class='dropdown-collapse' href='#'> <i class='icon-user'></i> <span>专家</span> <i-->
                        <!--class='icon-angle-down angle-down'></i> </a>-->
                <!--<ul class='<?php echo ' cate'==$nav?'in':'';?> nav nav-stacked'>-->
            <!--&lt;!&ndash;<li class="<?php echo 'cate'==$tab?'active':'';?>">&ndash;&gt;-->
                <!--&lt;!&ndash;<a href='<?php echo U('/admin/expcate');?>'> <i class='icon-caret-right'></i> <span>查看并编辑</span></a>&ndash;&gt;-->
            <!--&lt;!&ndash;</li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li class="<?php echo 'recommend'==$tab?'active':'';?>">&ndash;&gt;-->
            <!--&lt;!&ndash;<a href='<?php echo U('/admin/datas/index', ['isrecommended' => 1]);?>'> <i class='icon-caret-right'></i>&ndash;&gt;-->
            <!--&lt;!&ndash;<span>推荐</span></a>&ndash;&gt;-->
            <!--&lt;!&ndash;</li>&ndash;&gt;-->
            <!--<li class="<?php echo 'categories'==$tab?'active':'';?>">-->
            <!--<a href='<?php echo U('/admin/expcate/cate');?>'> <i class='icon-caret-right'></i> <span>分类</span></a>-->
            <!--</li>-->
            <!--</ul>-->
            <!--</li>-->

            <li class="<?php echo 'datas'==$nav?'active':'';?>">
                <a class='dropdown-collapse' href='#'> <i class='icon-facebook'></i> <span>气象知识科普</span> <i
                        class='icon-angle-down angle-down'></i> </a>
                <ul class='<?php echo ' know
                '==$nav?'in':'';?> nav nav-stacked'>
            <li class="<?php echo 'datas'==$tab?'active':'';?>">
                <a href='<?php echo U('/admin/know');?>'> <i class='icon-caret-right'></i> <span>查看并编辑</span></a>
            </li>
            <!--<li class="<?php echo 'recommend'==$tab?'active':'';?>">-->
            <!--<a href='<?php echo U('/admin/datas/index', ['isrecommended' => 1]);?>'> <i class='icon-caret-right'></i>-->
            <!--<span>推荐</span></a>-->
            <!--</li>-->
            <!--<li class="<?php echo 'categories'==$tab?'active':'';?>">-->
            <!--<a href='<?php echo U('/admin/datacategories');?>'> <i class='icon-caret-right'></i> <span>分类</span></a>-->
            <!--</li>-->
            </ul>
            </li>
            <li class="<?php echo 'home'==$nav?'active':'';?>">
                <a href='<?php echo U('/admin/news');?>'><i class='icon-leaf'></i><span>新闻</span></a>
            </li>
            <li class="<?php echo 'home'==$nav?'active':'';?>">
                <a href='<?php echo U('/admin/disaster');?>'><i class='icon-asterisk'></i><span>灾情预警</span></a>
            </li>
            </ul>
            </li>
            </ul>
        </div>
    </nav>


<section id='content'>
    <div class='container-fluid'>
        <div class='row-fluid' id='content-wrapper'>
            <div class='span12'>
                <div class='page-header'>
                    <h1 class='pull-left'>
                        <span>首页</span>
                    </h1>
                </div>

                <div class='row-fluid'>
                    <div class='span6 box'>
                        <div class='row-fluid timeline'>
                            <div class='span12'>
                                <div class='alert alert-info'>
                                    <a class='close' data-dismiss='alert' href='#'>&times;</a>
                                    欢迎，
                                    <strong><?php echo ($currentUser['username']); ?></strong>
                                </div>
                                <ol class='unstyled'>
                                    <li>
                                        <div class='icon purple-background'>
                                            <i class='icon-check'></i>
                                        </div>
                                        <div class='title'>
                                            登录
                                            <small class='muted'>
                                                <?php
 $t = time()-session('firstLogtime'); if ($t < 100) { echo $t."秒前"; } elseif ($t < 3600) { $t = ceil($t/60); echo $t."分钟前"; } ?>
                                            </small>
                                        </div>
                                        <div class='content'>
                                            登录ip:<?php echo get_client_ip();?>
                                        </div>
                                    </li>
                                    <!--<li>-->
                                    <!--<div class='icon blue-background'>-->
                                    <!--<i class='icon-info'></i>-->
                                    <!--</div>-->
                                    <!--&lt;!&ndash;<div class='title'>&ndash;&gt;-->
                                    <!--&lt;!&ndash;关键操作&ndash;&gt;-->
                                    <!--&lt;!&ndash;<small class='muted'>&ndash;&gt;-->
                                    <!--&lt;!&ndash;用来展示关键操作&ndash;&gt;-->
                                    <!--&lt;!&ndash;</small>&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--&lt;!&ndash;<div class='content'>&ndash;&gt;-->
                                    <!--&lt;!&ndash;考虑到以后rbac&ndash;&gt;-->
                                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                                    <!--</li>-->
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class='span6 box'>
                        <div class='row-fluid' id='content-wrapper'>
                            <div class='span12'>
                                <div class='row-fluid'>
                                    <div class='span12 box'>
                                        <div id="change-password" class='collapse'>
                                            <div class='box-header'>
                                                <div class='title'>
                                                    <i class='icon-edit'></i>
                                                    修改个人信息
                                                </div>
                                            </div>
                                            <div class="box-content">
                                                <div class="tabbable">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a data-toggle="tab" href="#tab1">
                                                                <i class="icon-indent-left text-blue"></i>
                                                                个人信息
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a data-toggle="tab" href="#tab2">
                                                                <i class="icon-edit text-red"></i>
                                                                密码
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab1">
                                                            <form novalidate="novalidate" class="form form-horizontal validate-form" style="margin-bottom: 0;" action="<?php echo U('/admin/members/edit');?>" method="post" >
                                                                <div class='control-group'>
                                                                    <label class='control-label' for='realname'>真名</label>
                                                                    <div class='controls'>
                                                                        <input data-rule-minlength='1' data-rule-required='true' data-rule-chkRealname='true' id='validation_name' name='realname' placeholder='' type='text' value="<?php echo ($currentUser["realname"]); ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class='form-actions' style='margin-bottom:0'>
                                                                    <button class='btn btn-primary' type='submit'>
                                                                        <i class='icon-save'></i>
                                                                        提交
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                        <div class="tab-pane" id="tab2">
                                                            <form id="changePass" novalidate="novalidate" class="form form-horizontal validate-form" style="margin-bottom: 0;" action="<?php echo U('/admin/members/edit');?>" method="post" >
                                                                <div class="control-group">
                                                                    <label class="control-label" for="validation_password">原密码</label>
                                                                    <div class="controls">
                                                                        <input data-rule-minlength="4" data-rule-password="true" data-rule-required="true"  data-rule-chkPrepass="true" name="pre_password" placeholder="输入原来的密码" type="password">
                                                                    </div>
                                                                </div>

                                                                <div class="control-group">
                                                                    <label class="control-label" for="validation_password">新密码</label>
                                                                    <div class="controls">
                                                                        <input data-rule-minlength="4" data-rule-password="true" data-rule-required="true" id="newpassword" name="newpassword" placeholder="输入新的密码" type="password">
                                                                    </div>
                                                                </div>
                                                                <div class="control-group">
                                                                    <label class="control-label" for="validation_password_confirmation">确认新密码</label>
                                                                    <div class="controls">
                                                                        <input data-rule-equalto="#newpassword" data-rule-required="true" id="validation_password_confirmation"  placeholder="再次输入新的密码" type="password">
                                                                    </div>
                                                                </div>
                                                                <div class='form-actions' style='margin-bottom:0'>
                                                                    <button class='btn btn-primary'>
                                                                        <i class='icon-save'></i>
                                                                        提交
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class='hr-normal' />
                                        </div>
                                        <div class='box-content box-double-padding'>
                                            <div class="page-header">
                                                <h3 class='pull-left'>
                                                    <i class='icon-signin text-contrast'></i>
                                                    <span>个人信息</span>
                                                </h3>
                                                <div class='pull-right'>
                                                    <a href="#" class='icon-edit text-contrast' data-target='#change-password' data-toggle='collapse' id='changepasswordcheck'>修改</a>
                                                </div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="tabbable">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active">
                                                                <a data-toggle="tab" href="#tab3">
                                                                    <i class="icon-indent-left text-blue"></i>
                                                                    账户信息
                                                                </a>
                                                            </li>
                                                            <!--<li>-->
                                                            <!--<a data-toggle="tab" href="#tab4">-->
                                                            <!--<i class="icon-edit text-red"></i>-->
                                                            <!--权限-->
                                                            <!--</a>-->
                                                            <!--</li>-->
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab3">
                                                                <p>用户名：<?php echo ($currentUser['username']); ?></p>
                                                                <p>真名：<?php echo ($currentUser['realname']); ?></p>
                                                            </div>
                                                            <div class="tab-pane" id="tab4">
                                                                <p>预留</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- / jquery -->
<script src='/Public/admin/javascripts/jquery/jquery.form.js' type='text/javascript'></script>
<!-- / jquery mobile events (for touch and slide) -->
<script src='/Public/admin/javascripts/plugins/mobile_events/jquery.mobile-events.min.js' type='text/javascript'></script>
<!-- / jquery migrate (for compatibility with new jquery) -->
<script src='/Public/admin/javascripts/jquery/jquery-migrate.min.js' type='text/javascript'></script>
<!-- / jquery ui -->
<script src='/Public/admin/javascripts/jquery_ui/jquery-ui.min.js' type='text/javascript'></script>
<!-- / bootstrap -->
<script src='/Public/admin/javascripts/bootstrap/bootstrap.min.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/plugins/flot/excanvas.js' type='text/javascript'></script>
<!-- / sparklines -->
<script src='/Public/admin/javascripts/plugins/sparklines/jquery.sparkline.min.js' type='text/javascript'></script>
<!-- / bootstrap switch -->
<script src='/Public/admin/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js' type='text/javascript'></script>
<!-- / datatables -->
<script src='/Public/admin/javascripts/plugins/datatables/jquery.dataTables.min.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js' type='text/javascript'></script>
<!-- / color picker -->
<script src='/Public/admin/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js' type='text/javascript'></script>
<!-- / mention -->
<script src='/Public/admin/javascripts/plugins/mention/mention.min.js' type='text/javascript'></script>
<!-- / input mask -->
<script src='/Public/admin/javascripts/plugins/input_mask/bootstrap-inputmask.min.js' type='text/javascript'></script>
<!-- / fileinput -->
<script src='/Public/admin/javascripts/plugins/fileinput/bootstrap-fileinput.js' type='text/javascript'></script>
<!-- / modernizr -->
<script src='/Public/admin/javascripts/plugins/modernizr/modernizr.min.js' type='text/javascript'></script>
<!-- / retina -->
<!-- / autosize (for textareas) -->
<script src='/Public/admin/javascripts/plugins/autosize/jquery.autosize-min.js' type='text/javascript'></script>
<!-- / charCount 
<script src='/Public/admin/javascripts/plugins/charCount/charCount.js' type='text/javascript'></script>-->
<!-- / validate -->
<script src='/Public/admin/javascripts/plugins/validate/jquery.validate.min.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/plugins/validate/additional-methods.js' type='text/javascript'></script>
<!-- / naked password -->
<script src='/Public/admin/javascripts/plugins/naked_password/naked_password-0.2.4.min.js' type='text/javascript'></script>
<!-- / nestable -->
<script src='/Public/admin/javascripts/plugins/nestable/jquery.nestable.js' type='text/javascript'></script>
<!-- / tabdrop -->
<script src='/Public/admin/javascripts/plugins/tabdrop/bootstrap-tabdrop.js' type='text/javascript'></script>
<!-- / 右上角弹出的提示框 -->
<script src='/Public/admin/javascripts/plugins/jgrowl/jquery.jgrowl.min.js' type='text/javascript'></script>
<!-- / bootbox -->
<script src='/Public/admin/javascripts/plugins/bootbox/bootbox.min.js' type='text/javascript'></script>
<!-- / 所见即所得的编辑 -->
<script src='/Public/admin/javascripts/plugins/xeditable/bootstrap-editable.min.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/plugins/xeditable/wysihtml5.js' type='text/javascript'></script>
<!-- / ckeditor -->
<script src='/Public/admin/javascripts/plugins/ckeditor/ckeditor.js' type='text/javascript'></script>
<!-- / datetime picker -->
<script src='/Public/admin/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js' type='text/javascript'></script>
<!-- / dropdown hover -->
<script src='/Public/admin/javascripts/plugins/bootstrap_hover_dropdown/twitter-bootstrap-hover-dropdown.min.js' type='text/javascript'></script>

<!-- / flatty theme -->
<script src='/Public/admin/javascripts/nav.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/tables.js' type='text/javascript'></script>
<script src='/Public/admin/javascripts/theme.js' type='text/javascript'></script>

<script type="text/javascript">
    function to_url(url) {
        window.location = url;
    }

    // 删除一个tr项
    function to_url_delete(url,object) {
        var gnl = confirm("确定删除？");
        if (gnl == true){
            $.getJSON(url,function(e) {
                if ('true' == e.result) {
                    $(object).parents('tr').remove();
                    count = $('#count').attr('value');
                    if (count) {
                        count = count-1;
                        $('#count').html('共'+count+'条记录');
                        $('#count').attr('value', count);
                    }
                    return $.jGrowl("删除成功"); //在右上角弹出提示框
                } else {
                    alert(e.des);
                }
            });
        }
    }
</script>

</body>
</html>

  


<script type="text/javascript">
    jQuery.validator.addMethod("chkPrepass", function(value, element, param) {
        $.ajax({
            type: "post",
            async: false,
            data:'pre_password=' + value,
            url : '<?php echo U('/admin/managers/checkPassword');?>',
            success : function(res){
                if (res == 'false'){
                    result = false;
                } else {
                    result = true;
                }
            },
        });
        return result;
    }, "原密码不正确");

    jQuery.validator.addMethod("chkRealname", function(value, element, param) {
        var reg = /^[\u4e00-\u9fa5]+$/i;
        return reg.test(value);
    }, "请输入中文");
</script>

</body>
</html>