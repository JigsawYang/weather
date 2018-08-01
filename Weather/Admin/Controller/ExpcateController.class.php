<?php
/**
 * Created by Jigsaw.
 * Date: 2015/11/4
 * Time: 14:51
 * Email: fadeblack307@163.com
 */

namespace Admin\Controller;
use Common\Component\AdvService;
use Think\Controller;

class ExpcateController extends CommonController {
    public function __construct() {
        parent::__construct();

        $this->expcateModel = M('expcate');
//        $this->datacategoriesModel = D('DataCategory');
//        $this->categoryattrsModel = D('DataCategoryAttr');
//        $this->categorydpsModel = D('DataCategoryDp');

        $this->nav = 'expcate';//告诉左侧导航激活哪个nav

    }

    public function index() {
        $this->redirect('/empty');
    }


    public function cate() {
        $title = trim(I('get.title'));
        $id = trim(I('get.id'));
        $where['title'] = array('like', '%'.$title.'%');
        if ($id) {
            $where['id'] = $id;
        }

        //分页相关
        $count = $this->expcateModel->where($where)->count(); //一共多少个
        $Page = new \Think\Page($count, 10);//每页显示多少个
        $Page->rollPage = 5; //显示的页码的个数
        $Page->setConfig('theme','%UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE% '); //显示的主题
        $show = $Page->show(); //赋值分页输出
//        print_r($show);die;
        $cate = $this->expcateModel->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('id desc')->select();
//        print_r($cate);die;
        $this->title = $title; //在搜索框中显示当前搜索的关键词
        $this->id = $id;
        $this->page = $this->page($show);//改造分页以使用flatty模板提供的css
//        $this->tab = 'back'; //应该高亮左侧导航的哪一个二级菜单
        $this->cate= $cate;
        $this->real = session('real');
        $this->count = $count;
        $this->display();
    }



    public function add() {
        $data = I('post.');

        if (!$this->expcateModel->create($data)){   // 对数据进行验证
            $this->error($this->expcateModel->getError());
        } else {
            $this->expcateModel->add();
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    public function edit($id = false) {

        if (!$id) {
            $this->redirect('/admin/empty');
        }

        if ($_POST) {
            $data = I('post.');   //使用thinkphp的I方法过滤表单
            $data['id'] = $id;
            $result = AdvService::cate_save($data);
            if ($result !== 1){              // 对data数据进行验证
                $this->error($result);
            } else {// 验证通过 可以进行其他数据操作
                $this->redirect('/admin/expcate/cate');
                return;
            }
        }
        $data = $this->expcateModel->find($id);
        $this->data = $data;
        $this->display();
    }
}