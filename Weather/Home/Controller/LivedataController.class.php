<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/2
 * Time: 15:37
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
use Think\Controller;
use Common\Component\DataService;
use Common\Component\ArrayHelper;


class LivedataController extends CommonController {
    public function index() {
        session('download', null);

        $stlist = DataService::GetStation();
        $now = date('Y-m-d');
        $now2 = date('Y-m-d H:i:s');
        $y = date("Y-m-d H:i:s",strtotime("-1 day"));
//        实际上线时候 吧这个注释去掉

        $now = '2015-05-28';
        $now2 = '2015-05-28 10:00:00';
        $y = "2015-05-27 10:00:00";
//        空气温度
        $tmp = DataService::tmp_search($y, $now2, 'N0001');
        if ($tmp === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $tmp = ArrayHelper::tmpreture($tmp);

        }
//        print_r($tmp);die;

//空气湿度
        $air = DataService::air_search($y, $now2, 'N0001');
        if ($air === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $air = ArrayHelper::tmpreture($air);
        }

        //土地温度
        $land = DataService::land_search($y, $now2, 'N0001');
        if ($land === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $land = ArrayHelper::tmpreture($land);
        }

        //土壤湿度
        $ldwt = DataService::ldwt_search($y, $now2, 'N0001');
        if ($ldwt === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $ldwt = ArrayHelper::tmpreture($ldwt);
        }

        //辐射
        $sun = DataService::sun_search($y, $now2, 'N0001');
        if ($sun === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $sun = ArrayHelper::tmpreture($sun);
        }


        //CO2
        $co2 = DataService::co2_search($y, $now2, 'N0001');
        if ($co2 === false) {
            $this->error('查询错误或者无数据');
            $this->redirect('/');
        } else {
            $co2 = ArrayHelper::tmpreture($co2);
        }


        $tmp = json_encode($tmp);
        $air = json_encode($air);
        $land = json_encode($land);
        $ldwt = json_encode($ldwt);
        $sun = json_encode($sun);
        $co2 = json_encode($co2);
//print_r($tmp);die;

        $this->stlist = $stlist;
        $this->sdate = $now2;

        $this->tmp = $tmp;
        $this->air = $air;
        $this->land = $land;
        $this->ldwt = $ldwt;
        $this->sun = $sun;
        $this->co2 = $co2;

        $this->sdate = $now2;
        $this->day = $now;
        $this->display();
    }

    public function getdata() {
        if (IS_POST) {
            $data = I('post.');
//            print_r($data);die;
            if ($data['sdate'] != date('Y-m-d')) {
                $day = $data['sdate']." ".'20:00:00';
                $y = date("Y-m-d",(strtotime($data['sdate']) - 3600*24)). " ".'20:00:00';
            } else {
                $day = date('Y-m-d H:i:s');
                $y = date("Y-m-d H:i:s",strtotime("-1 day"));
            }
//            print_r($data['station']);die;
            $tmp = DataService::tmp_search($y, $day, $data['station']);
            $tmp = ArrayHelper::tmpreture($tmp);
//            print_r($tmp);die;
            $air = DataService::air_search($y, $day, $data['station']);
            $air = ArrayHelper::tmpreture($air);
            $land = DataService::land_search($y, $day, $data['station']);
            $land = ArrayHelper::tmpreture($land);
            $ldwt = DataService::ldwt_search($y, $day, $data['station']);
            $ldwt = ArrayHelper::tmpreture($ldwt);
            $sun = DataService::sun_search($y, $day, $data['station']);
            $sun = ArrayHelper::tmpreture($sun);
            $co2 = DataService::co2_search($y, $day, $data['station']);
//            $outTmp = DataService::outTmp_search($y, $day);
//            $outTmp = ArrayHelper::outData($outTmp);

            $co2 = ArrayHelper::tmpreture($co2);
//print_r($co2);die;
            if ($tmp || $air || $land || $ldwt || $sun || $co2) {
                $this->ajaxReturn(['status' => true, 'info' => $tmp, 'air' => $air,
                    'land' => $land,
                    'ldwt' => $ldwt,
                    'sun' => $sun,
                    'co2' => $co2,
                    'sdate' => $day]);
            } else {
                $this->ajaxReturn(['status' => false, 'info' => '全部没数据']);
            }
        } else {
            $this->error('非法操作');
            $this->redirect('/');
        }
    }

