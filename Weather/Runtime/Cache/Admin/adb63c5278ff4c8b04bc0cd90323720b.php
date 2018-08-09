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

            </ul></li></ul>
        </div>
    </nav>


<section id='content'>
    <div class='container-fluid'>
        <div class='row-fluid'>
            <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                <div class='page-header'><!-- 标题栏 -->
                    <h1 class='pull-left'>
                        <span>新闻</span>
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
                            <li>新闻</li>
                        </ul>
                    </div>
                </div><!-- end标题栏 -->
                <!-- 搜索 -->
                <div class="row-fluid">
                    <form class="form form-horizontal" action="<?php echo U('/admin/news');?>" accept-charset="utf-8" method="get">
                        <input name="id" value="<?php echo ($id); ?>" placeholder="按id搜索" class="form-control" type="text">
                        <input name="title" value="<?php echo ($title); ?>" placeholder="按标题搜索" class="form-control" type="text">
                        <button class="btn btn-default" type="submit">搜索</button>
                        <div class="btn btn-default" onclick="to_url('<?php echo U('/admin/news');?>')">全部</div>
                        <div class='btn btn-default' data-toggle="modal" href="#modal-example2" role="button">添加</div>
                        <div id="count" value="<?php echo ($count); ?>" class="alert alert-info pull-right" style="padding-top:4px;padding-bottom:4px">共<?php echo ($count); ?>条记录</div>
                    </form>
                </div>
                <!-- 添加用户的表单 -->
                <div class="modal hide fade" id="modal-example2" role="dialog" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-header text-center">
                        <button class="close" data-dismiss="modal" type="button">×</button>
                        <h3>发布新文章</h3>
                    </div>
                    <div class="modal-body">
                        <form class='form form-horizontal validate-form' enctype="multipart/form-data" style='margin-bottom: 0;'
                              action="<?php echo U('/admin/news/add');?>" method="post" />
                        <div class='control-group'>
                            <label class='control-label' for='title'>文章标题</label>
                            <div class='controls'>
                                <input data-rule-minlength='1' data-rule-required='true' name='title' placeholder='输入标题' type='text' />
                            </div>
                        </div>
                        <div class='control-group'>
                            <label class='control-label' for='doc'>上传图片</label>
                            <div class='controls'>
                                <input name='doc' placeholder='' type='file' value="上传"/>
                            </div>
                        </div>
                        <div class='control-group'>
                            <!--<label class='control-label' for='author'>发布人</label>-->
                            <div class='controls'>
                                <input data-rule-minlength='1' data-rule-required='true' data-rule-chkRealname='true'  id='validation_realname' name='author' placeholder='输入发布人' type='hidden' value="<?php echo ($real); ?>" />
                            </div>
                        </div>


                        <!--<div class='control-group' id="cc">-->
                        <!--<label class='control-label' for='role'>所属角色</label>-->
                        <!--<select name="role_id[]">-->
                        <!--<option value="" >请选择角色</option>-->
                        <!--<?php if(is_array($role)): foreach($role as $key=>$v): ?>-->
                        <!--<option value="<?php echo ($v['id']); ?>"><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option>-->
                        <!--<?php endforeach; endif; ?>-->
                        <!--</select>-->
                        <!--<span class="add-role">添加一个角色</span>-->
                        <!--</div>-->
                        <div class='form-actions' style='margin-bottom:0' id="last">
                            <button class='btn btn-primary' type='submit'>
                                <i class='icon-save'></i>
                                提交
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /添加用户的表单 -->
                <!-- /搜索 -->
                <div class='box-content box-no-padding'>
                    <table class='table table-striped' style='margin-bottom:0;'>
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="30%">标题</th>
                            <th width="10%">发布人</th>
                            <th width="20%">发布时间</th>
                            <!--<th width="10%">用户所属组</th>-->
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(is_array($news_res)): foreach($news_res as $key=>$v): ?><tr>
                                <td width=""><?php echo ($v["id"]); ?></td>
                                <td width=""><?php echo ($v["title"]); ?></td>
                                <td width=""><?php echo ($v["author"]); ?></td>
                                <td width=""><?php echo ($v["addtime"]); ?></td>
                                <!--<td width="">-->
                                <!--<?php if($v["username"] == admin): ?>-->
                                <!--超级管理员-->
                                <!--<?php else: ?>-->
                                <!--<ul>-->
                                <!--<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$value): ?>-->
                                <!--<li><?php echo ($value["name"]); ?>(<?php echo ($value["remark"]); ?>)</li>-->
                                <!--<?php endforeach; endif; ?>-->
                                <!--</ul>-->
                                <!--<?php endif; ?>-->
                                <!--</td>-->
                                <td>
                                    <a class="btn btn-link has-tooltip" href="<?php echo U('/admin/'.$nav.'/edit/id/'.$v['id']);?>" data-original-title="编辑">
                                        <i class="icon-edit text-blue"></i>
                                    </a>
                                    <a class="btn btn-link has-tooltip" href="#" onclick="to_url_delete('<?php echo U('/admin/'.$nav.'/delete/table/adv/id/'.$v['id']);?>',this)" data-original-title="删除">
                                        <i class="icon-trash text-red"></i>
                                    </a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination pagination-centered">
                        <ul><?php echo ($page); ?></ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end <div class='container-fluid'> -->
</section>
</div><!--end id='wrapper' -->

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
    jQuery.validator.addMethod("chkRealname", function(value, element, param) {
        var reg = /^[\u4e00-\u9fa5]+$/i;
        return reg.test(value);
    }, "请输入中文");

    jQuery.validator.addMethod("stringEN", function(value, element) {
        var chrnum = /^([a-zA-Z0-9]+)$/;
        return this.optional(element) || (chrnum.test(value));
    }, "只能输入数字和字母(字符A-Z, a-z, 0-9)");
    $(function(){
                $('.add-role').click(function(){
                            var obj = $(this).parents('#cc').clone();
                            obj.find('.add-role').remove();
                            $('#last').before(obj);
                        }
                )
            }
    )
    //-->
</script>

</body>
</html>