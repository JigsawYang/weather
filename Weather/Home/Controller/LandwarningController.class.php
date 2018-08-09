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
            $now1 = '2015-06-01';
            $yesterday1 = '2015-05-31';
        } else {
            $now1 = date("Y-m-d", strtotime("-1 day"));
            $yesterday1 = date("Y-m-d", strtotime("-2 day"));
            $now1 = '2015-06-01';
            $yesterday1 = '2015-05-31';
        }
        $now = '2017-04-21 06';
        $day = '2015-06-01';
        $stlist = DataService::GetLandStation();
        if (IS_POST) {
            $now = I("post.sdate1");
            $day = $now;
            $st = I("post.station");
//            var_dump($st);
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
            $station = DataService::GetStationDt()[$st];
        } else {
            $cold = DataService::Landwarning_cold($now, '57');
            $ice = DataService::Landwarning_ice($now, '57');
            $hot = DataService::Landwarning_hot($now, '57');
            //***********************************************************************
            //*******************************上线该成国家站点的 字典
            $station = DataService::GetStationDt()['H0002'];
        }
        $this->stlist = $stlist;
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
        $stlist = DataService::GetStation();
        if (IS_POST) {
            $nows = I("post.sdate1");
            $st = I("post.station");
            $now = $nows." "."00:00:00.000";

//            print_r($now);print_r($st);die;
            $station = DataService::GetStationDt()[$st];
            $cold = DataService::Flandwarning_cold($now, $st);
            $ice = DataService::Flandwarning_ice($now, $st);
            $hot = DataService::Flandwarning_hot($now, $st);
        } else {
            $cold = DataService::Flandwarning_cold($now, "N0001");
            $ice = DataService::Flandwarning_ice($now, "N0001");
            $hot = DataService::Flandwarning_hot($now, 'N0001');
            $station = ['包头', '厚墙体Ⅱ'];
            $st = 'N0001';
        }


        $this->stlist = $stlist;
        $this->cold = $cold;
        $this->hot = $hot;
        $this->station = $station;
        $this->st = $st;
        $this->now = $nows;
        $this->display();

    }

}