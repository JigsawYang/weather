<?php if (!defined('THINK_PATH')) exit(); if (!isset($_GET['editors'])) { $_GET['editors'] = []; } $_GET['editors'][] = $title; if (!defined('LOADED_EDITOR')) { define('LOADED_EDITOR', true); ?>
<style>
    .editor {
        margin-left: 0 !important;
    }
</style>
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    function createEditor(name) {
        return UE.getEditor('editor_'+name,{
            toolbars: [
                ['fontfamily', 'fontsize','forecolor', 'italic','bold','underline','blockquote','|','justifyleft',
                    'justifyright',
                    'justifycenter',
                    'justifyjustify','|', 'insertorderedlist',
                    'insertunorderedlist', '|','anchor','link','unlink','attachment','|','emotion','insertimage','insertvideo','snapscreen','|','insertcode','source','fullscreen']
            ],
            imagePathFormat: '/upload',
            // initialFrameWidth: 636,
            initialFrameHeight: 260,
            autoHeightEnabled: true,//是否自动长高
            autoFloatEnabled: true,
            initialStyle: "p{font-size:14px; color:#666; font-family:'宋体';}"
        });
    }
</script>
<?php
} ?>
<script>
    window.onload = function() {
        createEditor('<?php echo ($name); ?>');
    };
</script>
<script class="span10 editor" id="editor_<?php echo ($name); ?>" name="<?php echo ($name); ?>" type="text/plain"><?php echo ($value); ?></script>