<?php
/**
 * Created by Neo.
 * User: jigsaw
 * Date: 2018/6/27
 * Time: 23:13
 * Email: fadeblack307@163.com
 */
namespace Home\Controller;
use Common\Component\MemberService;
use Think\Controller;

class CommonController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->currentMember = MemberService::getCurrentMember();
    }

}
