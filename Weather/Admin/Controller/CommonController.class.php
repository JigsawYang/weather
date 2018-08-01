<?php
/**
 * @Email fadeblack307@163.com
 * @copyright Copyright (c) 2015 Jigsaw.
 */
namespace Admin\Controller;
use Common\Component\MemberService;
use Think\Controller;

/**
 * Class CommonController
 *
 * @property array $currentMember
 *
 * @package Home\Controller
 * @author Jerry Hsia<xiajie9916@gmail.com>
 */
class CommonController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->currentMember = MemberService::getCurrentMember();

        if (!$this->_isLogin()) { //判断登录

            if (IS_AJAX) { //如果是ajax请求
                echo json_encode(array(
                    'res' => 'false',
                    'des' => '需要登录'
                ));
                exit;
            }
            $referUrl = $this->_getUrl();//当前URL
            cookie('referUrl', $referUrl);//将当前url存入cookie，登录完成后跳转回此url
            $this->redirect('/admin/login');
        }
        $this->managersModel = M('manager'); //实例化
        $this->currentUser = $this->managersModel->where(['username' => session('manager')])->field('id,username,realname')->find(); //不取用户密码
//        print_r($currentUser);die;
    }

    /**
     *
     * 若访问的方法不存在，跳到404页面
     *
     */
    /**
     * 若访问的方法不存在，跳到404页面
     *
     * @return void
     */
    public function _empty() {
        $this->redirect('/admin/empty');
    }

    /**
     * 判断是否登录
     *
     * @return void
     */
    private function _isLogin() {
        if (session('manager') && (time() - session('logTime')) < 6000) { //100分钟不操作需要重新登录
            session('logTime',time());
            return true;
        }
        return false;
    }

    /**
     * 改造thinkphp分页类返回的页码字符串，以适应html模板提供的样式
     *
     * @return string
     */
    public function page($show = false) {
        if (!$show) {
            return false;
        }

        $show = str_replace('<span class="current">', '<li><span class="current">', $show);
        $show = str_replace('</span>', '</span></li>', $show);
        $show = str_replace('<a', '<li><a', $show);
        $show = str_replace('</a>', '</a></li>', $show);
        $show = str_replace('<div>', '', $show);
        $show = str_replace('</div>div>', '', $show);
        $show = str_replace('<li><span class="current">', '<li class="active"><span>', $show);

        return $show;
    }

    /**
     * 快速编辑，ajax方式，所见即所得
     * post的数据中，name为要修改的字段，value为要改成的值
     *
     * @param string $table 被编辑的数据的所在的table
     * @param int      $id 被编辑的数据的id
     * @return json
     */
    public function quickEdit($table = false, $id = false) {
        if (!$table || !$id || !$data = I('post.')) {
            echo json_encode(array(
                'result' => 'false',
                'des' => '参数错误'
            ));
            return;
        }

        $model = $table.'Model';
        if ($table == "member") {
            $model = M('member');

        }else {
            $model = $this->$model;

        }

        $data['id'] = $id;
//        print_r($data);die;
        if ('name' != $data['name']) {
            $data[$data['name']] = $data['value'];
            unset($data['name']);
        } else { //如果数据库中恰好存在name字段
            $data['name'] = $data['value'];
        }
//        print_r($data);die;
        if (!$model->create($data)){
            echo json_encode(array(
                'result' => 'false',
                'des' => $model->getError()
            ));
            return;
        } else {// 验证通过 可以进行其他数据操作
            if ($table == "user") {
                $model->where(["ID" => $id])->save();
                echo json_encode(array(
                    'result' => 'true',
                    'des' => '修改成功'
                ));
            } else {
                $model->save();
                echo json_encode(array(
                    'result' => 'true',
                    'des' => '修改成功'
                ));
            }

        }
    }

    /**
     * 删除一个表中的某条记录，ajax
     *
     * @param string $table 被删除的数据的所在的table
     * @param int      $id 被删除的数据的id
     * @param int      $dataid 对应的服务id，选填
     * @return void
     */
    public function delete($table = false, $id = false, $dataid = false) {
        if (!$table || !$id) {
            echo json_encode(array(
                'result' => 'false',
                'des' => '参数错误'
            ));
            return;
        }

        // 拼装成对应的model，需要先在相应的controller里先实例化该model
        $model = $table."Model";
        if ($table == "member") {
            $this->$model->where(["id" => $id])->delete();

        } else {
            $this->$model->where(["id" => $id])->delete();

        }
        echo json_encode(array(
            'result' => 'true',
            'des' => '删除成功'
        ));

//        if ('members' == $table) { //删除一个用户后，需要删除该用户的评论，同时更新相应服务的评论数
//            $member = ['uid' => $id];
//            CommentService::deleteByMember($member);
//        }
    }

    /**
     * 获取当前页面完整URL地址
     *
     * @return url
     */
    private function _getUrl() {
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
        return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
    }
}
