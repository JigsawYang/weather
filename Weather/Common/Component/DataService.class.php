<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/2
 * Time: 10:08
 * Email: fadeblack307@163.com
 */

namespace Common\Component;
use Think\Db\Driver\Pdo;

class DataService {

    public static function Warning_cold($date, $station)
    {
        $sql = sprintf("SELECT [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['ta_cd'] / 10;
//        $airnum = 1;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Warning_hot($date, $station)
    {
        $sql = sprintf("SELECT [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['ta_cd'] / 10;
        // print_r($airnum);die;
//        $airnum = 1;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        // print_r($result);die;
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum >= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
        // print_r($temp);die;
        return $temp;
    }

    public static function Warning_airdry($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 20:00:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $tempnum = 0;
        $flag = 0;
        foreach ($res as $key => $val) {
            $tempnum += $val['rh_c'];
            $flag += 1;
        }
        $airdry = $tempnum / $flag;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'airdry'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airdry <= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Warning_landdry($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [SH_M] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 20:00:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $tempnum = 0;
        $flag = 0;
        foreach ($res as $key => $val) {
            $tempnum += $val['sh_m'];
            $flag += 1;
        }
        $landdry = $tempnum / $flag;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'landdry'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($landdry <= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Warning_airwet($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 20:00:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $tempnum = 0;
        $flag = 0;
        foreach ($res as $key => $val) {
            $tempnum += $val['rh_c'];
            $flag += 1;
        }
        $airdry = $tempnum / $flag;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'airwet'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airdry >= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Warning_landwet($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [SH_M] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 20:00:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $tempnum = 0;
        $flag = 0;
        foreach ($res as $key => $val) {
            $tempnum += $val['sh_m'];
            $flag += 1;
        }
        $landdry = $tempnum / $flag;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'landwet'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($landdry <= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Warning_sun($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [R_D] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 20:00:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $tempnum = 0;
        $flag = 0;
        foreach ($res as $key => $val) {
            $tempnum += $val['r_d'];
            $flag += 1;
        }
        $landdry = $tempnum / $flag;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'sun'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($landdry <= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function get_warning_date()
    {
        $day = date('Y-m-d');
        $hour = date('H');
        $now = $day . ' ' . $hour;

        //上线注释
        $now = '2015-06-01 09';

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
        return ["now1" => $now1, "yesterday" => $yesterday1, "now" => $now];
    }

    public static function get_all_warning($now, $now1, $yesterday1, $st)
    {
        $cold = self::Warning_cold($now, $st);
        $hot = self::Warning_hot($now, $st);
        $airdry = self::Warning_airdry($yesterday1, $now1, $st);
        $landdry = self::Warning_landdry($yesterday1, $now1, $st);
        $airwet = self::Warning_airwet($yesterday1, $now1, $st);
        $landwet = self::Warning_landwet($yesterday1, $now1, $st);
        $sun = self::Warning_sun($yesterday1, $now1, $st);
        $station = self::$station_dict[$st];
        $res = ['cold' => $cold, 'hot' => $hot, 'airdry' => $airdry,
            'landdry' => $landdry, 'airwet' => $airwet, 'landwet' => $landwet,
            'sun' => $sun];
        return $res;
    }

    public static function all_warning_result() {
        $res = self::get_warning_date();
        $now = $res['now'];
        $now1 = $res['now1'];
        $yesterday1 = $res['yesterday'];
        $all = [];
//
        foreach (self::GetStation() as $k => $v) {
            $temp = self::get_all_warning($now, $now1, $yesterday1, $v['id']);
//            print_r($temp);
            if ($temp['cold']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内气温过低，部分农作物将遭受冻害影响';
//                print_r($content);die;
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['hot']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内气温过高，部分农作物将受到热害影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['airdry']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内湿度过低，部分农作物将受到干旱影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['landdry']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内土壤湿度过低，部分农作物将受到干旱影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['airwet']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内空气湿度过高，部分农作物将受到过湿影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['landwet']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '当前室内土壤湿度过高，部分农作物将受到过湿影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['sun']) {
                $ms = [];
                $content = $v['location'] . '--' . $v['zdmc'] . ' ' . '室内光照不足，光合作用微弱';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
        }
//        print_r($all);die;
        return $all;
    }

    static $station_dict = [
        'H0002' => '旧式温室',
        'N0001' => '厚墙体ii',
        'N0002' => '厚墙体iii',
        'N0003' => '厚墙体i',
        'N0004' => '37墙节能',
        'N0005' => '机建墙体'
    ];

    public static function GetStation() {
        $model = D("Ghstation");
        $res = $model->field('id,zdmc,location')->select();
//        print_r($res);die;
        return $res;
    }

//************************************************************************************
//************************************************************************************
//上线该成户外站点表
//*************************************************************************************
//*******************************************************************************
    public static function GetLandStation() {
        $model = M("landstation");
        $res = $model->field('id, location')->select();
//        print_r($res);die;
        return $res;
    }


    public static function getlocation() {
        $model = D('Ghstation');
        $res = $model->Distinct(true)->field('location')->select();
//        print_r($res);die;
        return $res;
    }

    public static function tmp_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [TA_CU], [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
//        print_r($sql);die;
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
//        print_r($res);die;
        return $res;
    }

    public static function air_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        return $res;
    }

    public static function land_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [TS_U], [TS_M], [TS_D] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        return $res;
    }

    public static function ldwt_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [SH_U], [SH_M], [SH_D] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        return $res;
    }

    public static function sun_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [R_U], [PAR_U] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        return $res;
    }
    public static function co2_search($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [time], [CO2_U] FROM [tabtimedata] where [id] = '%s' and [time] between '%s' and '%s' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        return $res;
    }

    public static function TmpReport($date, $station)
    {
        $standarModel = M('standar');
//        $dataModel = D('Tabtimedata');
        $result = [];

        $sql = sprintf("SELECT [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['ta_cd'] / 10;


        $sql = sprintf("SELECT [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airwetnum = round($res[0]['rh_c']);

        $sql = sprintf("SELECT [TS_M] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $landnum = $res[0]['ts_m'] / 10;


        $sql = sprintf("SELECT [SH_M] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $landwetnum = $res[0]['sh_m'];
        $landwetnum = round($landwetnum);
//        print_r(round($landwetnum));die;



        $sql = sprintf("SELECT [R_U] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $sunnum = $res[0]['r_u'];


        foreach (self::$plant_dict as $pid => $val) {
            $name = self::$plant_dict[$pid]['name'];
            $flag = 1;
            foreach ($val as $key => $grow) {
                if ($key == 'name') {
                    continue;
                }
                if ($flag == 1) {
                    $metadata = ['name' => $name, 'huaqi' => $val[$key]];
                    $flag += 1;
                } else {
                    $metadata = ['name' => '', 'huaqi' => $val[$key]];
                }
                array_push($result, $metadata);
            }
        }


        if ($airnum) {

            $airtemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'TA_CD'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($airnum > $sdata['t50d'] && $airnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $tm = $sdata['t50dis'];
                            array_push($airtemp, $tm);
                        }
                    }


                }
            }
            self::merge($result, $airtemp, 'air');
        } else {
            self::merge_null($result, 'air');
        }


        if ($airwetnum) {
            $awettemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'RH_C'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($airwetnum > $sdata['t50d'] && $airwetnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $wet = $sdata['t50dis'];
                            array_push($awettemp, $wet);
                        }
                    }


                }
            }
            self::merge($result, $awettemp, 'airwet');
        } else {
            self::merge_null($result, 'airwet');
        }


        if ($landnum) {
            $landtemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'TS_M'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($landnum > $sdata['t50d'] && $landnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $land = $sdata['t50dis'];
                            array_push($landtemp, $land);
                        }
                    }


                }
            }
            self::merge($result, $landtemp, 'land');
        } else {
            self::merge_null($result, 'land');
        }


        if ($landwetnum) {
            $landwettemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'SH_M'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($landwetnum > $sdata['t50d'] && $landwetnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $landwet = $sdata['t50dis'];
                            array_push($landwettemp, $landwet);
                        }
                    }


                }
            }
            self::merge($result, $landwettemp, 'landwet');
        } else {
            self::merge_null($result, 'landwet');
        }


        if ($sunnum) {
            $suntemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'R_U'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($sunnum > $sdata['t50d'] && $sunnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $sun = $sdata['t50dis'];
                            array_push($suntemp, $sun);
                        }
                    }


                }
            }
            self::merge($result, $suntemp, 'sun');
        } else {
            self::merge_null($result, 'sun');
        }

        self::merge_null($result, 'co2');
        // $tmppp = [];

        // $tmppp['airtmp'] = $airnum;
        // $tmppp['airwet'] = $airwetnum;
        // $tmppp['landtmp'] = $landnum;
        // $tmppp['landwet'] = $landwetnum;
        // $tmppp['sun'] = $sunnum;
        // $result['topnum'] = $tmppp;

        return $result;
    }

    public static function TopNUM($date, $station)
    {
        $standarModel = M('standar');
//        $dataModel = D('Tabtimedata');
        $result = [];

        $sql = sprintf("SELECT [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['ta_cd'] / 10;


        $sql = sprintf("SELECT [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airwetnum = round($res[0]['rh_c']);

        $sql = sprintf("SELECT [TS_M] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $landnum = $res[0]['ts_m'] / 10;


        $sql = sprintf("SELECT [SH_M] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $landwetnum = $res[0]['sh_m'];
        $landwetnum = round($landwetnum);
//        print_r(round($landwetnum));die;



        $sql = sprintf("SELECT [R_U] FROM [tabtimedata] where [id] = '%s' and [time] = '%s:00:00.000'", $station, $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $sunnum = $res[0]['r_u'];


        foreach (self::$plant_dict as $pid => $val) {
            $name = self::$plant_dict[$pid]['name'];
            $flag = 1;
            foreach ($val as $key => $grow) {
                if ($key == 'name') {
                    continue;
                }
                if ($flag == 1) {
                    $metadata = ['name' => $name, 'huaqi' => $val[$key]];
                    $flag += 1;
                } else {
                    $metadata = ['name' => '', 'huaqi' => $val[$key]];
                }
                array_push($result, $metadata);
            }
        }


        if ($airnum) {

            $airtemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'TA_CD'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($airnum > $sdata['t50d'] && $airnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $tm = $sdata['t50dis'];
                            array_push($airtemp, $tm);
                        }
                    }


                }
            }
            self::merge($result, $airtemp, 'air');
        } else {
            self::merge_null($result, 'air');
        }


        if ($airwetnum) {
            $awettemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'RH_C'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($airwetnum > $sdata['t50d'] && $airwetnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $wet = $sdata['t50dis'];
                            array_push($awettemp, $wet);
                        }
                    }


                }
            }
            self::merge($result, $awettemp, 'airwet');
        } else {
            self::merge_null($result, 'airwet');
        }


        if ($landnum) {
            $landtemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'TS_M'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($landnum > $sdata['t50d'] && $landnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $land = $sdata['t50dis'];
                            array_push($landtemp, $land);
                        }
                    }


                }
            }
            self::merge($result, $landtemp, 'land');
        } else {
            self::merge_null($result, 'land');
        }


        if ($landwetnum) {
            $landwettemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'SH_M'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($landwetnum > $sdata['t50d'] && $landwetnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $landwet = $sdata['t50dis'];
                            array_push($landwettemp, $landwet);
                        }
                    }


                }
            }
            self::merge($result, $landwettemp, 'landwet');
        } else {
            self::merge_null($result, 'landwet');
        }


        if ($sunnum) {
            $suntemp = [];
            foreach (self::$plant_dict as $pid => $val) {
                foreach ($val as $key => $grow) {
                    if ($key == 'name') {
                        continue;
                    }

                    $temp = $standarModel->where(['PLANTID' => $pid, 'FYQID' => $key, 'STYPE' => 'R_U'])->select();
                    foreach ($temp as $index => $sdata) {
                        if ($sunnum > $sdata['t50d'] && $sunnum < $sdata['t50u']) {
//                       print_r($sdata['t50dis']);
                            $sun = $sdata['t50dis'];
                            array_push($suntemp, $sun);
                        }
                    }


                }
            }
            self::merge($result, $suntemp, 'sun');
        } else {
            self::merge_null($result, 'sun');
        }

        self::merge_null($result, 'co2');
        $tmppp = [];

        $tmppp['airtmp'] = $airnum;
        $tmppp['airwet'] = $airwetnum;
        $tmppp['landtmp'] = $landnum;
        $tmppp['landwet'] = $landwetnum;
        $tmppp['sun'] = $sunnum;
        $result['topnum'] = $tmppp;

        return $tmppp;
    }

    static function merge(&$src, $dis, $type)
    {
        foreach ($src as $key => $val) {
            $temp = [$type => array_shift($dis)];
            $new = array_merge($val, $temp);

            $src[$key] = $new;
        }

    }

    static function merge_null(&$src, $type)
    {
        foreach ($src as $key => $val) {
            $temp = [$type => '没有数据'];
            $new = array_merge($val, $temp);

            $src[$key] = $new;
        }

    }

    static $plant_dict = [
        1 => ['name' => '菜豆', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        2 => ['name' => '蚕豆', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        3 => ['name' => '草莓', 2 => '成果期', 3 => '成花期', 4 => '花蕾期', 7 => '花芽膨大', 17 => '盛花期'],
        4 => ['name' => '大白菜', 10 => '结球期', 13 => '苗期', 19 => '坐莲期'],
        5 => ['name' => '番茄', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        6 => ['name' => '甘蓝', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        7 => ['name' => '胡萝卜', 11 => '茎叶生长期', 13 => '苗期', 14 => '肉根膨大期'],
        8 => ['name' => '花椰菜', 6 => '花球形成期', 9 => '结荚期', 12 => '莲座期', 13 => '苗期'],
        9 => ['name' => '黄瓜', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        10 => ['name' => '豇豆', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        11 => ['name' => '萝卜', 11 => '茎叶生长期', 13 => '苗期', 15 => '肉质生长期'],
        12 => ['name' => '马铃薯', 11 => '茎叶生长期', 13 => '苗期', 15 => '肉质生长期'],
        13 => ['name' => '茄子', 5 => '花期', 13 => '苗期', 18 => '食用期'],
        14 => ['name' => '芹菜', 11 => '茎叶生长期', 13 => '苗期'],
        15 => ['name' => '青椒', 5 => '花期', 13 => '苗期', 18 => '食用期'],
        16 => ['name' => '水萝卜', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        17 => ['name' => '甜菜', 1 => '成熟期', 13 => '苗期'],
        18 => ['name' => '甜瓜', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        19 => ['name' => '豌豆', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        20 => ['name' => '芜荽', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        21 => ['name' => '西瓜', 8 => '结果期', 13 => '苗期', 16 => '伸蔓期'],
        22 => ['name' => '西葫芦', 1 => '成熟期', 5 => '花期', 13 => '苗期'],
        23 => ['name' => '小油菜', 1 => '成熟期', 5 => '花期', 13 => '苗期']

    ];
    public static function GetStationDt() {
        $model = D("Ghstation");
        $res = $model->field('id,zdmc,location')->select();
        $st = [];
        foreach ($res as $key => $v) {
            $st[$v['id']] = [$v['location'], $v['zdmc']];
        }
//        print_r($st);die;
        return $st;
    }

    public static function GetLandStationDt() {
        $model = M("landstation");
        $res = $model->field('id, location')->select();
        $st = [];
        foreach ($res as $key => $v) {
            $st[$v['id']] = $v['location'];
        }
//        print_r($st);die;
        return $st;
    }

    public static function findstation($location, $st) {
        $model = D("Ghstation");
        $res = $model->where("location='%s' and zdmc='%s'", $location, $st)->field('id,zdmc,location')->select();
//        print_r($model->getlastsql());die;
        return $res;
    }

    public static function air($date1, $date2, $station)
    {
        $sql = sprintf("SELECT [TA_CU] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        // echo $sql;die;
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $air = $Model->query($sql);
        // print_r($air);die;
//        sort($res[0]);
        $result = [];
        $temp = [];
        foreach ($air as $key => $val) {
            array_push($temp, $val['ta_cu']);
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)) / 10, 3);
        $result['air150tpd'] = $temp[0] / 10;
        $result['air150tpg'] = $temp[count($temp) - 1] / 10;
        $result['air150tpav'] = $av;

        $sql = sprintf("SELECT [RH_C] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $wet = $Model->query($sql);
        $temp = [];
        foreach ($wet as $key => $val) {
            array_push($temp, round($val['rh_c']));
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)), 3);
        $result['air150wetd'] = $temp[0];
        $result['air150wetg'] = $temp[count($temp) - 1];
        $result['air150wetav'] = $av;

        $sql = sprintf("SELECT [TA_CD] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $wet = $Model->query($sql);
        $temp = [];
        foreach ($wet as $key => $val) {
            array_push($temp, $val['ta_cd']);
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)) / 10, 3);
        $result['air50tpd'] = $temp[0] / 10;
        $result['air50tpg'] = $temp[count($temp) - 1] / 10;
        $result['air50tpav'] = $av;

        $sql = sprintf("SELECT [RH_W] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $wet = $Model->query($sql);
        $temp = [];
        foreach ($wet as $key => $val) {
            array_push($temp, round($val['rh_w']));
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)), 3);
        $result['air50wetd'] = $temp[0];
        $result['air50wetg'] = $temp[count($temp) - 1];
        $result['air50wetav'] = $av;

//        print_r($result);
//        die;
        return $result;
    }

    public static function land($date1, $date2, $station)
    {
        $result = [];

        $sql = sprintf("SELECT [TS_U] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, $val['ts_u']);
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)) / 10, 3);
        $result['land0tpd'] = $temp[0] / 10;
        $result['land0tpg'] = $temp[count($temp) - 1] / 10;
        $result['land0tpav'] = $av;


        $sql = sprintf("SELECT [SH_U] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, round($val['sh_u']));
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)), 3);
        $result['land0wetd'] = $temp[0];
        $result['land0wetg'] = $temp[count($temp) - 1];
        $result['land0wetav'] = $av;

        $sql = sprintf("SELECT [TS_M] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, $val['ts_m']);
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)) / 10, 3);
        $result['land10tpd'] = $temp[0] / 10;
        $result['land10tpg'] = $temp[count($temp) - 1] / 10;
        $result['land10tpav'] = $av;

        $sql = sprintf("SELECT [SH_M] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, round($val['sh_m']));
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)), 3);
        $result['land10wetd'] = $temp[0];
        $result['land10wetg'] = $temp[count($temp) - 1];
        $result['land10wetav'] = $av;

        $sql = sprintf("SELECT [TS_D] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, $val['ts_d']);
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)) / 10, 3);
        $result['land20tpd'] = $temp[0] / 10;
        $result['land20tpg'] = $temp[count($temp) - 1] / 10;
        $result['land20tpav'] = $av;

        $sql = sprintf("SELECT [SH_D] FROM [tabtimedata] where [id] = '%s' and [time] between '%s 20:00:00.000' and '%s 23:50:00.000'", $station, $date1, $date2);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $land = $Model->query($sql);
