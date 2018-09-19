<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/31
 * Time: 16:57
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class LandWarningController extends CommonController
{
    public function index()
    {
        session("download", null);

        $day = date('Y-m-d');//实际上线时候 吧这个注释去掉
        $hour = date('H');
        $now = $day . ' ' . $hour;
        if (date('H') > 20) {
            $now1 = date('Y-m-d');
            $yesterday1 = date("Y-m-d", strtotime("-1 day"));
            // $now1 = '2015-06-01';
            // $yesterday1 = '2015-05-31';
        } else {
            $now1 = date("Y-m-d", strtotime("-1 day"));
            $yesterday1 = date("Y-m-d", strtotime("-2 day"));
            // $now1 = '2015-06-01';
            // $yesterday1 = '2015-05-31';
        }
        // $now = '2017-04-21 06';
        // $day = '2015-06-01';
//        $stlist = DataService::GetLandStation();
        $qulist = DataService::GetquStation();
       // print_r($qulist);die;
        if (IS_POST) {
            $now = I("post.sdate1");
            $day = $now;
            $st = I("post.station");
//            var_dump($st);die;
            $now = $now . ' 06';
//            print_r($now);die;
//            $yesterday1 = date("Y-m-d", (strtotime($now) - 3600 * 24));
            // print_r($now);print_r($yesterday1);die;
            // print_r($st);die;
//            $now1 = $now . ' ' . '09';
//           var_dump($now);die;
//            $st = '57';
//            $now = '2017-04-21 06';
//            var_dump($st);var_dump($now);die;
            $cold = DataService::Landwarning_cold($now, $st);
//            print_r($cold);die;
            $ice = DataService::Landwarning_ice($now, $st);
            $hot = DataService::Landwarning_hot($now, $st);
            //***********************************************************************
            //*******************************上线该成国家站点的 字典
            $station = DataService::GetLandStationDt()[$st];
        } else {
            $cold = DataService::Landwarning_cold($now, '53446');
            $ice = DataService::Landwarning_ice($now, '53446');
            $hot = DataService::Landwarning_hot($now, '53446');
            //***********************************************************************
            //*******************************上线该成国家站点的 字典
            $station = DataService::GetLandStationDt()['53446'];
            $this->st = "4";

//            print_r($station);die;
        }
        $this->stlist = $qulist;
        $this->cold = $cold;
        $this->ice = $ice;
        $this->hot = $hot;
        $this->day = $day;
        $this->station = $station;
        $this->now = $now;
        $this->display();
    }

    public function feature() {
        session("download", null);
        $nows = date("Y-m-d");
        $now = $nows." "."00:00:00.000";
//        $now = '2014-11-18';
//        $y = '2014';
//        $m = '11';
//        $d = '18';
//        $st = I('get.station');
//        $stlist = DataService::GetLandStation();
        $qulist = DataService::GetquStation();

        if (IS_POST) {
            $nows = I("post.sdate1");
            $st = I("post.station");
            $now = $nows." "."00:00:00.000";

//            print_r($now);print_r($st);die;
            $station = DataService::GetLandStationDt()[$st];
            $cold = DataService::Flandwarning_cold($now, $st);
            $ice = DataService::Flandwarning_ice($now, $st);
            $hot = DataService::Flandwarning_hot($now, $st);
        } else {
            $cold = DataService::Flandwarning_cold($now, "53446");
            $ice = DataService::Flandwarning_ice($now, "53446");
            $hot = DataService::Flandwarning_hot($now, '53446');
            $station = DataService::GetLandStationDt()['53446'];
//            $st = 'N0001';
        }


        $this->stlist = $qulist;
        $this->cold = $cold;
        $this->hot = $hot;
        $this->station = $station;
        $this->st = $st;
        $this->now = $nows;
        $this->display();

    }

    public function getxian() {
        if (IS_POST) {
            $data = I('post.');
//            print_r($data);die;
            $xiid = $data['quid'];
            $res = DataService::getxianid($xiid);
//            print_r($res);die;

            if ($res) {
                $this->ajaxReturn(['status' => true, 'res' => $res]);
            } else {
                $this->ajaxReturn(['status' => false, 'res' => '全部没数据']);
            }
        } else {
            $this->error('非法操作');
            $this->redirect('/');
        }
    }


}