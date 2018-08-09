<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/8/6
 * Time: 15:20
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class HistoryController extends CommonController {
    public function index() {
//        print_r($this->currentMember);die;

        if (!$this->currentMember) {
            session('download', 1);
            $this->redirect('/');
        }
        $stlist = DataService::GetStation();
        // print_r($stlist);die;
        $this->stlist = $stlist;

//        print_r(session('download'));die;
        if ($this->currentMember['isdownload'] != 1) {
            session('download', 1);
            $this->redirect('/');
        }
        if (IS_POST) {
            $flag = 0;
            $info = "";
            $data = I("post.");
            $now = date('Y-m-d');
            $timenow = strtotime($now);
            $stime = strtotime($data['sdate']);
            $etime = strtotime($data['edate']);
//            print_r($stime, $etime);die;
            if (!$stime || !$etime) {
                $info = $info . "日期不能为空 ";
                $flag = 1;
            } elseif ($data['sdate'] == $now || $data['edate'] == $now || stime >= $timenow || etime >= $timenow) {
                $info = $info . "日期不能选择当天或超过当天 ";
                $flag = 1;
            } elseif ($stime > $etime) {
                $info = $info . "开始日期不能超过结束日期 ";
                $flag = 1;
            } elseif (DataService::get_month($data['sdate'], $data['edate']) > 2) {
                $info = $info . "日期间隔不能超过2个月";
                $flag = 1;
            } else {
                session('downses', null);
                DataService::exportData($data['sdate'], $data['edate'], $data['station']);
            }
            if ($flag == 1) {
                session('downses', $info);
                $this->redirect('/history');
            }
        } else {
            $this->display();
        }
    }

}