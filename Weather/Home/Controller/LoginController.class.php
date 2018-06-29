<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/6/27
 * Time: 23:10
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
//namespace Common\Component;
use Common\Component\MemberService;
use Think\Controller;

class LoginController extends CommonController {
    public function index() {
        $this->display();
    }

    public function signin() {
        session("download", null);

        $user = I('post.username');
        $password = I('post.password');

        $result = MemberService::login($user, $password);
        if ($result === true) {
            session('mes', 1);
            $this->redirect('/');
        } else {
            session('mes', $result);
            $this->redirect('login/index');
        }
    }
    public function logout() {
        session(null);
        redirect('/');
    }

}
?>