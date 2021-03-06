<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/18
 * Time: 9:36
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class AdviseController extends CommonController {
    public function index() {
        session('download', null);
        $advModel = M('advise');
        $count = $advModel->count(); //一共多少个
        $Page = new \Think\Page($count, 10);//每页显示多少个
        $Page->rollPage = 5; //显示的页码的个数
//        $Page->setConfig('theme','%UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE% '); //显示的主题
        $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
        $Page->setConfig('prev', '上一页');
        $Page->setConfig('next', '下一页');
        $Page->setConfig('last', '末页');
        $Page->setConfig('first', '首页');
        $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $show = $Page->show(); //赋值分页输出
        $advs = $advModel->limit($Page->firstRow.','.$Page->listRows)->order('id desc')->select();
//        print_r($advs);die;
        $this->page = $show;
        $this->advs = $advs;
        $this->display();
    }

    public function detail($id) {
        session('download', null);

        $model = M('advise');
        $res = $model->where(['id' => $id])->select();
//        print_r($res);die;
        $this->res = $res[0];
        $this->display();
    }

}