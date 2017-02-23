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
    public function accountList()
    {
        return json(Account::get(0));
    }
}