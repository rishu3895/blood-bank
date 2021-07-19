<?php
require_once('config.php');
?>
<?php
session_start();
if(isset($_POST)){
	$email 			= $_SESSION['username'];
    $sql = "SELECT email, BloodGroupsAvailable FROM `HospitalUsers` WHERE email=? LIMIT 1";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        $_SESSION['username'] = $email;
        echo $result['BloodGroupsAvailable'];
    } else {
        echo 'No data';
        return false;
    }
}else{
    echo 'No data';
    return false;
} 
?>