<?php
require_once('config.php');
?>
<?php
session_start();
if(isset($_POST)){
	$email 			= $_SESSION['username'];
    $bloodGrps      = $_POST['blood_grps'];
    $sql = "UPDATE HospitalUsers SET BloodGroupsAvailable=? WHERE email=?";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute([$bloodGrps,$email]);
    
    if($result){
        return true;
    } else {
        echo 'No data';
        return false;
    }
}else{
    echo 'No data';
    return false;
} 
?>