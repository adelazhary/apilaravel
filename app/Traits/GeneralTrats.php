<?php
namespace App\Traits;

use App\Models\categories;

/**
 *
 */
trait GeneralTrats
{

    public function getCurrent()
    {
        return app()->getLocale();
    }

    public function returnError($errNum,$msg)
    {
        return [
            'status' => false,
            'errNum' => $errNum,
            'msg'    => $msg,
        ];
    }

    public function returnSuccess($errNum="S000",$msg="")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg'    => $msg,
        ];
    }

    public function returnData($key,$msg = "",$errNum = "")
    {
        return [
            'status' => true,
            'errNum' => $errNum,
            'msg'    => $msg,
            'key'    => $key
        ];;
    }

}
