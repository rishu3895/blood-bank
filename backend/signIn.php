<?php
require_once('config.php');
?>
<?php
session_start();
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
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        if($result['password']==$password){
            $_SESSION['username'] = $email;
            $_SESSION['usertype'] = $signInType;
            
            echo ' You are logged in ';
            return true;
        }else{
            return false;
        }
    }else{
        echo 'The User Id was wrong';
        return false;
    }
}else{
	echo 'No data';
}
?>