<?php
if(ISSET($_POST))
{
	$name=$_POST['name'];
  $gender=$_POST['gender'];
  $father_name=$_POST['father_name'];
  $father_occupation=$_POST['father_occupation'];
  $nationality=$_POST['nationality'];
  $email=$_POST['parents_email'];
	$phone=$_POST['parents_phone'];
  $pupils_date=$_POST['pupils_date'];
  $birth_place=$_POST['birth_place'];
  $religion=$_POST['religion'];
  $class=$_POST['class'];
  $last_school=$_POST['last_school'];
  $result=$_POST['result'];
  $reason=$_POST['reason'];
  $fulladdress=$_POST['fulladdress'];
  $local_guardian=$_POST['local_guardian'];
  

  $field1="<b>Gender:</b> ".$gender."<br>"."<b>Father Name:</b> ".$father_name."<br>"."<b>Father Occupation:</b> ".$father_occupation."<br>"."<b>Nationality:</b> ".$nationality."<br>"."<b>Pupils Birthday:</b> ".$pupils_date."<br>"."<b>Pupils Birth Place:</b> ".$birth_place."<br>"."<b>Religion:</b> ".$religion."<br>"."<b>Class:</b> ".$class."<br>"."<b>Last School Name:</b> ".$last_school."<br>"."<b>Result of Last School:</b> ".$result."<br>"."<b>Reason:</b> ".$reason."<br>"."<b><b>Full Address:</b> </b>".$fulladdress."<br>"."<b>Local Guardian:</b> ".$local_guardian;
}
else
{
echo "Thanks";	
exit();	
}
$Token_Key='#'; // Located in admin section under setup
$WebURL='#'; // CRM Url like https://www.abc.com/crm-folder
//Lead Fields
$post_data=array('name'=>$name,'phone'=>$phone,'email'=>$email, 'field_1'=>$field1);
$PHPCRM = curl_init();
curl_setopt_array($PHPCRM, array(
  CURLOPT_URL=>$WebURL.'/index.php/crm_api/leads/add_lead/'.$Token_Key,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($PHPCRM);
curl_close($PHPCRM);
header("Location:thanks.php");
exit();
//echo $response;
?>