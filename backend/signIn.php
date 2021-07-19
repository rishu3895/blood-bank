<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
	$email 			= $_POST['email'];
    $signInType     = $_POST['signInType'];
	$password 		= $_POST['password'];
    $sql = "";
	if($signInType == "Hospital"){
        $sql = "SELECT email,password FROM `HospitalUsers` WHERE email=:$email";
    }else{
        $sql = "SELECT email,password FROM `ReceiverUsers` WHERE email=:$email";
    }
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        if($row['password'] == $password){
            echo 'Successfully logged In';
        } 
    }else{
        echo 'There were errors while saving the data.';
    }
}else{
	echo 'No data';
}


?>