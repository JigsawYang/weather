<?php
/**
 * Created by Jigsaw.
 * Date: 2015/7/21
 * Time: 14:52
 * Email: fadeblack307@163.com
 */
namespace Admin\Widget;
use Think\Controller;
class AdminWidget extends Controller {

    public function editor($name, $value = '') {
        $this->assign('name', $name);
        $this->assign('value', htmlspecialchars_decode($value));
        $this->display('Widget:editor');
    }
}