<?php
$username=$_POST['username'];//"abcfgde";//
$password=$_POST['password'];//"afgbc";//
$fName=$_POST['fName'];//"abfgfc";//
$lName=$_POST['lName'];//"abfgc";//
$phone=$_POST['phone'];//12345678889;//
$email=$_POST['email'];//"abcfgf";//

//echo $username.$password.$fName.$lName.$phone.$email;
$requestObject=json_encode(array("Header"=>array(""=>""),"Data"=>array("FirstName" =>$fName,"LastName" => $lName, "PhoneNumber"=>$phone,"EmailId"=>$email,"UserId"=>$username,"Password"=>$password)));
//set values to   option
//echo $requestObject;
$url="http://1-dot-platinum-logic-635.appspot.com/RegisterClient";
 $ch = curl_init($url);
 
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,"requestObject=".$requestObject);
 // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  $result = curl_exec($ch);
//var_dump($result);
 $result =json_decode( $result );//json_decode( $result,TRUE ); returns array instead of object
 $sessid= $result->Data->ClientUUID."<br>";
 $status= trim($result->Header->Status);
 // echo $status;
 
 if($status=="Success")
	echo "success";
	else
	echo "invalid login";

  curl_close($ch); 
?>