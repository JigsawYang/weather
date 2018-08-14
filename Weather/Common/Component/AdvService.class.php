<?php

namespace Common\Component;
use Admin\Common\Pinyin;

/**
 * Class DataService
 *
 * @package Common\Component
 * @author Jerry Hsia<xiajie9916@gmail.com>
 */
class AdvService {

    public static function save(array $data) {
        $model = D('Advise');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function know_save(array $data) {
        $model = M('knowledge');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function adv_save(array $data) {
        $model = M('advise');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function dis_save(array $data) {
        $model = M('featuredisaster');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function news_save(array $data) {
        $model = M('news');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function cate_save(array $data) {
        $model = M('expcate');
        $result = $model->create($data);
        if ($result) {
            $res = $model->save();
            return $res;
        } else {
            return $model->getError();
        }
    }

    public static function uploaddoc() {
        $upload = new \Think\Upload(C('DOC'));// 实例化上传类
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
           // return $upload->getError();
            return false;
        }else{// 上传成功 获取上传文件信息
            $res = null;
            foreach($info as $file){
                $res =  $file['savepath'].$file['savename'];
            }
            return $res;
        }
    }

}
