<?php
/**
 * Created by PhpStorm.
 * User: enter
 * Date: 2017/3/3
 * Time: 14:27
 */

namespace app\admin\controller;

use app\common\ApiResponse;
use app\model\AppVersion;
use think\Log;

class VersionCtrl
{
    public function listVersion($deviceType = 0, $page = 1, $size = 10)
    {
        Log::record($deviceType . ',' . $page . $size);
        $data = null;
        if ($deviceType > 0) {
            $total = AppVersion::where('device_type', '=', $deviceType)->count();

            $list = $total > 0 ? AppVersion::all(function ($query) use ($deviceType, $page, $size) {
                $query->where('device_type', '=', $deviceType)->limit($page * $size - $size, $page * $size)->order('version_id', 'desc');
            }) : [];
            $data = [
                "total" => $total,
                "appVersions" => $list
            ];
        } else {
            $total = AppVersion::count();
            $list = AppVersion::all(function ($query) use ($page, $size) {
                $query->order('version_id', 'desc')->limit($page * $size - $size, $page * $size);
            });
            $data = [
                "total" => $total,
                "appVersions" => $list
            ];
        }
        return JSON($data);
    }

    public function upsertAppVersion($versionId = 0, $versionName = "", $versionNo = "", $updateContent = "", $updateLevel = 1, $deviceType = 1)
    {
        if ($versionName == "" || $versionNo == "" || $updateContent == "") {
            return ApiResponse::failure(1, "asdf");
        }

        $version = new AppVersion();
        $version->version_name = $versionName;
        $version->version_no = $versionNo;
        $version->update_content = $updateContent;
        $version->update_level = $updateLevel;
        $version->device_type = $deviceType;
        $version->is_target = 0;
        $version->create_time = date("Y-m-d H:i:s");
        $version->last_update_time = date("Y-m-d H:i:s");
        $version->update_time = date("Y-m-d H:i:s");

            $version->version_id = $versionId;
        if($versionId>0){
            $version->isUpdate(true)->save();
        }else{
            $version->save();
        }


        return ApiResponse::success();
    }

    public function setTargetAppVersion($versionId = 0, $deviceType = 0)
    {
        Log::record('------------------------' . $versionId);
        if ($versionId <= 0 || $deviceType <= 0) {
            return ApiResponse::failure(100, 'dafd');
        }

        AppVersion::where('is_target', 1)->where('device_type', $deviceType)->update(['is_target' => 0]);

        $version = AppVersion::get($versionId);
        $version->is_target = 1;
        $version->save();
        Log::record('------------------------' . $version);
        return ApiResponse::success();
    }
}