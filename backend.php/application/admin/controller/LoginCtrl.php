<?php
/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/3
 * Time: 9:24
 */

namespace app\admin\controller;

use app\common\ApiResponse;
use app\model\Account;
use think\Controller;
use think\Log;


class LoginCtrl extends Controller
{
    /**
     * 获取验证码图片
     */
    public function getImage()
    {

    }

    /**
     * 登录
     */
    public function login($account = "", $password = "")
    {
        Log::record($account);
        $result = new ApiResponse();
        $loginAccount = Account::get(["phone_num" => $account]);

        if ($loginAccount == null || $loginAccount->password != $password) {
            return ApiResponse::failure(1000, "账户或者密码错误");
        }

        // 初始化session
        session("accountId", $loginAccount->account_id);

        // 返回数据
        $result->user = array(
            "nickname" => $loginAccount->nickname
        );

        return JSON($result);
    }

    /**
     * 注销账户
     */
    public function logout()
    {
        return JSON(session("a"));
    }

    /**
     * 获取登录用户信息
     */
    public function getLoginUser()
    {

    }
}