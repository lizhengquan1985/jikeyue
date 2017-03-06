<?php
/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/3
 * Time: 14:46
 */

namespace app\model;
use think\Model;


class AppVersion extends Model
{
    protected $table = 't_app_version';
    protected $autoWriteTimestamp = 'datetime';
}