    public function show_table() {


        session("download", null);

        $day = date('Y-m-d');//实际上线时候 吧这个注释去掉
        $hour = date('H');
        $now = $day.' '.$hour;
//         $now = '2015-05-28 10';
//        $now2 = '2015-05-28 10:00:00';
//        $y = "2015-05-27 10:00:00";
        $y = date("Y-m-d H:i:s",strtotime("-1 day"));
        $now2 = date("Y-m-d H:i:s");
        $stlist = DataService::GetStation();
        $st = I('get.station');
        if (!$st) {
            //空气温度
            $tmpnow150 = DataService::tmp_150($now, 'N0001');
            $tmpnow100 = DataService::tmp_100($now, 'N0001');
            $tmp = DataService::tmp_max_min($y, $now2, 'N0001');
//            print_r($tmp);
//             print_r($tmpnow);die;

            //空气湿度
            $air_wet_now = DataService::air_wet_t($now, "N0001");
            $air = DataService::air_max_min($y, $now2, "N0001");
//            print_r($air_wet_now);print_r($air);die;

            //土壤温度
            $ldair_now_0 = DataService::land_tmp_0($now, "N0001");
            $ldair_now_10 = DataService::land_tmp_10($now, "N0001");
            $ldair_now_20 = DataService::land_tmp_20($now, "N0001");
            $ldair = DataService::ldair_max_min($y, $now2, "N0001");
//            print_r($ldair_now_0);
//            print_r($ldair_now_10);
//            print_r($ldair_now_20);
//            print_r($ldair);die;
//            print_r($ldair);die;


            $ldwet_now_10 = DataService::land_wet_10($now, "N0001");
            $ldwet_now_20 = DataService::land_wet_20($now, "N0001");
            $ldwet_now_30 = DataService::land_wet_30($now, "N0001");
            $ldwet = DataService::ldwt_max_min($y, $now2, "N0001");


            $sun_all = DataService::sun_all($now, "N0001");
            $sun_par = DataService::sun_par($now, "N0001");
            $sun = DataService::sun_max($y, $now2, "N0001");

            $co2_now = DataService::co2_t($now, "N0001");
            $co2 = DataService::co2_max($y, $now2, "N0001");


            $station = DataService::GetStationDt()['N0001'];
        } else {
            //空气温度
            $tmpnow150 = DataService::tmp_150($now, $st);
            $tmpnow100 = DataService::tmp_100($now, $st);
            $tmp = DataService::tmp_max_min($y, $now2, $st);
//            print_r($tmp);
//             print_r($tmpnow);die;

            //空气湿度
            $air_wet_now = DataService::air_wet_t($now, $st);
            $air = DataService::air_max_min($y, $now2, $st);
//            print_r($air_wet_now);print_r($air);die;

            //土壤温度
            $ldair_now_0 = DataService::land_tmp_0($now, $st);
            $ldair_now_10 = DataService::land_tmp_10($now, $st);
            $ldair_now_20 = DataService::land_tmp_20($now, $st);
            $ldair = DataService::ldair_max_min($y, $now2, $st);
//            print_r($ldair_now_0);
//            print_r($ldair_now_10);
//            print_r($ldair_now_20);

            $ldwet_now_10 = DataService::land_wet_10($now, $st);
            $ldwet_now_20 = DataService::land_wet_20($now, $st);
            $ldwet_now_30 = DataService::land_wet_30($now, $st);
            $ldwet = DataService::ldwt_max_min($y, $now2, $st);
//            print_r($ldwet);die;


            $sun_all = DataService::sun_all($now, $st);
            $sun_par = DataService::sun_par($now, $st);
            $sun = DataService::sun_max($y, $now2, $st);

            $co2_now = DataService::co2_t($now, $st);
            $co2 = DataService::co2_max($y, $now2, $st);
            $station = DataService::GetStationDt()[$st];
        }
        $this->station = $station;
        $this->now = $now . '时';
        $this->tmpnow150 = $tmpnow150;
        $this->tmpnow100 = $tmpnow100;
        $this->tmp = $tmp;

        $this->stlist = $stlist;

        $this->air_wet_now = $air_wet_now;
        $this->air = $air;

        $this->ldair_now_0 = $ldair_now_0;
        $this->ldair_now_10 = $ldair_now_10;
        $this->ldair_now_20 = $ldair_now_20;
        $this->ldair = $ldair;
//        print_r($ldair);die;
        $this->ldwet_now_10 = $ldwet_now_10;
        $this->ldwet_now_20 = $ldwet_now_20;
        $this->ldwet_now_30 = $ldwet_now_30;
        $this->ldwet = $ldwet;

        $this->sunall = $sun_all;
        $this->sunpar = $sun_par;
        $this->sun = $sun;

        $this->co2_now = $co2_now;
        $this->co2 = $co2;
        $this->display();
    }
}