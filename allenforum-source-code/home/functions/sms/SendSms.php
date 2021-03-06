<?php
/**
 * Created by PhpStorm.
 * User: Porus
 * Date: 30-May-18
 * Time: 11:50 AM
 */

class SendSms
{
    function sendsmsPOST($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)
    {
        //Prepare you post parameters
        $postData = array(
            'mobileNumbers' => $mobileNumber,
            'smsContent' => $message,
            'senderId' => $senderId,
            'routeId' => $routeId,
            "smsContentType" =>'english'
        );
        $data_json = json_encode($postData);
        $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;
        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data_json,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        //get response
        $output = curl_exec($ch);
        if(curl_errno($ch))
        {
            echo 'error:' . curl_error($ch);
        }
        curl_close($ch);
        return $output;
    }
}