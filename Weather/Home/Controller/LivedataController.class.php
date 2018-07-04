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
}