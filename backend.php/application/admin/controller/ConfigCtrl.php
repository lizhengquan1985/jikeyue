<?php
/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/6
 * Time: 14:22
 */

namespace app\admin\controller;


use app\common\ApiResponse;
use app\model\SysConfig;

class ConfigCtrl
{
    public function getDividedRadio()
    {
        $dividedRadioServer = SysConfig::get(SysConfig::$dividedRadioServer);
        if ($dividedRadioServer == null) {
            SysConfig::saveConfig(SysConfig::$dividedRadioServer, "90.00");
            $dividedRadioServer = SysConfig::get(SysConfig::$dividedRadioServer);
        }

        $dividedRadioPlatform = SysConfig::get(SysConfig::$dividedRadioPlatform);
        if ($dividedRadioPlatform == null) {
            SysConfig::saveConfig(SysConfig::$dividedRadioPlatform, "10.00");
            $dividedRadioPlatform = SysConfig::get(SysConfig::$dividedRadioPlatform);
        }
        
        $dividedNeedAudit = SysConfig::get(SysConfig::$dividedNeedAudit);
        if ($dividedNeedAudit == null) {
            SysConfig::saveConfig(SysConfig::$dividedNeedAudit, 1);
            $dividedNeedAudit = SysConfig::get(SysConfig::$dividedNeedAudit);
        }

        $data = array(
            "dividedRadioServer" => $dividedRadioServer->config_value,
            "dividedRadioPlatform" => $dividedRadioPlatform->config_value,
            "needAudit" => $dividedNeedAudit->config_value
        );
        return JSON($data);
    }

    public function saveDivideRadio($server = 0, $platform = 0)
    {
        SysConfig::saveConfig(SysConfig::$dividedRadioServer, $server);
        SysConfig::saveConfig(SysConfig::$dividedRadioPlatform, $platform);

        return ApiResponse::success();
    }

    public function saveDividedNeedAudit($needAudit = 1)
    {
        SysConfig::saveConfig(SysConfig::$dividedNeedAudit, $needAudit);

        return ApiResponse::success();
    }
}