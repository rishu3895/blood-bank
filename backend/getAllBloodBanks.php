<?php
require_once('config.php');
?>
<?php
session_start();
if(isset($_POST)){
    $sql = "SELECT email,HospitalName, BloodGroupsAvailable FROM HospitalUsers";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        $_SESSION['HospitalName']=$result['HospitalName'];
        echo $result['BloodGroupsAvailable'];
        return $result['BloodGroupsAvailable'];
    } else {
        echo 'No data';
        return false;
    }
}else{
    echo 'No data';
    return false;
} 
?>