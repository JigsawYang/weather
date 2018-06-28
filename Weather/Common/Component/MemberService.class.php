<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/6/27
 * Time: 23:14
 * Email: fadeblack307@163.com
 */
namespace Common\Component;
use Think\Db\Driver\Pdo;

class MemberService {
    public static function search(array $filters = []) {
        $where = [];
        if (isset($filters['ID']) && strlen($filters['ID'])) {
            if (is_array($filters['iD'])) {
                $where['ID'] = ['in', $filters['ID']];
            } else {
                $where['ID'] = $filters['ID'];
            }
        }
        if (filter($filters, 'userAccount')) {
            $where['userAccount'] = $filters['userAccount'];
        }

        return D('User')->where($where);
    }

    public static function getCurrentMember() {
        return session(CURRENT_MEMBER);
    }

    public static function signup(array $member) {
        $model = D('User');
        if ($data = $model->create($member)) {
            $data['userPassword'] = self::createPassword($data['userPassword']);
            if (($uid = $model->add($data)) === false) {
                return false;
            } else {
                $res['userAccount'] = $data['userAccount'];
                $res['id'] = $uid;
                return $res;
            }
        } else {
            return $model->getError();
        }
    }

    public static function forget(array $member) {
        $model = M('Member');
        $user = $member['username'];
        $data['password'] = self::createPassword($member['password']);
        $res = $model->where(['username' => $user])->save($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public static function createPassword($password) {
        return md5($password);
    }

    public static function checkMember($username) {
        $name = $username;
        if (self::search(['userAccount' => $name])->count()) {
            $res = false;
        } else {
            $res = true;
        }
        return $res;
    }

    public static function login($user, $password) {
        $memberuser = self::search(['userAccount' => $user])->find();
//        print_r($memberuser);die;
        if (!$memberuser) {
            return '不存在此用户';
        } elseif ($memberuser['userpassword'] != self::createPassword($password)) {
            return '密码错误';
        } else {
            unset($memberuser['userpassword']);
            session(CURRENT_MEMBER, $memberuser);
            return true;
        }
    }


    public static function cateid_save(array $data) {
        $model = D('User');
        $result = $model->create($data);
        if ($result) {
//            var_dump($data);die;
            $res = $model->where(['ID' => $data['id']])->save($data);
            return $res;
        } else {
            return $model->getError();
        }
    }
}