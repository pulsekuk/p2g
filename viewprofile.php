<?php
session_start();

$sessid=$_SESSION['ClientUUID'];
//echo $sessid;
//echo $username.$password.$fName.$lName.$phone.$email;
$requestObject=json_encode(array("Header"=>array(""=>""),"Data"=>array("ClientUUID"=>$sessid)));
//set values to   option
//echo $requestObject;
$url="http://1-dot-platinum-logic-635.appspot.com/ViewClientProfile";
 $ch = curl_init($url);
 
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,"requestObject=".$requestObject);
 // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
//var_dump($result);
 $result =json_decode( $result );//json_decode( $result,TRUE ); returns array instead of object
 //---receive data
 $fName= $result->Data->FirstName;
  $lName= $result->Data->LastName;
   $phone= $result->Data->PhoneNumber;
    $email= $result->Data->EmailId;
	 $balance= $result->Data->Balance;
	 $userid=$result->Data->UserId;
  //---receive status
 $status= trim($result->Header->Status);
 // echo $status;
$userdata=json_encode(array("FirstName"=> $fName,"LastName"=>$lName,"PhoneNumber"=>$phone,"EmailId"=> $email,"Balance"=>$balance,"UserId"=>$userid));
header("Content-Type: application/json");
 if($status=="Success")
	echo $userdata;

  curl_close($ch); 
?>