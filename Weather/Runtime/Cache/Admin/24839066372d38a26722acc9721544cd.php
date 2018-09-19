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
                <a class='dropdown-collapse' href='#'> <i class='icon-shield'></i> <span>新闻资讯</span> <i
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
                <a class='dropdown-collapse' href='#'> <i class='icon-facebook'></i> <span>科普知识</span> <i
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
                <a href='<?php echo U('/admin/news');?>'><i class='icon-leaf'></i><span>首页图片</span></a>
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
                <!-- 标题 -->
                <div class='row-fluid'>
                    <div class='span12'>
                        <div class='page-header'>
                            <h1 class='pull-left'>
                                <span>编辑&nbsp<a href="<?php echo U('/admin/'.$nav.'/index/name/'.$data['name']);?>" style="color:#5879b8"><?php echo ($data["title"]); ?></span>
                            </h1>

                            <div class="pull-right">
                                <ul class='breadcrumb'>
                                    <li>
                                        <a href="<?php echo U('/admin');?>"><i class='icon-home'></i>
                                        </a>
                                    </li>
                                    <li class='separator'>
                                        <i class='icon-angle-right'></i>
                                    </li>
                                    <li>编辑</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /标题 -->
                <div class='row-fluid'>
                    <div class='span10 box offset1'>
                        <div class='box-content'>
                            <form id="editForm" class='form form-horizontal validate-form' style='margin-bottom: 0;'
                                  action="<?php echo U('/admin/'.$nav.'/edit/id/'.$data['id']);?>" method="post"/>
                            <div class='control-group'>
                                <label class='control-label'>标题</label>

                                <div class='controls'>
                                    <input class="span10" data-rule-minlength='1' data-rule-required='true' name='title' type='text'
                                           value="<?php echo ($data["title"]); ?>"/>
                                </div>
                            </div>


                            <div class='control-group'>
                                <label class='control-label'>发布人</label>

                                <div class='controls'>
                                    <input class="span10" data-rule-minlength='1' data-rule-required='true' name='author' type='text'
                                           value="<?php echo ($data["author"]); ?>"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">添加时间</label>

                                <div class="controls">
                                    <input class="span10" id="time" name="addtime" value="<?php echo $data['addtime']?>"
                                           placeholder="添加时间" type="text">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">正文内容</label>
                                <div class="controls">
                                    <?=W('Admin/editor', array('main', $data['main']))?>
                                </div>
                            </div>

                            <div class='form-actions' style='margin-bottom:0'>
                                <button class='btn btn-primary offset6' type='submit'>
                                    <i class='icon-save'></i>
                                    提交
                                </button>
                            </div>
                            </form>
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

  

<script>
    window.onbeforeunload = function() {
        return '这个页面比较重要！';
    };
</script>