<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/6/28
 * Time: 9:57
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
//namespace Common\Component;
use Common\Component\MemberService;
use Think\Controller;

class RegisterController extends CommonController {
    public function index() {
        session("download", null);

        $flag = 1;
        if (IS_POST) {
            $info = '';
            $data = I('post.');
//            print_r($data);die;
            if ($data['password'] != $data['repassword']) {
                $info = $info . ' 二次密码不一致';
                $flag = 0;
            } elseif (!MemberService::checkMember($data['username'])) {
                $info = $info . ' 用户名存在';
                $flag = 0;
            } else {
//                $data[]
//                print_r($data);die;

                $result = MemberService::signup($data);
                if (is_array($result)) {
                    $info = $info . '注册成功';
                    $flag = 2;
                } else {
                    $info = $info . '注册失败';
                    $flag = 0;
                }
            }
            $this->info = $info;
        }
        $this->flag = $flag;
        $this->display();
    }

}