<?php
session_start();
include ("TradierWrapper.php");
    $authCode = $_GET['code']; 
    $authState = $_GET['state'];
    //echo "Authorization Code: ".$authCode."<br/>"; echo "State: ".$authState; die();
    if(empty($authCode)){
        $loginPage = TradierWrapper::getAuthCode(); 
        header("Location: $loginPage");
    }else{
       $token = TradierWrapper::getTokenAPI($authCode);
        if(!empty($token)){
            //echo $token;
            $user = "users"; $pass = "123";
           
            
            header("Location: http://optionscanner.local/test.php");
        }
    }
?>