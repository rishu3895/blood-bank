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
        $sql = "SELECT email,password FROM `HospitalUsers` WHERE email=? LIMIT 1";
    }else{
        $sql = "SELECT email,password FROM `ReceiverUsers` WHERE email=? LIMIT 1";
    }
    $stmtsearch = $db->prepare($sql);
    $stmtsearch->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        if($result['password']==$password){
            echo ' You are logged in ';
        }else{
            echo ' The password was wrong';
        }
    }else{
        echo 'The User Id was wrong';
    }
}else{
	echo 'No data';
}


?>