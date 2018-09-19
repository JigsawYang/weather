<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/8/14
 * Time: 11:53
 * Email: fadeblack307@163.com
 */
namespace Common\Component;
use Think\Db\Driver\Pdo;

class DisasterService {
    public static function baojing($time) {
        $model = D('Yujing');
        // print_r($time);die;
        $sql = sprintf("SELECT yj_content from t_yj where yj_dd = '%s' group by yj_content", $time);
        // select yj_content from t_yj where yj_dd =  group by yj_content
        // $yujing = $model->field('yj_tt, yj_content')->where(['yj_tt'=>$time])->select();
        // print_r($model->getLastSql());die;
        $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        $yujing = $Model->query($sql);
        return $yujing;


    }

    public static function yujing($time) {
        $model = M('featuredisaster');
        $feature = $model->field('id, title, addtime')->where(['daytime' => $time])->order('id desc')->select();
        return $feature;
    }

    public static function Landbaojing($time, $station) {
        $model = D("Yujing");
        $tmodel = D('Baojingtype');
        $info = array();
        // print_r($time);die;
        // $sql = sprintf("SELECT yj_tq_type, yj_xzqh_name, yj_zd_name, yj_tq_grade, yj_tq_name, yj_content from t_yj where yj_dd = '%s' group by yj_content", $time);
        // $Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
        // $baojing = $Model->query($sql);
        $baojing = $model->field('yj_tt, yj_tq_type, yj_xzqh_name, yj_zd_name, yj_tq_grade, yj_tq_name, yj_content')->where(['yj_dd'=>$time, 'yj_zd_code'=>$station])->select();
       // print_r($model->getLastSql());die;
           // print_r($baojing);die;

        $info = array();
        foreach($baojing as $key => $val) {
            $tp = $tmodel->field('tq_note, icon')->where(['tq_type_parent_id' => $val['yj_tq_type'], 'tq_grade' => $val['yj_tq_grade']])->select();
//            print_r($tp);die;
            $val['y_type'] = $tp[0]['tq_note'];
            $val['icon'] = $tp[0]['icon'];
            array_push($info, $val);
        }
//        print_r($info);die;
        return $info;
    }
}