<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/4
 * Time: 11:05
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
use Think\Controller;

//页面出错时跳转到此控制器
class EmptyController extends Controller {
    public function _empty() {
        $this->redirect('/empty');
    }

    public function index() {
        $this->display("Empty:index");
//        $this->redirect('/empty');
//        $this->redirect('/empty');
    }
}