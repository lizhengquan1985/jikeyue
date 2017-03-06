<?php
/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/6
 * Time: 14:44
 */

namespace app\model;


use think\Model;

class SysConfig extends Model
{
    protected $table = 't_sys_config';

    static public $dividedRadioServer = 'divided_radio_server';
    static public $dividedRadioPlatform = 'divided_radio_platform';
    static public $dividedNeedAudit = 'divided_need_audit';

    static function saveConfig($key, $value){
        $config = SysConfig::get($key);
        if($config == null){
            $config = new SysConfig();
            $config->config_key = $key;
        }
        $config->config_value = $value;
        $config->save();
    }
}