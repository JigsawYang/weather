<?php
/**
 * @Email fadeblack307@163.com
 * @copyright Copyright (c) 2015 Jigsaw.
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function _empty() {
        $this->redirect('/admin/empty'); //404页面
    }

    /**
     * 登录页面,ajax
     *
     * @return void
     */
    public function index() {
        if ($this->_isLogin()) { //若已经登录
            $this->error('已经登录');
        }

        if ($data = I('post.')) {
            if (!$data['username']) {
                echo json_encode(array(
                    'res' => 'false',
                    'des' => '请输入用户名'
                ));
                return;
            }

            if (!$data['password']) {
                echo json_encode(array(
                    'res' => 'false',
                    'des' => '请输入密码'
                ));
                return;
            }
//            print_r($data);die;
            $Managers = M('manager');

            // 查找记录
            $result = $Managers->where(['username=' => $data['username']])->find();

            if (!$result) {
                echo json_encode(array(
                    'res' => 'false',
                    'des' => '用户不存在'
                ));
                return;
            } else if (md5($data['password']) != $result['password']) {
                echo json_encode(array(
                    'res' => 'false',
                    'des' => '密码错误'
                ));
                return;
            } else {
                session('manager', $result['username']);
                session('real', $result['realname']);
                session('uid', $result['id']);
                session('firstLogtime',time());
                session('logTime',time());
                echo json_encode(array(
                    'res' => 'true',
                    'des' => '登录成功',
                    'url' => cookie('referUrl') //登录前的url
                ));
                return;
            }
        }

        $this->display();
    }

    /**
     * 登出
     *
     * @return void
     */
    public function logout()
    {
        if (!$this->_isLogin()) {
            $this->redirect('/admin/empty');
        }

        session(null);
        $this->redirect('/admin');
    }

    /**
     * 判断是否登录
     *
     * @return bool
     */
    private function _isLogin() {
        if (session('manager') && (time() - session('logTime')) < 600) {
            session('logTime',time());
            return true;
        } else {
            return false;
        }
    }

}
