<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/8/14
 * Time: 15:33
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\DisasterService;


class LivedisasterController extends CommonController {
    public function index() {
        session("download", null);
        $stlist = DataService::GetLandStation();
        $now = date('Y-m-d H');
        $now = $now . ':00:00.000';
        $now = '2017-10-09 19:00:00.000';
        $day = date('Y-m-d');
        $hour = [];
        for($i = 1; $i<24; $i++) {
            if ($i <= 9 ) {
                $hour['0'.$i] = '0'.$i;

            } else {
                $hour[$i] = $i;
            }


        }
        if (IS_POST) {
            $now = I("post.sdate1");
            $day = $now;
            $hour1= I('post.hour');
            $st = I("post.station");
//            print_r($now);die;
            $now = $now .' '. $hour1 . ":00:00";
//            $hour = $hour1;
//            print_r($now);die;
            $baojing =   DisasterService::Landbaojing($now);
//            print_r($baojing);die;
            $station = DataService::GetLandStationDt()[$st];
            $hour = [];
            for($i = 1; $i<24; $i++) {
                if ($i <= 9 ) {
                    $hour['0'.$i] = '0'.$i;

                } else {
                    $hour[$i] = $i;
                }


            }
        } else {
            $baojing = DisasterService::Landbaojing($now);

            $station = DataService::GetLandStationDt()['53446'];
//            print_r($station);die;
        }
//        print_r($baojing);die;
        $this->now = $now;
        $this->day = $day;
        $this->hour = $hour;
        $this->station = $station;
        $this->baojing = $baojing;
        $this->stlist = $stlist;
        $this->display();

    }
}