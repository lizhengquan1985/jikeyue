<?php
namespace app\admin\controller;

use app\model\Account;

/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/2/23
 * Time: 16:47
 */
class AccountCtrl
{
    /**
     * 列出账户列表信息
     */
    public function accountList()
    {
        return json(Account::get(1));
    }

    /**
     * 创建
     */
    public function create()
    {

    }

    public function remove()
    {

    }

    public function resetPassword()
    {

    }
}