//        sort($res[0]);
        $temp = [];
        foreach ($land as $key => $val) {
            array_push($temp, round($val['sh_d']));
        }
        sort($temp);
        $av = round((array_sum($temp) / count($temp)), 3);
        $result['land20wetd'] = $temp[0];
        $result['land20wetg'] = $temp[count($temp) - 1];
        $result['land20wetav'] = $av;

//        print_r($result);
//        die;
        return $result;
    }

    static function export_csv($filename, $data)
    {
        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=" . $filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');
        echo $data;
    }

    static function exportData($sdate, $edate, $station)
    {
        $sql = sprintf("SELECT [time], [TA_CU], [TA_CD], [RH_C], [TS_U], [TS_M], [TS_D], [SH_U], [SH_M], [SH_D], [R_U], [PAR_U], [CO2_U]  FROM [tabtimedata] where [id] = '%s' and [time] between '%s 00:00:00.000' and '%s 23:50:00.000' AND DATEPART(MINUTE,[time])=0 AND DATEPART(SECOND,[time])=0", $station, $sdate, $edate);
        $conInfo = array('Database' => 'nqdb-new', 'UID' => 'sa', 'PWD' => '2103189');

        $conn = sqlsrv_connect('localhost', $conInfo);
        if ($conn == false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = sqlsrv_query($conn, $sql);
//        print_r($result);die;
        $str = "时间,150cm空气温度,100cm空气温度,空气湿度,0cm土壤温度,-10cm土壤温度,-20cm土壤温度,0cm土壤湿度,-10cm土壤湿度,-20cm土壤湿度,150cm辐射,有效辐射,co2浓度,站点\n";
        $str = iconv('utf-8', 'gb2312', $str);
        while ($row = sqlsrv_fetch_array($result)) {
//            print_r($row);die;
            $htime = iconv('utf-8', 'gb2312', $row['time']->format("Y-m-d H:i:s"));
            $tp150 = iconv('utf-8', 'gb2312', $row['TA_CU'] / 10);
            $tp100 = iconv('utf-8', 'gb2312', $row['TA_CD'] / 10);
            $air = iconv('utf-8', 'gb2312', $row['RH_C']);
            $landtp0 = iconv('utf-8', 'gb2312', $row['TS_U'] / 10);
            $landtp10 = iconv('utf-8', 'gb2312', $row['TS_M'] / 10);
            $landtp20 = iconv('utf-8', 'gb2312', $row['TS_D'] / 10);
            $landwet0 = iconv('utf-8', 'gb2312', $row['SH_U']);
            $landwet10 = iconv('utf-8', 'gb2312', $row['SH_M']);
            $landwet20 = iconv('utf-8', 'gb2312', $row['SH_D']);
            $sun150 = iconv('utf-8', 'gb2312', $row['R_U']);
            $sun = iconv('utf-8', 'gb2312', $row['PAR_U']);
            $co2 = iconv('utf-8', 'gb2312', $row['CO2_U']);
            $st = iconv('utf-8', 'gb2312', self::$station_dict[$station]);
            $str .= $htime . "," . $tp150 . "," . $tp100 . "," . $air . "," . $landtp0 . "," . $landtp10 . "," . $landtp20 . "," . $landwet0 . "," . $landwet10 . "," . $landwet20 . "," . $sun150 . "," . $sun . "," . $co2 . "," . $st . "\n";
        }
        $filename = date('Ymd') . '.csv';
        self::export_csv($filename, $str);
        exit;
    }

    public static function Fwarning_cold($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Fwarning_hot($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('tg')->select();
        $airnum = $res[0]['tg'];
//        $airnum = 1;
        $model = M('warning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum >= $val['sd']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Fwarning_sun($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('yl24, yl48, yl72')->select();
//        print_r($res);die;
//        $airnum = 1;
//        $model = M('warning');
        $temp = [];
//        $result = $model->where(['type' => 'hot'])->select();
//        if ($res != null) {
//            foreach($result as $key => $val) {
//                if ($airnum >= $val['sd']) {
//                    array_push($temp, $val);
//                }
//            }
//        }
//        print_r($temp);die;
        foreach ($res as $key => $val) {
            if ($val > 7) {
                $temp['dis'] = '未来72小时天空以阴为主，将影响室内光照，部分作物光合作用微弱，请视具体情况采取适当措施抑制作物呼吸作用';
                break;
            }
        }
        return $temp;
    }

    public static function Landwarning_cold($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Landwarning_ice($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'ice'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Landwarning_hot($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Flandwarning_cold($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Flandwarning_ice($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'ice'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Flandwarning_hot($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('landwarning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }


    public static function Treewarning_cold($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Treewarning_ice($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'ice'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Treewarning_hot($date, $station)
    {
        $sql = sprintf("SELECT [BC] FROM [nqdb-new].[dbo].[H".$station."] where [TT] = '%s:00:00.000'", $date);
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $res = $Model->query($sql);
        $airnum = $res[0]['BC'] / 10;
//        $airnum = 1;
//        print_r($res);die;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Ftreewarning_cold($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'cold'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Ftreewarning_ice($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'ice'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    public static function Ftreewarning_hot($tm, $station)
    {
        $model = D('Ssnydpyb');
        $res = $model->where(['station' => $station, 'time' => $tm])->field('td')->select();
        $airnum = $res[0]['td'];
//        $airnum = 1;
        $model = M('treewarning');
        $temp = [];
        $result = $model->where(['type' => 'hot'])->select();
        if ($res != null) {
            foreach ($result as $key => $val) {
                if ($airnum > $val['sd'] && $airnum <= $val['sg']) {
                    array_push($temp, $val);
                }
            }
        }
//        print_r($temp);die;
        return $temp;
    }

    static function get_month($date1, $date2, $tags = '-')
    {
        $date1 = explode($tags, $date1);
        $date2 = explode($tags, $date2);
        return abs($date1[0] - $date2[0]) * 12 + abs($date1[1] - $date2[1]);
    }

    public static function weather_rp($station, $time) {
//        print_r($time);die;

        $model = D('Weather_forecast');
        $res = $model->where(['stationID' => $station, 'qbsj' => $time])->field("maxT24,minT24,nWeather24,maxT48,minT48,nWeather48,maxT72,minT72,nWeather72")->select();
        $res = json_encode($res);
//        print_r($res);die;
        $tmp = [];
        $day1 = date("Y-m-d",(strtotime($time) - 3600*168));
//        $day1 = date("Y-m-d", strtotime("-7 day"));
        $day2 = date("Y-m-d",(strtotime($time) - 3600*144));
//        $day2 = date("Y-m-d", strtotime("-6 day"));
        $day3 = date("Y-m-d",(strtotime($time) - 3600*120));
//        $day3 = date("Y-m-d", strtotime("-5 day"));
        $day4 = date("Y-m-d",(strtotime($time) - 3600*96));
//        $day4 = date("Y-m-d", strtotime("-4 day"));
        $day5 = date("Y-m-d",(strtotime($time) - 3600*72));
//        $day5 = date("Y-m-d", strtotime("-3 day"));
        $day6 = date("Y-m-d",(strtotime($time) - 3600*48));
//        $day6 = date("Y-m-d", strtotime("-2 day"));
        $day7 = date("Y-m-d",(strtotime($time) - 3600*24));
//        $day7 = date("Y-m-d", strtotime("-1 day"));

        $day8 = $time;
        $day9 = date("Y-m-d",(strtotime($time) + 3600*24));

//        $day9 = date("Y-m-d", strtotime("+1 day"));
        $day10 = date("Y-m-d",(strtotime($time) + 3600*48));

//        $day10 = date("Y-m-d", strtotime("+2 day"));

        $day1 = "2015-06-24";
        $day2 = "2015-06-25";
        $day3 = "2015-06-26";
        $day4 = "2015-06-27";
        $day5 = "2015-06-28";
        $day6 = "2015-06-29";
        $day7 = "2015-06-30";


        $sql1a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day1." 01:00:00.000 '"." AND '".$day1." 23:00:00.000' ");
        $sql1b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day1." 01:00:00.000 '"." AND '".$day1." 23:00:00.000' ");
        $sql1c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day1." 01:00:00.000 '"." AND '".$day1." 23:00:00.000' ");

        $sql2a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day2." 01:00:00.000 '"." AND '".$day2." 23:00:00.000' ");
        $sql2b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day2." 01:00:00.000 '"." AND '".$day2." 23:00:00.000' ");
        $sql2c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day2." 01:00:00.000 '"." AND '".$day2." 23:00:00.000' ");

        $sql3a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day3." 01:00:00.000 '"." AND '".$day3." 23:00:00.000' ");
        $sql3b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day3." 01:00:00.000 '"." AND '".$day3." 23:00:00.000' ");
        $sql3c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day3." 01:00:00.000 '"." AND '".$day3." 23:00:00.000' ");

        $sql4a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day4." 01:00:00.000 '"." AND '".$day4." 23:00:00.000' ");
        $sql4b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day4." 01:00:00.000 '"." AND '".$day4." 23:00:00.000' ");
        $sql4c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day4." 01:00:00.000 '"." AND '".$day4." 23:00:00.000' ");

        $sql5a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day5." 01:00:00.000 '"." AND '".$day5." 23:00:00.000' ");
        $sql5b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day5." 01:00:00.000 '"." AND '".$day5." 23:00:00.000' ");
        $sql5c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day5." 01:00:00.000 '"." AND '".$day5." 23:00:00.000' ");

        $sql6a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day6." 01:00:00.000 '"." AND '".$day6." 23:00:00.000' ");
        $sql6b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day6." 01:00:00.000 '"." AND '".$day6." 23:00:00.000' ");
        $sql6c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day6." 01:00:00.000 '"." AND '".$day6." 23:00:00.000' ");

        $sql7a = sprintf("select min(BC) from H".$station." WHERE TT between '".$day7." 01:00:00.000 '"." AND '".$day7." 23:00:00.000' ");
        $sql7b = sprintf("select max(BC) from H".$station." WHERE TT between '".$day7." 01:00:00.000 '"." AND '".$day7." 23:00:00.000' ");
        $sql7c = sprintf("select max(BA) from H".$station." WHERE TT between '".$day7." 01:00:00.000 '"." AND '".$day7." 23:00:00.000' ");

        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $for1a = $Model->query($sql1a);
        $for1b = $Model->query($sql1b);
        $for1c = $Model->query($sql1c);

        $for2a = $Model->query($sql2a);
        $for2b = $Model->query($sql2b);
        $for2c = $Model->query($sql2c);

        $for3a = $Model->query($sql3a);
        $for3b = $Model->query($sql3b);
        $for3c = $Model->query($sql3c);

        $for4a = $Model->query($sql4a);
        $for4b = $Model->query($sql4b);
        $for4c = $Model->query($sql4c);

        $for5a = $Model->query($sql5a);
        $for5b = $Model->query($sql5b);
        $for5c = $Model->query($sql5c);

        $for6a = $Model->query($sql6a);
        $for6b = $Model->query($sql6b);
        $for6c = $Model->query($sql6c);

        $for7a = $Model->query($sql7a);
        $for7b = $Model->query($sql7b);
        $for7c = $Model->query($sql7c);

        $f = [];
        $f['time'] = $day1;
        $f['max'] = self::getfloat($for1b);
        $f['min'] = self::getfloat($for1a);
        $f['water'] = number_format((float)$for1c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day2;
        $f['max'] = self::getfloat($for2b);
        $f['min'] = self::getfloat($for2a);
        $f['water'] = number_format((float)$for2c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day3;
        $f['max'] = self::getfloat($for3b);
        $f['min'] = self::getfloat($for3a);
        $f['water'] = number_format((float)$for3c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day4;
        $f['max'] = self::getfloat($for4b);
        $f['min'] = self::getfloat($for4a);
        $f['water'] = number_format((float)$for4c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day5;
        $f['max'] = self::getfloat($for5b);
        $f['min'] = self::getfloat($for5a);
        $f['water'] = number_format((float)$for5c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day6;
        $f['max'] = self::getfloat($for6b);
        $f['min'] = self::getfloat($for6a);
        $f['water'] = number_format((float)$for6c[0][NULL],1);
        array_push($tmp, $f);

        $f['time'] = $day7;
        $f['max'] = self::getfloat($for7b);
        $f['min'] = self::getfloat($for7a);
        $f['water'] = number_format((float)$for7c[0][NULL],1);
        array_push($tmp, $f);
//        print_r($Model->getLastSql());
//        echo number_format((float)$for1[0][NULL]/10,2);
        $t = [];
        $t['time'] = $day8; $t['max'] = $res[0]['maxt24']; $t['min'] = $res[0]['mint24'];
        array_push($tmp, $t);

        $t['time'] = $day9; $t['max'] = $res[0]['maxt48']; $t['min'] = $res[0]['mint48'];
        array_push($tmp, $t);

        $t['time'] = $day10; $t['max'] = $res[0]['maxt72']; $t['min'] = $res[0]['mint72'];
        array_push($tmp, $t);
//        print_r(json_encode($tmp));die;
        return $tmp;
    }

    static function getfloat($a) {
        $f = number_format((float)$a[0][NULL]/10,2);
        return $f;
    }

    public static function weather_sky($station, $time)
    {
        $model = D('Weather_forecast');
        $m = M('wtype');
        $res = $model->where(['stationID' => $station, 'qbsj' => $time])->field("maxT24,minT24,nWeather24,maxT48,minT48,nWeather48,maxT72,minT72,nWeather72")->select();
//        $res = json_encode($res);
        $tmp = [];
        $s24 = $m->where(['code' => $res[0]['nweather24']])->field('icon')->select();
        $s48 = $m->where(['code' => $res[0]['nweather48']])->field('icon')->select();
        $s72 = $m->where(['code' => $res[0]['nweather72']])->field('icon')->select();


        $day8 = date("Y-m-d");
        $day9 = date("Y-m-d", strtotime("+1 day"));
        $day10 = date("Y-m-d", strtotime("+2 day"));

        $t = [];
        $t['time'] = $day8;
        $t['icon'] = $s24[0]['icon'];
        array_push($tmp, $t);

        $t['time'] = $day9;
        $t['icon'] = $s48[0]['icon'];
        array_push($tmp, $t);
        $t['time'] = $day10;
        $t['icon'] = $s72[0]['icon'];
        array_push($tmp, $t);
//        print_r($tmp);die;
        return $tmp;

    }
}