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
        $yujing = $model->field('yj_tt, yj_content')->where(['yj_tt' => $time])->select();
        return $yujing;


    }

    public static function yujing($time) {
        $model = M('featuredisaster');
        $feature = $model->field('id, title, addtime')->where(['daytime' => $time])->order('id desc')->select();
        return $feature;
    }
}