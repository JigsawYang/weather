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
//        print_r($all);
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

    public static function findstation($location, $st) {
        $model = D("Ghstation");
        $res = $model->where("location='%s' and zdmc='%s'", $location, $st)->field('id,zdmc,location')->select();
//        print_r($model->getlastsql());die;
        return $res;
    }

}