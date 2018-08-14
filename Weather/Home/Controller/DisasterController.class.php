<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/8/14
 * Time: 15:15
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
use Think\Controller;


class DisasterController extends CommonController {
    public function detail($id) {
        session('download', null);
//        print_r("asdasd");die;

        $model = M('featuredisaster');
        $res = $model->where(['id' => $id])->select();
//        print_r($res);die;
        $this->res = $res[0];
        $this->display();
    }
}