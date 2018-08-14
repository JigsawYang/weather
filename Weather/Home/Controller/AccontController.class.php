<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/23
 * Time: 15:46
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class AccontController extends CommonController {
    public function index() {
        session('download', null);

        $y = date("Y");
        $m = date("m");
        $d = date("d");
        if ($d < 11) {
            $m = $m - 1;
            $now1 =  $y.'-'.$m.'-'."21";
            $now2 =  date('Y-m-d', strtotime(date('Y-m-01') . ' -1 day'));
//            print_r($now2);die;
        }
        if ($d >= 11 && $d < 21) {
            $now1 =  $y.'-'.$m.'-'."01";
            $now2 =  $y.'-'.$m.'-'."11";
        }
        if ($d >= 21) {
            $now1 =  $y.'-'.$m.'-'."12";
            $now2 =  $y.'-'.$m.'-'."21";
        }

        $now1 = '2015-05-20';
        $now2 = '2015-05-31';
        // $st = I('get.station');
        $stlist = DataService::GetStation();

        if (IS_POST) {
            $now1 = I("post.sdate1");
            $now2 = I("post.sdate2");
            $st = I("post.station");
            $station = DataService::$station_dict[$st];
//             echo $now1, $now2, $station;die;
//
            $air = DataService::air($now1, $now2, $st);
//           // print_r($air);die;
            $land = DataService::land($now1, $now2, $st);
        } else {
            $air = DataService::air($now1, $now2, 'N0001');
//             print_r($air);die;
            $land = DataService::land($now1, $now2, 'N0001');
            $station = DataService::GetStationDt()['N0001'];
            $st = 'N0001';
        }
//        $st =  $_GET['station'];
//        if (!$st) {
//
//        } else {
//            $station = DataService::$station_dict[$st];
//            // echo $now1, $now2, $station;die;
//
//            $air = DataService::air($now1, $now2, $st);
//           // print_r($air);die;
//            $land = DataService::land($now1, $now2, $st);
//        }
        $this->stlist = $stlist;
        $this->st = $st;
        $this->air = $air;
        $this->land = $land;
        $this->now1 = $now1;
        $this->now2 = $now2;
        $this->station = $station;
        $this->display();
    }
}