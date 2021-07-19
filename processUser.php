<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
    $bloodGroup     = $_POST['bloodGroup'];
    $gender         = $_POST['gender'];
    $age            = $_POST['age'];
    $name           = $_POST['name'];
    $email          = $_POST['email'];
	$password 		= $_POST['password'];
	$phonenumber	= $_POST['phoneNumber'];
	
		$sql = "INSERT INTO ReceiverUsers(name, email, password, age, bloodGroup, PhoneNumber, gender) VALUES (?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name,$email,$password,$age,$bloodGroup,$phonenumber,$gender]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were errors while saving the data.';
		}
}else{
	echo 'No data';
}