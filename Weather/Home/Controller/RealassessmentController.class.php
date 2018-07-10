<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/4
 * Time: 15:35
 * Email: fadeblack307@163.com
 */

namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;

class RealassessmentController extends CommonController {
    public function index() {
        $stlist = DataService::GetStation();
        $location = DataService::getlocation();


        $day = date('Y-m-d');//实际上线时候 吧这个注释去掉
        $hour = date('H');
        $now = $day.' '.$hour;
        $now = '2015-06-01 09';
//        $st = I('get.station');
//        if (!$st) {
            $res = DataService::TmpReport($now, 'N0001');
            $resnum = DataService::TopNUM($now, 'N0001');

//            $station = DataService::$station_dict['N0001'];
            $station = DataService::GetStationDt()['N0001'];

//        } else {
//            $res = DataService::TmpReport($now, $st);
//            $resnum = DataService::TopNUM($now, $st);
//            $station = DataService::GetStationDt()[$st];
//        }
        $this->station = $station;
        $this->stlist = $stlist;

        // print_r($res);die;
        $this->res = $res;
        $this->resnum = $resnum;
        $this->now = $now . '时';

        $this->location = $location;
        $this->display();
    }

    public function getdata() {
        if (IS_POST) {
            $data = I('post.');
//            print_r($data['location']);die;
            $res = DataService::findstation($data['location'], $data['station']);
            if ($res) {

            } else {
                $this->ajaxReturn(['status' => false, 'info' => '没有此站点']);
            }
        } else {
            $this->error('非法操作');
            $this->redirect('/');
        }
    }

}