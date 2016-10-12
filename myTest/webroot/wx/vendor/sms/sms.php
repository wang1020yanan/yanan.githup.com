<?php
require_once("SmsApi.php");

class Sms{
    public static function sendmessage($mobile, $content)
    {
        $clapi  = new ChuanglanSmsApi();
        $result = $clapi->sendSMS("$mobile", $content,'true');
        $result = $clapi->execResult($result);
        return $result;
    }

}
?>