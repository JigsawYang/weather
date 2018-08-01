<?php
/**
 * Created by Jigsaw.
 * Date: 2015/7/21
 * Time: 11:47
 * Email: fadeblack307@163.com
 */

namespace Admin\Controller;
use Common\Component\AdvService;
use Think\Controller;

class AdviseController extends CommonController {
    public function __construct() {
        parent::__construct();

        $this->nav = 'advise'; //告诉左侧导航激活哪个nav
        $this->advModel = M('advise');

    }

    public function index() {
        $title = trim(I('get.title'));
        $id = trim(I('get.id'));
        $where['title'] = array('like', '%'.$title.'%');
        if ($id) {
            $where['id'] = $id;
        }

        //分页相关
        $count = $this->advModel->where($where)->count(); //一共多少个
        $Page = new \Think\Page($count, 10);//每页显示多少个
        $Page->rollPage = 5; //显示的页码的个数
        $Page->setConfig('theme','%UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE% '); //显示的主题
        $show = $Page->show(); //赋值分页输出
//        print_r($show);die;
        $advs = $this->advModel->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id desc')->select();
//        print_r($advs);die;
        $this->title = $title; //在搜索框中显示当前搜索的关键词
        $this->id = $id;
        $this->page = $this->page($show);//改造分页以使用flatty模板提供的css
//        $this->tab = 'back'; //应该高亮左侧导航的哪一个二级菜单
        $this->advs= $advs;
        $this->real = session('real');
        $this->count = $count;
        $this->display();
    }

    public function edit($id = false) {

        if (!$id) {
            $this->redirect('/admin/empty');
        }

        if ($_POST) {
            $data = I('post.');   //使用thinkphp的I方法过滤表单
            $data['id'] = $id;
            $result = AdvService::adv_save($data);
            if ($result !== 1){              // 对data数据进行验证
                $this->error($result);
            } else {// 验证通过 可以进行其他数据操作
                $this->redirect('/admin/'.$this->nav);
                return;
            }
        }
        $data = $this->advModel->find($id);
        $this->data = $data;
        $this->display();
    }


    public function add() {
        $data = I('post.');

        if (!$this->advModel->create($data)){   // 对数据进行验证
            $this->error($this->advModel->getError());
        } else {
            $this->advModel->add();
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

}