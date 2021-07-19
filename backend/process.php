<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
	$hospitalName 		= $_POST['hospitalName'];
	$name 		= $_POST['name'];
	$email 			= $_POST['email'];
	$password 		= $_POST['password'];
	$phonenumber	= $_POST['phoneNumber'];
	
		$sql = "INSERT INTO HospitalUsers (HospitalName,name, email, password,  PhoneNumber) VALUES (?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$hospitalName, $name, $email, $password,$phonenumber]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were errors while saving the data.';
		}
}else{
	echo 'No data';
}