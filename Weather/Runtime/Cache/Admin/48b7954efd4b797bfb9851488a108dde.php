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
            <!--<li class="<?php echo 'home'==$nav?'active':'';?>">-->
                <!--<a href='<?php echo U('/admin/news');?>'><i class='icon-leaf'></i><span>新闻</span></a>-->
            <!--</li>-->

            </ul></li></ul>
        </div>
    </nav>


    <section id='content'>
        <div class='container-fluid'>
        <div class='row-fluid'>
                <div class='span12 box bordered-box orange-border' style='margin-bottom:0;'>
                    <div class='page-header'><!-- 标题栏 -->
                        <h1 class='pull-left'>
                            <span>前台用户</span>
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
                                <li>前台用户</li>
                            </ul>
                        </div>
                    </div><!-- end标题栏 -->
                    <!-- 搜索 -->
                    <div class="row-fluid">
                        <form class="form form-horizontal" action="<?php echo U('/admin/members/front');?>" accept-charset="utf-8" method="get">
                            <input <?php echo $id?'style="color:red"':'';?> name="id" value="<?php echo ($id); ?>" placeholder="按id搜索" class="form-control" type="text">
                            <button class="btn btn-default" type="submit">搜索</button> 
                            <div class="btn btn-default" onclick="to_url('<?php echo U('/admin/members/front');?>')">全部</div>
                            <div id="count" value="<?php echo ($count); ?>" class="alert alert-info pull-right" style="padding-top:4px;padding-bottom:4px">共<?php echo ($count); ?>条记录</div>
                            <div class='btn btn-default' id='inplaceediting-enable'>开启快速修改</div>

                        </form>                                        
                    </div>     
                    <!-- /搜索 -->
                    <div class='box-content box-no-padding'>
                    <table class='table table-striped' style='margin-bottom:0;'>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>注册时间</th>
                        <th>是否有权限下载</th>
                        <!--<th>是否是专家</th>-->
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if(is_array($managers)): $i = 0; $__LIST__ = $managers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$manager): $mod = ($i % 2 );++$i;?><tr>
                        <td width=""><?php echo ($manager["id"]); ?></td>
                        <td width=""><?php echo ($manager["username"]); ?></td>
                        <td width=""><?php echo ($manager["addtime"]); ?></td>
                        <td class="inplaceediting-table-switch">
                            <a class='editable-ishot editable-click'  data-original-title='选择' data-pk='1'  data-name="isdownload" data-url="<?php echo U('/admin/members/quickEdit/table/member/id/'.$manager['id']);?>" data-type='select' href='#' ><?php echo $manager['isdownload']?'是':'否';?>
                            </a>
                        </td>
                        <!--<td class="inplaceediting-table-switch">-->
                            <!--<a class='editable-ishot editable-click'  data-original-title='选择' data-pk='1'  data-name="isexp" data-url="<?php echo U('/admin/members/quickEdit/table/member/id/'.$manager['id']);?>" data-type='select' href='#' ><?php echo $manager['isexp']?'是':'否';?>-->
                            <!--</a>-->
                        <!--</td>-->
                        <td>
                            <!--<a class="btn btn-link has-tooltip" href="<?php echo U('/admin/members/comments/id/'.$manager['id']);?>" data-original-title="评论管理">-->
                                <!--<i class="icon-comments text-blue"></i>-->
                            <!--</a> -->
                            <?php if ($manager['isexp']) { ?>
                            <a class="btn btn-link has-tooltip" href="<?php echo U('/admin/members/editexp/id/'.$manager['id']);?>" data-original-title="编辑">
                                <i class="icon-edit text-blue"></i>
                            </a>
                            <?php } ?>
                            <a class="btn btn-link has-tooltip" href="#" onclick="to_url_delete('<?php echo U('/admin/members/delete/table/user/id/'.$manager['id']);?>',this)" data-original-title="删除该用户">
                                <i class="icon-trash text-red"></i>
                            </a>
                        </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
    $(function(){
        $('#inplaceediting-enable').click(function() {
            btnclass = $('#inplaceediting-enable').attr('class');

            if ('btn btn-default' == btnclass) {
                $('#inplaceediting-enable').attr('class', 'btn btn-primary');
                $('#inplaceediting-enable').html('关闭快速修改');
            } else {
                $('#inplaceediting-enable').attr('class', 'btn btn-default');
                $('#inplaceediting-enable').html('开启快速修改');
            }
            $('.inplaceediting-table-switch .editable').editable('toggleDisabled');
        });

        $('.editable-ishot').editable({
            validate: function(value) {
                if($.trim(value) == '') return '不填不行';
            },
            disabled : true,
            source : [
                {'value':'1','text':'是'},
                {'value':'0','text':'否'}
            ],
            success: function(response){
                response = eval("("+response+")");//转换为json对象
                if ('false' == response.status) {
                    return response.des;
                } else {
                    return $.jGrowl("修改成功");
                }
            }
        });
    });
</script>
</body>
</html>