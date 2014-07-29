<?php
session_start();

$username= $_POST['username'];//"shailesh";
$password=$_POST['password'];//"dell";//

//$username= "piyush";
//$password="ss";
/*
if($username=="piyush"&&$password=="123")
echo "success";
else
echo "invalid login";
*/
$requestObject=json_encode(array("Header"=>array(""=>""),"Data"=>array("ClientUserId"=>$username,"Password"=>$password)));
//set values to   option
//echo $requestObject;
$url="http://1-dot-platinum-logic-635.appspot.com/LoginClient";
 $ch = curl_init($url);
 
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,"requestObject=".$requestObject);
 // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
//var_dump($result);
 $result =json_decode( $result );//json_decode( $result,TRUE ); returns array instead of object
 $sessid= $result->Data->ClientUUID;
 $status= trim($result->Header->Status);
 // echo $status;
 
 if($status=="Success"){
	$_SESSION['ClientUUID']=$sessid;
	echo $sessid;
	}
	else
	echo "invalid login";

  curl_close($ch); 



?>