<?php
namespace app\common;

/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/3
 * Time: 9:49
 */
class ApiResponse
{
    function __construct()
    {
        $this->msg = '';
        $this->code = 200;
    }

    /**
     * 大多表示数据消息
     * @var string
     */
    public $msg;
    /**
     * api 结果码
     * @var int
     */
    public $code;  // 200 调用成功  1000以上为错误码

    static function success()
    {
        return JSON(new ApiResponse());
    }

    static function failure($code, $msg)
    {
        $result = new ApiResponse();
        $result->code = $code;
        $result->msg = $msg;
        return JSON($result);
    }
}