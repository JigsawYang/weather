<?php
/**
 * Created by Jigsaw.
 * Date: 2015/7/20
 * Time: 17:27
 * Email: fadeblack307@163.com
 */

namespace Admin\Controller;
use Common\Component\MemberService;
use Think\Controller;

class MembersController extends CommonController{
    public function __construct() {
        parent::__construct();

        $this->nav = 'members'; //左侧导航栏应该高亮哪个nav
        $this->membersModel = M('Member');
        $this->userModel = M('Member');
//        $this->commentsModel = M('DataComment');
//        $this->datasModel = D('Data');
        $this->urel = D('Manager');
        $this->expcateModel = M('expcate');
    }

    public function index() {
//        $res = $this->urel->field('password',true)->select();

        //搜索
        $username = trim(I('get.username'));
        $id = trim(I('get.id'));
        $where['username'] = array('like', '%'.$username.'%');
        if ($id) {
            $where['id'] = $id;
        }

        //分页相关
        $count = $this->managersModel->where($where)->count(); //一共多少个
        $Page = new \Think\Page($count, 10);//每页显示多少个
        $Page->rollPage = 5; //显示的页码的个数
        $Page->setConfig('theme','%UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE% '); //显示的主题
        $show = $Page->show(); //赋值分页输出

        $managers = $this->managersModel->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id desc')->select();
//        $this->role = M('role')->select();
        $this->username = $username; //在搜索框中显示当前搜索的关键词
//        $this->res = $res;
        $this->id = $id;
        $this->page = $this->page($show);//改造分页以使用flatty模板提供的css
        $this->tab = 'back'; //应该高亮左侧导航的哪一个二级菜单
        $this->managers= $managers;
        $this->count = $count;
        $this->display();
    }


    public function add() {
        $data = I('post.');

        if (!$this->managersModel->create($data)){   // 对数据进行验证
            $this->error($this->managersModel->getError());
        } else {
            $this->managersModel->password = md5($data['password']);  //密码需要加密后再存储
            $uid = $this->managersModel->add();
//            $role_user = array();
//            //RBAC添加用户ID到中间表
//            foreach ($_POST['role_id'] as $v){
//                $role_user[] = array(
//                    'role_id' => $v,
//                    'user_id' => $uid
//                );
//            }
//            M('role_user')->addAll($role_user);
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    public function front() {
        //搜索
        $membersModel = M('Member');
        // $username = trim(I('get.username'));
        $id = trim(I('get.id'));
        // $where['username'] = array('like', '%'.$username.'%');
        if ($id) {
            $where['id'] = $id;
        }

        //分页相关
        $count = $membersModel->where($where)->count(); //一共多少个
        $Page = new \Think\Page($count, 10);//每页显示多少个
        $Page->rollPage = 5; //显示的页码的个数
        $Page->setConfig('theme','%UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE% '); //显示的主题
        $show = $Page->show(); //赋值分页输出

        $members = $membersModel->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id desc')->select();
        // print_r($members);die;
        $this->id = $id; //在搜索框中显示当前搜索的关键词
        $this->page = $this->page($show);//改造分页以使用flatty模板提供的css
        $this->managers= $members;
        $this->tab = 'front';//应该高亮左侧导航的哪一个二级菜单
        $this->count = $count;
        $this->display();
    }

    /**
     * modify experts cate
     * @param bool $id
     */
    public function editexp($id = false) {

        if (!$id) {
            $this->redirect('/admin/empty');
        }

        if ($_POST) {
            $data = I('post.');   //使用thinkphp的I方法过滤表单
            $data['id'] = $id;
            $result = MemberService::cateid_save($data);
//            print_r($result);die;
            if ($result !== 1){              // 对data数据进行验证
                $this->error($result);
            } else {// 验证通过 可以进行其他数据操作
                $this->redirect('/admin/members/front');
                return;
            }
        }
        $cates = $this->expcateModel->order('id desc')->select();
        $data = $this->membersModel->find($id);
        $this->data = $data;
        $this->cates = $cates;
        $this->display();
    }

    /**
     * 修改自己的用户信息，只能本人修改
     *
     * @return void
     */
    public function edit() {
        if (!$_POST) {
            $this->redirect('/admin/empty');
        }
        $currentUser = $this->managersModel->find($this->currentUser['id']);//原来的currentUser没有取出密码字段，所以重新取值

        $data = I('post.');//使用thinkphp的I方法过滤表单
        $data['id'] = $this->currentUser['id'];
        if ($data['newpassword']) {
            if (md5($data['pre_password']) != $currentUser['password']) {
                $this->error('原密码错误');
            }
        }
        if (!$this->managersModel->create($data)) {
            $this->error($this->managersModel->getError());
        } else {// 验证通过 可以进行其他数据操作
            if ($data['newpassword']) {
                $this->managersModel->password  = md5($data['newpassword']);
            }

            $this->managersModel->save();
            if ($data['newpassword']) {
                $this->success('修改成功，请重新登录', U('/admin/login/logout'));
            } else {
                $this->success('修改成功');
            }
            return;
        }
    }

    /**
     * 用于前端验证输入的原密码是否正确，ajax
     *
     * @return string
     */
    public function checkPassword() {
        $post = I('post.');
        $pre_password = $post['pre_password'];
        $currentUser = $this->managersModel->find($this->currentUser['id']);//原来的currentUser没有取出密码字段，所以重新取值
        if (md5($pre_password) == $currentUser['password']) {
            echo "true";
        } else {
            echo "false";
        }
    }
}