<?php 

App::uses('AppHelper', 'View/Helper');

class SMSHelper extends AppHelper {

    var $OTPValidity = "30"; // in minutes
    
    public function is_connected() {
        $connected = @fsockopen("www.smsjust.com", 80);
        $is_conn = false;
        
        if($connected) {
            $is_conn = true;
            fclose($connected);
        }
        else {
            $is_conn = false;
        }
        
        return $is_conn;
    }
    
    public function getOTPTimeGap($reg_user){
        $generted_time = new DateTime($reg_user['0']['Registereduser']['otp_timestamp'], new DateTimeZone("Asia/Calcutta"));
        $now = new DateTime();
        
        $diff = $now->diff($generted_time);
        
        $hours = $diff->h;
        $hours = $hours + ($diff->days * 24);
        $minutes = $diff->i;
        $minutes = $minutes + ($hours * 60);
        
        return $minutes;
        
    }
    
    public function smsSend($mobile_no, $message) {
        //$username = urlencode("u1810"); 
        $username = urlencode("cuplib"); 
        $password = urlencode("cuplib@123");
        //$msg_token = urlencode("fP9oW6"); 
        //$sender_id = urlencode("BBSBEC"); // optional (compulsory in transactional sms) 
        $sender_id = urlencode("CUPEXM");
        $message = urlencode($message); 
        $mobile = urlencode($mobile_no); 

        //$api = "http://manage.sarvsms.com/api/send_transactional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $api = "http://www.smsjust.com/sms/user/urlsms.php?username=".$username."&pass=".$password."&senderid=".$sender_id."&dest_mobileno=".$mobile."&message=".$message."&response=Y";
        $response = file_get_contents($api);

        return $response; 
    }
    
    public function ozekiOTP($length = 8, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890')
    {
        $chars_length = (strlen($chars) - 1);
        $string = $chars{rand(0, $chars_length)};
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            $r = $chars{rand(0, $chars_length)};
            if ($r != $string{$i - 1}) $string .=  $r;
        }
        return $string;
        
    }
}

?>

