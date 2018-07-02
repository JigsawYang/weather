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
        foreach (self::$station_dict as $k => $v) {
            $temp = self::get_all_warning($now, $now1, $yesterday1, $k);
//            print_r($temp);
            if ($temp['cold']) {
                $ms = [];
                $content = $v . ' ' . '当前室内气温过低，部分农作物将遭受冻害影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['hot']) {
                $ms = [];
                $content = $v . ' ' . '当前室内气温过高，部分农作物将受到热害影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['airdry']) {
                $ms = [];
                $content = $v . ' ' . '当前室内湿度过低，部分农作物将受到干旱影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['landdry']) {
                $ms = [];
                $content = $v . ' ' . '当前室内土壤湿度过低，部分农作物将受到干旱影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['airwet']) {
                $ms = [];
                $content = $v . ' ' . '当前室内空气湿度过高，部分农作物将受到过湿影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['landwet']) {
                $ms = [];
                $content = $v . ' ' . '当前室内土壤湿度过高，部分农作物将受到过湿影响';
                $ms["content"] = $content;
                $ms['tm'] = $now;
                array_push($all, $ms);
            }
            if ($temp['sun']) {
                $ms = [];
                $content = $v . ' ' . '室内光照不足，光合作用微弱';
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

}