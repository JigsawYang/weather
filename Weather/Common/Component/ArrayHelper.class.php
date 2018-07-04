<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/7/2
 * Time: 15:38
 * Email: fadeblack307@163.com
 */

namespace Common\Component;

class ArrayHelper {
    public static function tmpreture($arr_data) {
        if ($arr_data) {
            foreach($arr_data as $key => $val) {
                $arr_data[$key]['time'] = substr($val['time'], 11, 5);
            }
        }
        return $arr_data;
    }

    public static function outData($arr_data) {
        if ($arr_data) {
            foreach($arr_data as $key => $val) {
                $arr_data[$key]['tt'] = substr($val['tt'], 11, 5);
            }
        }
        return $arr_data;
    }
    public static function outFloatData($arr_data) {
        if ($arr_data) {
            foreach($arr_data as $key => $val) {
                $arr_data[$key]['tt'] = substr($val['tt'], 11, 5);
                $arr_data[$key]['af'] = $val['af'] / 10.0;
            }
        }
        return $arr_data;
    }
}