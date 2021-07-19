<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
	$hospitalName 	= $_POST['hospitalName'];
	$name 			= $_POST['name'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$phonenumber	= $_POST['phoneNumber'];
	$bloodGrps = array('Ap' => "0" , 'An' => "0", 'Bp' => '0','Bn'=>'0','Op'=>'0','On'=>'0','ABp'=>'0','ABn'=>'0');
	$json = json_encode($bloodGrps);
	$sql = "INSERT INTO HospitalUsers (HospitalName,name, email, password,  PhoneNumber, BloodGroupsAvailable) VALUES (?,?,?,?,?,?)";
	$stmtinsert = $db->prepare($sql);
	$result = $stmtinsert->execute([$hospitalName, $name, $email, $password,$phonenumber,$json]);
	if($result){
		echo 'Successfully saved.';
	}else{
		echo 'There were errors while saving the data.';
	}
}else{
	echo 'No data';
}